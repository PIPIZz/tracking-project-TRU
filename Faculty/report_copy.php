<?php
ob_start();
// เรียกไฟล์ TCPDF Library เข้ามาใช้งาน กำหนดที่อยู่ตามที่แตกไฟล์ไว้
require_once('../tcpdf/tcpdf.php');

$Year = $_GET['Year'];
$Term = $_GET['Term'];
$BA = $_GET['BA'];
include('../connect/config.php');
$year = $Year+543;

$sql_ba = "SELECT * FROM ba WHERE BA_id = $BA";
$stmt_ba = $conn->prepare($sql_ba);
$stmt_ba -> execute();
$res_ba = $stmt_ba->fetch(); 
$ba_name =$res_ba['BA_name'];

$id=$_SESSION['sess_id'];
           
$sql = "SELECT p.Pro_id,Pro_name,Teacher_1,Teacher_2,Grade,COUNT(*) as count_project
        FROM project as p
        INNER JOIN project_detail as pd ON p.Pro_id = pd.Pro_id 
        INNER JOIN teacher as t ON p.Teacher_1 = t.T_id 
        INNER JOIN student as s ON pd.Stu_id = s.id 
        INNER JOIN date_test as date ON date.Pro_id = p.Pro_id
        INNER JOIN director as d ON d.Direc_id = date.Direc_id 
        WHERE p.Step = 6 AND Pro_BA = $BA AND Year = $Year AND Term = $Term
        GROUP BY Pro_name ";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
$i = 1;

// เรียกใช้ Class TCPDF กำหนดรายละเอียดของหน้ากระดาษ
// PDF_PAGE_ORIENTATION = กระดาษแนวตั้ง
// PDF_UNIT = หน่วยวัดขนาดของกระดาษเป็นมิลลิเมตร (mm)
// PDF_PAGE_FORMAT = รูปแบบของกระดาษเป็น A4
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');


// กำหนดคุณสมบัติของไฟล์ PDF เช่น ผู้สร้างไฟล์ หัวข้อไฟล์ คำค้น 
$pdf->SetCreator('Reportphp');
$pdf->SetAuthor('Mindphp Developer');
$pdf->SetTitle('Report Project');
$pdf->SetSubject('Report_project ');
$pdf->SetKeywords('Reportphp, TCPDF, PDF, example, guide');



// กำหนดรายละเอียดของหัวกระดาษ สีข้อความและสีของเส้นใต้
// PDF_HEADER_LOGO = ไฟล์รูปภาพโลโก้
// PDF_HEADER_LOGO_WIDTH = ขนาดความกว้างของโลโก้
$pdf->SetHeaderData( PDF_HEADER_LOGO_WIDTH, '', 'รายงานสรุปการสอบโครงงาน 1 คณะวิศวกรรมศาสตร์ ภาค '.$Term.'/'.$year.' สาขาวิชา'.$ba_name .'', array (0, 64, 255), array (0, 64, 128));

// กำหนดรายละเอียดของท้ายกระดาษ สีข้อความและสีของเส้น
// $pdf->setFooterData(array (0, 64, 0), array (0, 64, 128));

// กำหนดตัวอักษร รูปแบบและขนาดของตัวอักษร (ตัวอักษรดูได้จากโฟลเดอร์ fonts)
// PDF_FONT_NAME_MAIN = ชื่อตัวอักษร helvetica
// PDF_FONT_SIZE_MAIN = ขนาดตัวอักษร 10
$pdf->setHeaderFont(Array ('thsarabun', 'B', '20'));
$pdf->setPrintHeader(true);
$pdf->setFooterFont(Array (PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// กำหนดระยะขอบกระดาษ
// PDF_MARGIN_LEFT = ขอบกระดาษด้านซ้าย 20mm
// PDF_MARGIN_TOP = ขอบกระดาษด้านบน 27mm
// PDF_MARGIN_RIGHT = ขอบกระดาษด้านขวา 15mm
$pdf->SetMargins(20, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// กำหนดระยะห่างจากขอบกระดาษด้านบนมาที่ส่วนหัวกระดาษ
// PDF_MARGIN_HEADER = 5mm
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// กำหนดระยะห่างจากขอบกระดาษด้านล่างมาที่ส่วนท้ายกระดาษ
// PDF_MARGIN_FOOTER = 10mm
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// กำหนดให้ขึ้นหน้าใหม่แบบอัตโนมัติ เมื่อเนื้อหาเกินระยะที่กำหนด
// PDF_MARGIN_BOTTOM = 25mm นับจากขอบล่าง
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// กำหนดตัวอักษรสำหรับส่วนเนื้อหา ชื่อตัวอักษร รูปแบบและขนาดตัวอักษร
// $pdf->SetFont('freeserif', '', 14); 
$pdf->SetFont('thsarabun', 'B', 16);

// กำหนดให้สร้างหน้าเอกสาร
$pdf->AddPage();

// ข้อมูลที่จะแสดงในเนื้อหา


$html = ' 

    <table border="1">
     <thead>
             <tr>
                <th width="50" align="center">ลับดับที่</th>
                <th width="200" align="center">ชื่อโปรเจกต์</th>
                <th width="125" align="center">รายชื่อคณะกรรมการ</th>
                <th width="125" align="center">ชื่ออาจารย์ที่ปรึกษา</th>
                <th width="125" align="center">รายชื่อผู้เข้าสอบ</th>
                <th width="70" align="center">จำนวนรวม</th>
                <th width="50" align="center">เกรด</th>
            </tr>
    </thead>
    <tbody>';

    foreach($result as $val){
        $SQL ="SELECT * FROM project_detail WHERE Pro_id ='".$val['Pro_id']."' " ;
        $stmt_Sql = $conn->prepare($SQL);
        $stmt_Sql->execute();
        $res_SQL = $stmt_Sql->fetchAll();

        $SQL_test ="SELECT Direc_id FROM date_test WHERE Pro_id ='".$val['Pro_id']."' " ;
        $stmt_test = $conn->prepare($SQL_test);
        $stmt_test->execute();
        $res_test = $stmt_test->fetchAll();

        $sql_Direc = "SELECT count(*) FROM date_test as dt  WHERE dt.Pro_id = '".$val['Pro_id']."' ";
        $Direc_nRows = $conn->query($sql_Direc)->fetchColumn();

        $sql_stu_num = "SELECT count(*) FROM project_detail WHERE Pro_id = '".$val['Pro_id']."'";
        $Stu_nRows = $conn->query($sql_stu_num)->fetchColumn();

        if($Direc_nRows > $Stu_nRows){
            $count_row = $Direc_nRows;
        }else{
            $count_row = $Stu_nRows;
        }

        $html .= '
                <tr cellpadding="10"> 
                    <td width="50" align="center" valign="middle">'.$i.'</td>
                    <td width="200" white-space="normal" > '.$val['Pro_name'].' </td>
                    <td width="125" valign="middle">';
                    $j = 1;
                    foreach($res_test as $item){
                        $sql_Direcn = "SELECT * FROM director WHERE Direc_id='".$item['Direc_id']."'";
                        $stmt_Direcn = $conn->prepare($sql_Direcn);
                        $stmt_Direcn->execute();
                        $res_Direcn = $stmt_Direcn->fetch();
                        $html .= " ".$j.") ".$res_Direcn['Direc_name']."<br>";
                        $j++;
                    }
        $html .= '  </td>
                    <td width="125" >';
                    $t1 = $val['Teacher_1'];        
                    $sql1 = "SELECT * FROM  teacher  WHERE T_id = '$t1' ";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1 ->execute();
                    $res1 = $stmt1->fetch();
                                    
                    $t2 = $val['Teacher_2'];        
                    $sql2 = "SELECT * FROM  teacher  WHERE T_id = '$t2' ";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2 ->execute();
                    $res2 = $stmt2->fetch();
                    if($val['Teacher_2'] ==""){
                        $html .= " 1) ".$res1['T_name'];
                    }else{
                        $html .= " 1) ".$res1['T_name']."<br> 2) ".$res2['T_name'];
                    }
                    
        $html .= '  </td>
                    <td width="125" >';
                    $k = 1;
                    foreach($res_SQL as $items){
                        $sql_Stu = "SELECT * FROM student WHERE id='".$items['Stu_id']."'";
                        $stmt_Stu = $conn->prepare($sql_Stu);
                        $stmt_Stu->execute();
                        $res_Stu = $stmt_Stu->fetch();
                        $html .= " ".$k.") ".$res_Stu['Stu_name']."<br>";
                        $k++;
                    }
        $html .= '  </td>
                    <td width="70" align="center">'.$Stu_nRows.'</td>
                    <td width="50" align="center">';
                    foreach($res_SQL as $itemGrade){
                        $sql_Grade = "SELECT * FROM project_detail WHERE Stu_id='".$itemGrade['Stu_id']."'";
                        $stmt_Grade = $conn->prepare($sql_Grade);
                        $stmt_Grade->execute();
                        $res_Grade = $stmt_Grade->fetch();
                        $html .= $res_Grade['Grade']."<br>";
                    }
        $html .='   </td>
                </tr>';
    
    $i++;
    }

$html .= '
    </tbody>
</table>
    ';



// กำหนดการแสดงข้อมูลแบบ HTML 
// สามารถกำหนดความกว้างความสูงของกรอบข้อความ 
// กำหนดตำแหน่งที่จะแสดงเป็นพิกัด x กับ y ซึ่ง x คือแนวนอนนับจากซ้าย ส่วน y คือแนวตั้งนับจากด้านล่าง
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTML($html);
// กำหนดการชื่อเอกสาร และรูปแบบการแสดงผล
$pdf->Output('Report_project.pdf', 'I');
ob_end_flush();