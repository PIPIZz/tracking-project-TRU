<div id="Edit_Password" tabindex="-50" role="dialog" class="modal fade  colored-header colored-header-dark">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form action="../Process_admin/P_Edit_Password.php" method="GET" style="border-radius: 0px;"
                class="form-horizontal group-border-dashed">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span
                            class="mdi mdi-close"></span></button>
                    <div class="text-center">
                        <h3>แก้ไขรหัสผ่าน</h3>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">รหัสผ่านใหม่เก่า</label>
                            <div class="col-sm-8">
                                <input type="password"  name="Password" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">รหัสผ่านใหม่</label>
                            <div class="col-sm-8">
                                <input type="password"  name="edit_Password1" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">รหัสผ่านใหม่</label>
                            <div class="col-sm-8">
                                <input type="password" name="edit_Password2" class="form-control">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="sumbit" name="button_edit" value="edit"
                        class="btn btn-primary btn-lg">แก้ไข</button>
                        
                    <button type="button"  class="btn btn-defaut btn-lg" data-dismiss="modal" aria-hidden="true"
                        class="close">ยกเลิก</button>

                </div>
            </form>
        </div>
    </div>
</div>