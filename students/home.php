<?php 
    session_start();
    if($_SESSION['sess_status'] == 1){
        echo "<script>alert('Plasess Register Prject');</script>" ;
    }

    //////////////////////////////////////////////////////////////

    $id = $_SESSION['sess_id'];
    include('../connect/config.php');
    $sql = "SELECT * FROM student INNER JOIN sector ON Sector_id=Sector WHERE id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt ->execute();
    $res = $stmt->fetch();    
    $pass = $res['Password'];
    $password = md5($pass);  

    if($res['Stu_BA'] == 1 ){
        $ba = "วิศวกรรมเครื่องกล";
       }else if($res['Stu_BA'] == 2 ){
           $ba = "วิศวกรรมไฟฟ้า";
       }else if($res['Stu_BA'] == 3 ){
           $ba = "วิศวอุตสาหการ";
       }else if($res['Stu_BA'] == 4 ){
           $ba = "เทคโนโลยีอุตสาหกรรม";
       }

        $sql_p = "SELECT d.Pro_id, Stu_id, Grade, Pro_name, Year, Term, Pro_BA, Teacher_1, Teacher_2,Step 
        FROM project_detail as d INNER JOIN project as p ON d.Pro_id = p.Pro_id Where Stu_id = '$id' ";
        $stmt_p = $conn->prepare($sql_p);
        $stmt_p ->execute();
        $res_p = $stmt_p->fetch();

       $t1 = $res_p['Teacher_1'];        
       $sql1 = "SELECT * FROM  teacher  WHERE T_id = '$t1' ";
       $stmt1 = $conn->prepare($sql1);
       $stmt1 ->execute();
       $res1 = $stmt1->fetch();

       $t2 = $res_p['Teacher_2'];        
       $sql2 = "SELECT * FROM  teacher  WHERE T_id = '$t2' ";
       $stmt2 = $conn->prepare($sql2);
       $stmt2 ->execute();
       $res2 = $stmt2->fetch();
       //find name member
       $p_id = $res_p['Pro_id'];

       $sql_pd = "SELECT * FROM project_detail as d INNER JOIN student as s ON s.id=d.Stu_id INNER JOIN ba as b ON b.BA_id=s.Stu_BA INNER JOIN sector as se ON se.Sector_id=s.Sector WHERE Pro_id = '$p_id' ";
       $stmt_pd = $conn->prepare($sql_pd);
       $stmt_pd->execute();
       $res_pd = $stmt_pd->fetchAll();
       //find step
       $sql_step = "SELECT * FROM project INNER JOIN step On step_id = Step  WHERE Pro_id = '$p_id' ";
       $stmt_step = $conn->prepare($sql_step);
       $stmt_step->execute();
       $res_step = $stmt_step->fetch();

       ///date
       $sql_date = "SELECT * FROM date_test  WHERE Pro_id = '$p_id' ";
       $stmt_date = $conn->prepare($sql_date);
       $stmt_date->execute();
       $res_date = $stmt_date->fetch();   


       function DateThai($strDate)
       {
                $strYear = date("Y",strtotime($strDate))+543;
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strHour= date("H",strtotime($strDate));
                $strMinute= date("i",strtotime($strDate));
                $strSeconds= date("s",strtotime($strDate));
                $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                $strMonthThai=$strMonthCut[$strMonth];
                return "$strDay $strMonthThai $strYear ";
        }

?>
<div class="container ">
    <div class="row">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto"> <img src="../assets/img/icon/writing64.png"></div>
                            <div class="col-auto">
                                <h5 class="card-title p-2">สถานะโครงงานปัจจุบัน</h5>
                                <p class="card-text px-4">
                                    <?php if($res_step['step_name'] ==null){
                                    echo 'กรุณาลงทะเบียนโครงงาน';
                                    } echo $res_step['step_name'];
                                ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto"> <img src="../assets/img/icon/calendar.png"></div>
                            <div class="col-auto">
                                <h5 class="card-title p-2">วันสอบโครงงาน</h5>
                                <p class="card-text px-4">
                                    <?php 
                                            if(!empty($res_date['tDate'])&& !empty($res_date['tTime'])){
                                                echo DateThai($res_date['tDate'])."เวลา : ".$res_date['tTime'];
                                            }else{
                                                echo 'รอกำหนดวันสอบ';
                                            }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto"> <img src="../assets/img/icon/font.png"></div>
                            <div class="col-auto">
                                <h5 class="card-title p-2">ผลการสอบ</h5>
                                <p class="card-text px-4">
                                    <?php if($res_p['Grade']== null){
                                        echo'Waiting Grade';
                                            }else{
                                                if($res_p['Grade']== 'F'){
                                                    echo 'ไม่ผ่าน';
                                                }else if($res_p['Grade']== 'P'){
                                                    echo 'ไม่ผ่าน';
                                                }else{
                                                    echo 'ผ่าน';
                                                }
                                                
                                            }
                                     ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="">
            <div class="card bg-danger bg-opacity-50" style="">
                <h5 class="card-header">ข้อมูลส่วนตัว</h5>
                <div class="card-body row g-3">

                    <div class="col-md-6 ">
                        <label class="form-label ">รหัสนักศึกษา</label>
             
                        <input type="text" readonly class="form-control p-2  W"
                            value="<?=$_SESSION['sess_id']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" readonly class="form-control-plaintext p-2 shadow-sm bg-body rounded"
                            value="<?=$res['Stu_name']?>">

                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ภาค</label>
                        <input type="text" readonly class="form-control-plaintext p-2 shadow-sm bg-body rounded"
                            value="<?=$res['Sector_name']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">สาขา</label>
                        <input type="text" readonly class="form-control-plaintext p-2 shadow-sm bg-body rounded"
                            value="<?=$ba?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text" readonly class="form-control-plaintext  p-2 shadow-sm bg-body rounded"
                            value="<?=$res['Phone']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">อีเมลล์</label>
                        <input type="email" readonly class="form-control-plaintext  p-2 shadow-sm bg-body rounded"
                            value="<?=$res['email']?>">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            แก้ไข
                        </button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal_editpassword">
                            แก้ไขรหัสผ่าน
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <br><br>
    <div class="col">
        <div class="card bg-info bg-opacity-50">
            <h5 class="card-header">ข้อมูลโครงงาน</h5>
            <div class="card-body row g-3">
                <div class="col-md-6 col-auto">
                    <label class="form-label ">ชื่อโครงงาน</label>
                    <input type="text" readonly class="form-control-plaintext p-2 shadow-sm bg-body rounded"
                        value="<?=$res_p['Pro_name']?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">อาจารย์ที่ปรึกษา</label>
                    <input type="text" readonly class="form-control-plaintext p-2 shadow-sm bg-body rounded"
                        value="<?=$res1['T_name']?>">
                </div>
                <?php if($res2['T_name'] == ""){}else{ ?>
                <div class="col-md-6">
                    <label class="form-label">อาจารย์ที่ปรึกษาร่วม</label>
                    <input type="text" readonly class="form-control-plaintext p-2 shadow-sm bg-body rounded"
                        value="<?=$res2['T_name']?>">
                </div>
                <?php } ?>
                <div class="col-md-6">
                    <label class="form-label">สมาชิก</label>
                    <div class="bg-light rounded">
                        <?php foreach($res_pd as $member){ ?>
                        <div class="form-control-plaintext p-2 " value="<?=$member['Stu_name']?>"><?=$member['Stu_name']?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include('../Modal/M_EditProflie_stu.php'); 
include('../Modal/M_Edit_Password_Stu.php'); 

?>