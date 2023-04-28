<?php 
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
?>
<!-- Modal -->
<div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขข้อมูลส่วนตัว</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="../Process/P_EditProfile_stu.php" method="GET">
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="mb-3 row p-2">
                        <label class="col-sm-4 col-form-label">รหัสนักศึกษา</label>
                        <div class="col-sm-8">
                        <input placeholder="รหัสประจำตัวนักศึกษา 13 หลัก" readonly disabled class="form-control " type="text" value="<?=$_SESSION['sess_id']?>">
                            <input  hidden class="form-control"  id="edit_id" name="edit_id" type="text" value="<?=$_SESSION['sess_id']?>">
                        </div>
                    </div>
                    <div class="mb-3 row p-2">
                        <label class="col-sm-4 col-form-label">ชื่อ-นามสกุล</label>
                        <div class="col-sm-8">
                            <input type="text" required placeholder=" ชื่อ-นามสกุล " class="form-control"
                                id="edit_Stu_name" name="edit_Stu_name" value="<?=$res['Stu_name']?>">
                        </div>
                    </div>
                    <div class="mb-3 row p-2">
                        <label class="col-sm-4 col-form-label">ภาค</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="edit_Sector" name="edit_Sector">
                                <option value=1 <?=($res['Sector']=='1')? "selected":"";  ?>>ภาคปกติ</option>
                                <option value=2 <?=($res['Sector']=='2')? "selected":"";  ?>>ภาควันอาทิตย์</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row p-2">
                        <label class="col-sm-4 col-form-label">สาขา</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="edit_stu_BA" name="edit_stu_BA">
                                <option value=1 <?=($res['Stu_BA']=='1')? "selected":"";  ?>>วิศวกรรมเครื่องกล</option>
                                <option value=2 <?=($res['Stu_BA']=='2')? "selected":"";  ?>>วิศวกรรมไฟฟ้า </option>
                                <option value=3 <?=($res['Stu_BA']=='3')? "selected":"";  ?>>วิศวกรรมอุตสาหการ</option>
                                <option value=4 <?=($res['Stu_BA']=='4')? "selected":"";  ?>>
                                    เทคโนโลยีการจัดการอุตสาหกรรม</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row p-2">
                        <label class="col-sm-4 col-form-label">เบอร์โทรศัพท์</label>
                        <div class="col-sm-8">
                            <input type="text" required placeholder="เบอร์โทรศัพท์" class="form-control" id="edit_Phone"
                                name="edit_Phone" value="<?=$res['Phone']?>">
                        </div>
                    </div>
                    <div class="mb-3 row p-2">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="edit_email"  value="<?=$res['email']?>"
                                name="edit_email" required>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button name="button_edit" value="insert" type="summit" class="btn btn-primary"
                        data-bs-dismiss="modal">แก้ไข</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>