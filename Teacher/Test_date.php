<?php 
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

<div class="main-content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">วันสอบสอบโครงงาน
                </div>
                <div class="panel-body">
                    <table id="table1" class="table table-striped table-hover table-fw-widget">
                        <thead>
                            <tr>
                                <th>ลับดับที่</th>
                                <th>ชื่อโครงงาน</th>
                                <th>วันที่สอบ</th>
                                <th>เวลา</th>
                                <th>สถานที่</th>
                                <th>ภาค</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                session_start();
                                $id=$_SESSION['sess_id'];
                                include('../connect/config.php');                                            
                                $sql = "SELECT * FROM project as p INNER JOIN date_test as t  ON t.Pro_id = p.Pro_id INNER JOIN Sector ON Sector_id=p.Pro_sector WHERE Teacher_1 = '$id'  AND Step =5 OR 6 GROUP BY p.Pro_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                $i = 1;
                                        foreach($result as $val){
                                ?>
                            <tr class="odd gradeX">
                                <td><?=$i?></td>
                                <td><?=$val['Pro_name']?></td>
                                <td><?php echo DateThai($val['tDate'])?></td>
                                <td><?=$val['tTime']?></td>
                                <td><?=$val['Place']?></td>
                                <td><?=$val['Sector_name']?></td>                               
                            </tr>
                            <?php $i++; } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../Modal/M_Add_teacher.php');?>