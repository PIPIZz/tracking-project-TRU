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
                    <div class="col-md-12">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <form action="../Process_Faculty/P_Add_teacher.php" method="GET" style="border-radius: 0px;"
                                class="form-horizontal group-border-dashed">
                                <div class="panel-heading panel-heading-divider">ข้อมูลผู้ใช้</div>
                                <div class="panel-body">
                                    <div style="border-radius: 0px;" class="form-horizontal group-border-dashed">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">รหัสผู้ใช้ / Username</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="T_id" name="T_id" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="T_name" name="T_name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" placeholder="Password" id="password"
                                                    name="password" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">สถานะ</label><br>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="Teacher">อาจารย์ที่ปรึกษา </option>
                                                    <option value="Admin">แอดมิน</option>
                                                    <option value="T_Admin">อาจารย์ที่ปรึกษาและแอดมิน</option>
                                                    <option value="Secretary">เลขาคณะ</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">สาขา</label><br>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="T_BA" name="T_BA">
                                                <?php $sql = "SELECT * FROM ba";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt -> execute();
                                                    $res = $stmt->fetchAll(); 
                                                    foreach($res as $val){ ?>
                                                        <option value="<?=$val['BA_id']?>"><?=$val['BA_name']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>

                                        <p class="text-right">
                                            <button type="sumbit" name="button_click" value="insert"
                                                class="btn btn-primary btn-xl ">เพิ่มข้อมูล</button>
                                            <a class="btn btn-xl  btn-default"
                                                href="index.php?menu=teacher">ย้อนกลับ</a>
                                        </p>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require_once('footter.php');?>
</body>

</html>