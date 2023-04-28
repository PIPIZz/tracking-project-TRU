<?php
require_once('../Process/P_C_session.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php');?>

<body>
    <div class="be-wrapper bbe-fixed-sidebar be-color-header-danger">
        <?php require_once('navbar.php');?>
        <div class="be-content">

            <div class="main-content container-fluid">
                <div class="row">

                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="panel-heading panel-heading-divider">รายละเอียดโครงงาน</div>
                        <div class="panel-body">
                            <div style="border-radius: 0px;" class="form-horizontal group-border-dashed">

                                <?php  
                                   
                                    include('../connect/config.php');
                                    $id = $_GET['id'];
                                    $T = $_GET['T'];
                                    $sql = "SELECT * FROM project as p INNER JOIN teacher as t ON p.Teacher_1 =t.T_id || p.Teacher_2 =t.T_id  INNER JOIN ba as b ON b.BA_id=p.Pro_BA WHERE Pro_id = '$id' ";
                                    $stmt = $conn->prepare($sql);
                                    $stmt ->execute();
                                    $res = $stmt->fetch();

                                    ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    <h4> ชื่อโครงงาน</h4>
                                                </label>
                                                <div class="col-sm-6">
                                                    <div class="well well-sm lead">
                                                        <?=$res['Pro_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    <h4>อาจารย์ที่ปรึกษา</h4>
                                                </label>
                                                <?php        
                                                $t1 = $res['Teacher_1'];        
                                                $sql1 = "SELECT * FROM  teacher  WHERE T_id = '$t1' ";
                                                $stmt1 = $conn->prepare($sql1);
                                                $stmt1 ->execute();
                                                $res1 = $stmt1->fetch();
                                                ?>
                                                <div class="col-sm-6">
                                                    <div class="well well-sm lead">
                                                        <?=$res1['T_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($res['Teacher_2'] == ""){}else{ ?>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    <h4>อาจารย์ที่ปรึกษาร่วม</h4>
                                                </label>
                                                <div class="col-sm-6">
                                                    <?php  
                                                    $t2 = $res['Teacher_2'];        
                                                    $sql2 = "SELECT * FROM  teacher  WHERE T_id = '$t2' ";
                                                    $stmt2 = $conn->prepare($sql2);
                                                    $stmt2 ->execute();
                                                    $res2 = $stmt2->fetch();
                                                    ?>
                                                    <div class="well well-sm lead">
                                                        <?=$res2['T_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    <h4>ปีการศึกษา</h4>
                                                </label>
                                                <div class="col-sm-6">
                                                    <div class="well well-sm lead">
                                                        <?=$res['Year']+543?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    <h4>สาขา</h4>
                                                </label>
                                                <div class="col-sm-6">
                                                    <div class="well well-sm lead">
                                                        <?=$res['BA_name']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-md-6">
                                        <div id="accordion2" class="panel-group accordion ">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-toggle="collapse"
                                                            data-parent="#accordion2" href="#collapse-1"><i
                                                                class="icon mdi mdi-chevron-down"></i> รายชื่อสมาชิก</a></h4>
                                                </div>
                                                <div id="collapse-1" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <?php include('./Detail/p1.php') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-toggle="collapse"
                                                            data-parent="#accordion2" href="#collapse-2"
                                                            class="collapsed"><i class="icon mdi mdi-chevron-down"></i>สถานะ</a></h4>
                                                </div>
                                                <div id="collapse-2" class="panel-collapse collapse">
                                                    <div class="panel-body"><?php include('./Detail/p2.php') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-toggle="collapse"
                                                            data-parent="#accordion2" href="#collapse-3"
                                                            class="collapsed"><i class="icon mdi mdi-chevron-down"></i>วันสอบโครงงาน</a></h4>
                                                </div>
                                                <div id="collapse-3" class="panel-collapse collapse">
                                                    <div class="panel-body"><?php include('./Detail/p3.php') ?>
                                                    </div>
                                                </div>
                                            </div> <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-toggle="collapse"
                                                            data-parent="#accordion2" href="#collapse-4"
                                                            class="collapsed"><i class="icon mdi mdi-chevron-down"></i>ประวัติการส่ง</a></h4>
                                                </div>
                                                <div id="collapse-4" class="panel-collapse collapse">
                                                    <div class="panel-body"><?php include('./Detail/p4.php') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>       
                            </div>

                            <p class="text-right">
                                <button class="btn btn-space  btn-lg "><a href="index.php?menu=enroll1">
                                        <h4>ย้อนกลับ</h4>
                                    </a>
                                </button>
                            </p>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
</body>
<?php require_once('footter.php');?>

</html>