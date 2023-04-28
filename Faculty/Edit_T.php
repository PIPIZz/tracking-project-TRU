<?php 
    $t_id = $_REQUEST['T_id'];
    $_SESSION["T_edit_id"] = $_REQUEST['T_id'];
    include('../connect/config.php');
    $sql = "SELECT * FROM teacher WHERE T_id ='$t_id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
?>

<div class="main-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <form action="../Process_Faculty/P_Edit_T.php" method="GET" style="border-radius: 0px;"
                    class="form-horizontal group-border-dashed">
                    <div class="panel-heading panel-heading-divider">แก้ไขข้อมูลผู้ใช้</div>
                    <div class="panel-body">
                        <div style="border-radius: 0px;" class="form-horizontal group-border-dashed">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">รหัสผู้ใช้ / Username</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="edit_id" value="<?=$t_id ?>" class="form-control">
                                </div>
                            </div>
                            <!-- <input type="text" readonly hidden name="T_id" value="<?=$t_id ?>" class="form-control"> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-6">
                                    <input type="text" name="edit_T_name" value="<?php echo $result['T_name'];?>"
                                        class="form-control">
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-3 control-label">สถานะ</label><br>
                                <div class="col-sm-6">
                                    <select class="form-control" name="edit_status"
                                        value="<?php echo $result['T_Status'];?>">
                                        <option value="Teacher"
                                            <?php if ($result['T_Status'] == 'Teacher') { echo ' selected="selected"'; } ?>>
                                            อาจารย์ที่ปรึกษา </option>
                                        <option value="Admin"
                                            <?php if ($result['T_Status'] == 'Admin') { echo ' selected="selected"'; } ?>>
                                            แอดมิน</option>
                                        <option value="T_Admin"
                                            <?php if ($result['T_Status'] == 'T_Admin') { echo ' selected="selected"'; } ?>>
                                            อาจารย์ที่ปรึกษาและแอดมิน</option>
                                        <option value="Secretary"
                                            <?php if ($result['T_Status'] == 'Secretary') { echo ' selected="selected"'; } ?>>
                                            เลขาคณะ</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">สาขา</label><br>
                                <div class="col-sm-6">
                                    <select class="form-control" name="edit_T_BA" value="<?php echo $result['T_BA'];?>">
                                        <option value=1
                                            <?php if ($result['T_BA'] == '1') { echo ' selected="selected"'; } ?>>
                                            วิศวกรรมเครื่องกล</option>
                                        <option value=2
                                            <?php if ($result['T_BA'] == '2') { echo ' selected="selected"'; } ?>>
                                            วิศวกรรมไฟฟ้า </option>
                                        <option value=3
                                            <?php if ($result['T_BA'] == '3') { echo ' selected="selected"'; } ?>>
                                            วิศวกรรมอุตสาหการ</option>
                                        <option value=4
                                            <?php if ($result['T_BA'] == '4') { echo ' selected="selected"'; } ?>>
                                            เทคโนโลยีการจัดการอุตสาหกรรม</option>
                                    </select>
                                </div>

                            </div>

                            <p class="text-right">
                                <button type="sumbit" name="button_edit" value="insert"
                                    class="btn btn-primary btn-xl ">แก้ไขข้อมูล</button>

                                <button data-toggle="modal" type="button" data-target="#reset_Password"
                                    class="btn btn-danger btn-xl ">
                                    แก้ไขรหัสผ่าน
                                </button>
                                <a class="btn btn-xl  btn-default" href="index.php?menu=teacher">ย้อนกลับ</a>
                            </p>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  include('../Modal/M_Reset_Password.php'); ?>