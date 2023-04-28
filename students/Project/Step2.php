<form action="../Process_Project/P_Upload1.php" method="POST" class="form-horizontal group-border-dashed"
    enctype="multipart/form-data">
    <div class="card" style="width: ">
        <div class="card-body">

            <label class="col-sm-3 form-label">
                <h4> เพิ่มไฟล์ บทที่ 1</h4>
            </label>
            <br>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">กรุณาเลือก File</label>
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
    <?php
            include('../connect/config.php');
            $id = $_SESSION['sess_id'];
            $sql = "SELECT * FROM project_detail as d INNER JOIN project as p ON d.Pro_id = p.Pro_id Where Stu_id = '$id' ";
            $stmt = $conn->prepare($sql);
            $stmt ->execute();
            $res = $stmt->fetch();
    ?>

    <input type="hidden" id="Pro_id" name="Pro_id" value="<?=$res['Pro_id']?>" class="form-control ">
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
<script src="../assets/jquery.min.js"> </script>