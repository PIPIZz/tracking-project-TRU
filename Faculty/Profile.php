<div class="main-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">
                    <h3> ข้อมูลส่วนตัว</h3>
                </div>
                <div class="panel-body">
                    <div style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <h4> รหัสเจ้าหน้าที่</h4>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" disabled="disabled" class="form-control"
                                    value="<?=$_SESSION['sess_id']?>">
                            </div>
                        </div>
                        <?php  
                        $id = $_SESSION['sess_id'];                
                        include('../connect/config.php');
                        $sql = "SELECT * FROM teacher as t INNER JOIN ba as b ON b.BA_id=t.T_BA WHERE T_id = '$id' ";
                        $stmt = $conn->prepare($sql);
                        $stmt ->execute();
                        $res = $stmt->fetch();                      
                        ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <h4> ชื่อ-นามสกุล</h4>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" disabled="disabled" class="form-control" value="<?=$res['T_name']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">
                                <h4> สาขา</h4>
                            </label>
                            <div class="col-sm-6">
                                <input type="text" disabled="disabled" class="form-control"
                                    value="<?=$res['BA_name']?>">
                            </div>
                        </div>

                        <div class="panel-divider"></div>


                        <p class="text-right">
                            <button data-toggle="modal" data-id="<?php echo $res['T_id']; ?>"
                                class="btn btn-space btn-primary btn-lg ModalEdit_Proflie_btn">
                                <h4>แก้ไข</h4>
                            </button>
                            <button data-toggle="modal" data-target="#Edit_Password"
                                class="btn btn-space btn-danger btn-lg ">
                                <h4>แก้ไขรหัสผ่าน</h4>
                            </button>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php include('../Modal/M_EditProfile_T.php'); include('../Modal/M_Edit_Password_Faculty.php');?>

<script src="../assets/jquery.min.js"> </script>
<script>
$(document).ready(function() {
    $('.ModalEdit_Proflie_btn').click(function() {
        //get data from edit btn
        var T_id = $(this).attr('data-id');
        // alert(StuID);
        $.get('../Process_Faculty/P_Get_T.php?T_id=' + T_id,
            function(data) {
                // alert(data);
                var result = JSON.parse(data);
                $('#mod-EditProfileT').modal('show');
                for (var i in result) {
                    $('#edit_id').val(result[i].T_id);
                    $('#edit_T_name').val(result[i].T_name);
                    $('#edit_T_BA').val(result[i].T_BA);
                    $('#edit_Password').val(result[i].T_Password);
                    $('#edit_status').val(result[i].T_Status);

                }
            });
    });
});
</script>