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
                    <form action="../Process_teacher/P_Save_checkF.php" method="POST">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-heading panel-heading-divider">ข้อมูลโครงงาน</div>
                                <div class="panel-body">

                                    <div style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                                        <?php
                                         session_start(); 
                                         include('../connect/config.php');
                                         $id = $_GET['id'];
                                         $sql = "SELECT * FROM  file1  WHERE Pro_id = '$id' AND F_Status= 1    ";
                                         $stmt = $conn->prepare($sql);
                                         $stmt->execute();
                                         $res = $stmt->fetch();

                                         $sql1 = "SELECT * FROM  project  WHERE Pro_id = '$id'";
                                         $stmt1 = $conn->prepare($sql1);
                                         $stmt1->execute();
                                         $res1 = $stmt1->fetch();
                                        ?>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                <h4> บทที่ <?php echo  $res['Type']; ?> </h4>
                                            </label>
                                            <div class="col-sm-6">
                                                <div class="col-sm-6">
                                                    <input type="text" disabled="disabled" value="<?=$res['File'];?>"
                                                        class="form-control">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" class="btn btn-default btn-xl"><a
                                                            href="<?="../fileupload/".$res['File'];?>"
                                                            target="_blank">Download</a></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <div class="col-sm-9 ">
                                                <div class="be-radio be-radio-color has-success inline">
                                                    <input type="radio" checked="" name="choice" id="choice1" value=2>
                                                    <label for="choice1">ผ่าน</label>
                                                </div>
                                                <div class="be-radio be-radio-color has-danger inline">
                                                    <input type="radio" name="choice" id="choice2" value=3>
                                                    <label for="choice2">ไม่ผ่าน</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="ch1">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    <h4>เพิ่มไฟล์แก้ไข</h4>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="file" class="btn btn-xl  btn-default" id="fileupload"
                                                        name="fileupload">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ch2">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">
                                                    <h4>รายละเอียด</h4>
                                                </label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="reason" name="reason"
                                                        placeholder="รายละเอียด (ถ้ามี)">
                                                </div>
                                            </div>
                                        </div>
  
                                        <input type="hidden" id="step" name="step" value="<?=$res1['Step']?>"
                                            class="form-control ">                                
                                        <input type="hidden" id="Pro_id" name="Pro_id" value="<?=$res1['Pro_id']?>"
                                            class="form-control ">   

                                        <input type="hidden" id="file" name="file" value="<?=$res['File']?>"
                                            class="form-control ">
                                        <input type="hidden" id="type" name="type" value="<?=$res['Type']?>"
                                            class="form-control ">
                                        <input type="hidden" id="F_id" name="F_id" value="<?=$res['F_id']?>"
                                            class="form-control ">

                                        <p class="text-right">
                                            <button type="submit" name="edit" value="insert"
                                                class="btn btn-primary btn-space btn-xl ">บันทึก</button>
                                            <a class="btn btn-space btn-primary btn-xl "
                                                href="index.php?menu=enroll">ย้อนกลับ</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="../assets/jquery.min.js"> </script>
            <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(function() {
                $("input[name$='choice']").click(function() {
                    var value = $(this).val();
                    if (value == 2) {
                        $(".ch1").hide();
                        $(".ch2").hide();

                    } else if (value == 3) {
                        $(".ch2").show();
                        $(".ch1").show();
                    }
                });
                $(".ch1").hide();
                $(".ch2").hide();
            }); 
            </script>
        </div>
    </div>
</body>
<?php require_once('footter.php');?>
</html>