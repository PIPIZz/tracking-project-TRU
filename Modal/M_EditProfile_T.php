<div id="mod-EditProfileT" tabindex="-1" role="dialog" style="" class="modal fade ">
    <div class="modal-dialog">
        <form action="../Process_Faculty/P_EditProfile_f.php" method="GET" style="border-radius: 0px;"
            class="form-horizontal group-border-dashed">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span
                            class="mdi mdi-close"></span></button>
                    <div class="text-center">
                        <h3>แก้ไขข้อมูลส่วนตัว</h3>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row col-sm-12">


                        <div class="form-group">
                            <label class="col-sm-4 control-label">Username / รหัสผู้ใช้</label>
                            <div class="col-sm-6">
                                <input type="text" readonly="readonly" id="edit_id" name="edit_id" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">ชื่อ-นามสกุล</label>
                            <div class="col-sm-6">
                                <input type="text" id="edit_T_name" name="edit_T_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">สาขา</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="edit_T_BA" name="edit_T_BA">
                                    <option value=1>วิศวกรรมเครื่องกล</option>
                                    <option value=2>วิศวกรรมไฟฟ้า </option>
                                    <option value=3>วิศวกรรมอุตสาหการ</option>
                                    <option value=4>เทคโนโลยีการจัดการอุตสาหกรรม</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" id="edit_status" name="edit_status">
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="text-right">
                        <button name="button_edit" value="insert" type="summit"
                            class="btn btn-space btn-primary btn-lg ">แก้ไข</button>
                        <button class="btn btn-space btn-default btn-lg" data-dismiss="modal" aria-hidden="true"
                            class="close">ยกเลิก</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>