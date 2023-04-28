<div id="Add_Teacher3" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form action="../Process_Faculty/P_Add_teacher.php" method="GET" style="border-radius: 0px;"
                class="form-horizontal group-border-dashed">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span
                            class="mdi mdi-close"></span></button>
                    <div class="text-center">
                        <h3>เพิ่มข้อมูลเจ้าหน้าที่</h3>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="col-sm-12">

                            <div class="form-group">
                                <label class="col-sm-3 control-label">รหัสผู้ใช้ / Username</label>
                                <div class="col-sm-8">
                                    <input type="text" id="T_id" name="T_id" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-8">
                                    <input type="text" id="T_name" name="T_name" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" placeholder="Password" id="password" name="password"
                                        class="form-control">
                                </div>
                            </div>

                       
                            <div class="form-group">
                                <label class="col-sm-3 control-label">สถานะ</label><br>
                                <div class="col-sm-8">
                                    <select class="form-control" id="status" name="status">
                                        <option value="Teacher">อาจารย์ที่ปรึกษา </option>
                                        <option value="Admin">แอดมิน</option>
                                        <option value="Secretary">เลขาคณะ</option>
                                        <option value="T_Admin">อาจารย์ & แอดมิน</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">สาขา</label><br>
                                <div class="col-sm-8">
                                    <select class="form-control" id="T_BA" name="T_BA">
                                        <option value=1>วิศวกรรมเครื่องกล</option>
                                        <option value=2>วิศวกรรมไฟฟ้า </option>
                                        <option value=3>วิศวกรรมอุตสาหการ</option>
                                        <option value=4>เทคโนโลยีการจัดการอุตสาหกรรม</option>                                       
                                    </select>
                                </div>

                            </div>

                    </div>

                    <div class="modal-footer">
                        
                        <button type="sumbit" name="button_click" value="insert"
                            class="btn btn-space btn-primary btn-lg ">เพิ่มข้อมูล</button>



                        <button class="btn btn-space btn-default btn-lg" data-dismiss="modal" aria-hidden="true"
                            class="close">ยกเลิก</button>
                       
                    </div>
            </form>
        </div>
    </div>
</div>