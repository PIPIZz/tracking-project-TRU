<?php 
    $id = $_SESSION['sess_id'];

    $sql = "SELECT * FROM project_detail Where Stu_id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt ->execute();
    $res = $stmt->fetch();
            
    $pro_id = $res['Pro_id'];

    $sql1 = "SELECT * From date_test  WHERE Pro_id = '$pro_id' ";
    $stmt1 = $conn->prepare($sql1);
    $stmt1 -> execute();
    $res1 = $stmt1->fetchAll();
            
    $sql_test = "SELECT tDate, tTime ,Place From date_test  WHERE Pro_id = '$pro_id' ";
    $stmt_test = $conn->prepare($sql_test);
    $stmt_test -> execute();
    $res_test = $stmt_test->fetch();

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
<div class="card">
    <div class="card-body">
        <h1 class="p-3">วันสอบโครงงาน 1 </h1>
        <div class="row justify-content-md-center">
            <div class="col">
                <div class="row">
                    <div class="col-2"> <img src="../assets/img/icon/calendar.png"></div>
                    <div class="col ">
                        <h5 class="title p-2">วันสอบ และ เวลาสอบ </h5>
                        <p class="text px-4"><?php  echo DateThai($res_date['tDate'])." เวลา : ".$res_date['tTime']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2"> <img src="../assets/img/icon/placeholder.png"></div>
                    <div class="col ">
                        <h5 class="title p-2">สถานที่ </h5>
                        <p class="text px-4"><?=$res_test['Place']?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-2"> <img src="../assets/img/icon/employees.png"></div>
                    <div class="col ">
                        <h5 class="title p-2">คณะกรรมการ </h5>
                        <?php  
                            foreach($res1 as $items){
                            $sql_direc = "SELECT * FROM director WHERE Direc_id='".$items['Direc_id']."'";
                                $stmt_direc = $conn->prepare($sql_direc);
                                $stmt_direc->execute();
                                $res_direc = $stmt_direc->fetch();
                                $c =count($items['Direc_id']);
                                for ($s = 0; $s < $c; $s++) {                                          
                        ?>
                        <p class="text px-4"> ชื่อกรรมการ : <?=$res_direc['Direc_name']?></p>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>