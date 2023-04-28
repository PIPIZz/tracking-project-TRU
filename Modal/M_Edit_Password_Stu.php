<div class="modal" id="Modal_editpassword" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขรหัสผ่าน</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="../Process/P_Edit_Password.php" method="GET">
                <!-- Modal body -->
                <div class="modal-body">

                    <div class="mb-3 row p-2">
                        <label class="col-sm-4 col-form-label">รหัสผ่านเก่า</label>
                        <div class="col-sm-8">
                        <input placeholder="Old Password"  class="form-control " type="password" >
                        </div>
                    </div>
                    <div class="mb-3 row p-2">
                        <label class="col-sm-4 col-form-label">รหัสผ่านใหม่</label>
                        <div class="col-sm-8">
                        <input placeholder="New Password"  class="form-control " type="password"  name="edit_Password1" >
                        </div>
                    </div>
                    <div class="mb-3 row p-2">
                        <label class="col-sm-4 col-form-label">ยืนยันรหัสผ่านใหม่</label>
                        <div class="col-sm-8">
                        <input placeholder="New Password"  class="form-control " type="password"  name="edit_Password2" >
                        </div>
                    </div>
                
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button name="button_edit" value="insert" type="summit" class="btn btn-primary"
                        data-bs-dismiss="modal">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                </div>
            </form>
        </div>
    </div>
</div>