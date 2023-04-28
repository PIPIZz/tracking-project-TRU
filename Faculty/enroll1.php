<?php 
$BA_id =$_GET[baid];
include('../connect/config.php');                               
$sql = "SELECT * FROM project as p  INNER JOIN step ON step_id = p.Step  INNER JOIN sector as s ON s.Sector_id=p.Pro_sector INNER JOIN ba as b ON p.Pro_BA =b.BA_id WHERE p.Pro_BA =$BA_id ORDER BY Year DESC  ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

$ba_name =$result[0]['BA_name'];
?>
<div class="main-content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table">
                <div class="panel-heading">นักศึกษา<?php echo $ba_name?>
                </div> 
                <form action="D.php" method="GET" class="form-horizontal group-border-dashed">
                    <div class="panel-body">
                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                                <tr>
                                    <th style="text-align: center">ลับดับที่</th>
                                    <th >ชื่อโครงงาน</th>
                                    <th >ภาค</th>
                                    <th style="text-align: center">ปีการศึกษา</th>
                                    <th style="text-align: center">สถานะโครงงาน</th>
                                    <th style="text-align: center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $i = 1;
                                foreach($result as $val){
                                ?>
                                <tr class="odd gradeX">
                                <td style="text-align: center"><?=$i?></td>
                                <td ><?=$val['Pro_name']?></td>
                                <td ><?=$val['Sector_name']?></td>
                                <td style="text-align: center"><?=$val['Year']+543?></td>
                                <td style="text-align: center"><?=$val['step_name']?><br>
                                <td style="text-align: center"><a href="Detail_enroll.php?id=<?=$val['Pro_id'];?>"
                                        class="btn btn-space btn-success btn-l "> รายละเอียดโครงงาน</a> 
                                </td>
                                </tr>
                                <?php $i++; } ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../Modal/M_ResultPro_T.php');?>
<script src="../assets/jquery.min.js"> </script>
<script>
$(document).ready(function() {
    $('.ModalEdit_Pro_btn').click(function() {
        //get data from edit btn
        var Pro_id = $(this).attr('data-id');
        // alert(StuID);
        $.get('../Process/P_Get_Pro1.php?Pro_id=' + Pro_id,
            function(data) {
                // alert(data);
                var result = JSON.parse(data);
                console.log(result);
                // alert(result);
                $('#mod-result').modal('show');
                for (var i in result) {
                    $('#edit_id').val(result[i].Pro_id);
                    $('#edit_Pro_name').val(result[i].Pro_name);
                    $('#edit_Year').val(result[i].Year);
                    $('#edit_Term').val(result[i].Term);
                    $('#edit_BA').val(result[i].BA);
                    $('#edit_Teacher_1').val(result[i].Teacher_1);
                    $('#edit_Step').val(result[i].Step);
                    $('#edit_T_name').val(result[i].T_name);
                }
            });
    });
});
</script>