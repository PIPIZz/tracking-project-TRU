<?php
include('../connect/config.php');
date_default_timezone_set('asia/bangkok');

$sql = "SELECT * FROM project WHERE Year = Year(CURDATE())";
$stmt = $conn->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
$result = $stmt->fetchAll();


$sql1 = "SELECT * FROM project WHERE Year = Year(CURDATE()) AND Step BETWEEN 1 AND 5";
$stmt1 = $conn->prepare($sql1);
$stmt1->execute();
$count1 = $stmt1->rowCount();
$result1 = $stmt1->fetchAll();

$sql2 = "SELECT * FROM project WHERE Year = Year(CURDATE()) AND Step = 5";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$count2 = $stmt2->rowCount();
$result2 = $stmt2->fetchAll();

$sql3 = "SELECT * FROM project WHERE Year = Year(CURDATE()) AND Step = 6";
$stmt3 = $conn->prepare($sql3);
$stmt3->execute();
$count3 = $stmt3->rowCount();
$result3 = $stmt3->fetchAll();
?>

<div class="main-content container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-6 " role="button" id="Choice1">
            <div class="widget widget-tile">
                <div style="display: block;margin-left: auto;margin-right: auto;width: 40%;"><img
                        src="../assets/img/icon/menu.png" alt=""></div>
                <div class="data-info">
                    <div class="desc">นักศึกษาที่ลงทะเบียนทั้งหมด</div>
                    <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span>
                        <!-- <span class="number"><?=$count?></span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6" role="button" id="Choice2">
            <div class="widget widget-tile">
                <div style="display: block;margin-left: auto;margin-right: auto;width: 40%;"><img
                        src="../assets/img/icon/loading.png" alt=""></div>
                <div class="data-info">
                    <div class="desc">นักศึกษาที่กำลังดำเนินการ</div>
                    <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-right"></span>
                        <!-- <span class="number"><?=$count1?></span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6" role="button" id="Choice3">
            <div class="widget widget-tile">
                <div style="display: block;margin-left: auto;margin-right: auto;width: 40%;"><img
                        src="../assets/img/icon/test.png" alt=""></div>
                <div class="data-info">
                    <div class="desc">นักศึกษาที่รอสอบโครงงาน</div>
                    <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span>
                        <!-- <span class="number"><?=$count2?></span> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6" role="button" id="Choice4">
            <div class="widget widget-tile">
                <div style="display: block;margin-left: auto;margin-right: auto;width: 40%;"><img
                        src="../assets/img/icon/tick.png" alt=""></div>
                <div class="data-info">
                    <div class="desc">นักศึกษาที่ผ่านโครงงาน</div>
                    <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span>
                        <!-- <span class="number"><?=$count3?></span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" class="Test">
            <div class="ch1">
                <?php include('./HomePage/AllstuGroup.php') ?>
            </div>
            <div class="ch2">
                <?php include('./HomePage/Ongoning_stuGroup.php') ?>
            </div>
            <div class="ch3">
            <?php include('./HomePage/Test_stuGroup.php') ?>
            </div>
            <div class="ch4">
            <?php include('./HomePage/Done_stuGroup.php') ?>
            </div>
        </div>
    </div>
</div>
   <script src="../assets/jquery.min.js"> </script>
<script type="text/javascript">
$(function() {  
    $(".ch1").hide();
    $(".ch2").hide();
    $(".ch3").hide();
    $(".ch4").hide();


    $("#Choice1").click(function() {
        console.log('hh');
        $(".ch1").show();
        $(".ch2").hide();
        $(".ch3").hide();
        $(".ch4").hide();
    });
    $("#Choice2").click(function() {
        $(".ch1").hide();
        $(".ch2").show();
        $(".ch3").hide();
        $(".ch4").hide();
    });
    $("#Choice3").click(function() {
        $(".ch1").hide();
        $(".ch2").hide();
        $(".ch3").show();
        $(".ch4").hide();
    });
    $("#Choice4").click(function() {
        $(".ch1").hide();
        $(".ch2").hide();
        $(".ch3").hide();
        $(".ch4").show();
    });
  
});
</script>