<form action="../Process_Project/P_Update_upload.php" method="POST" enctype="multipart/form-data">

    <?php
            session_start();
            include('../connect/config.php');
            $id = $_SESSION['sess_id'];

            $sql = "SELECT * FROM project_detail as d INNER JOIN project as p ON d.Pro_id = p.Pro_id Where Stu_id = '$id' ";
            $stmt = $conn->prepare($sql);
            $stmt ->execute();
            $res = $stmt->fetch();
            $p=$res['Pro_id'];
            // echo $p;
            $sql1 = "SELECT * FROM file1 as f INNER JOIN file_detail as d ON d.F_id = f.F_id Where Pro_id = '$p' AND f.Type = 1 ";
            $stmt1 = $conn->prepare($sql1);
            $stmt1 ->execute();
            $res1 = $stmt1->fetch();
    ?>
    <div class="card">
        <div class="card-body">

            <label class="col-sm-3 form-label">
                <h4>ส่งเล่มบทที่ 1</h4>
            </label>
            <br>
            <p class="text-center">
                ไม่ผ่าน <br><br>
                เนื่องจาก...<?=$res1['Text_c']?>
                <br>
            </p>

            <p class="text-center">
                ดาวน์โหลดไฟล์แก้ไข 
                <a href="<?="../fileupload/".$res1['File'];?>" target="_blank" class="btn btn-primary">Download</a></button>
                <br>
            </p>

            <div class="mb-3">
                <label class="form-label h4">อัพโหลดไฟล์บทที่ 1</label>
                <input class="form-control" type="file" id="fileupload1" name="fileupload1">
            </div>
        </div>
        <div class="col-md-12 p-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn  btn-success" type="sumbit" name="submit" value="insert">
                    บันทึก
                </button>
            </div>
        </div>
    </div>
    <input type="hidden" id="Pro_id" name="Pro_id" value="<?=$res['Pro_id']?>" class="form-control ">

    <input type="hidden" id="F_id" name="F_id" value="<?=$res1['F_id']?>" class="form-control ">
    <input type="hidden" id="status" name="status" value=1 class="form-control ">
    <input type="hidden" id="type" name="type" value=1 class="form-control ">
</form>
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
</script>