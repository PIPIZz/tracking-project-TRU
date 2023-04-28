<?php
require_once('../Process/P_C_session.php'); 
?>
<script language="javascript">
function fncSubmit() {
    var Year = document.getElementById('Year').value
    var BA = document.getElementById('BA').value
    var Term = document.getElementById('Term').value
    window.location.href = "index.php?menu=report&Year=" + Year +
        "&BA=" + BA + "&Term=" + Term;
}
</script>


<div class="main-content container-fluid">
    <div class="panel panel-default panel-border-color panel-border-color-primary">
        <div class="panel-heading panel-heading-divider">ออกรายงาน</div>
        <div class="panel-body">
            <div class="row">
                <form action="" method="GET" class="form-horizontal group-border-dashed">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?php              
                                            $id=$_SESSION['sess_id'];
                                            include('../connect/config.php');     
                                            $sql_year = "SELECT DISTINCT  Year FROM project ORDER BY Year DESC;";
                                            $stmt_year = $conn->prepare($sql_year);
                                            $stmt_year->execute();
                                            $res_year = $stmt_year->fetchAll();

                                            $BA =  $_SESSION['sess_BA'] ;   
                                            $sql_ba = "SELECT * FROM ba WHERE BA_id = $BA";
                                            $stmt_ba = $conn->prepare($sql_ba);
                                            $stmt_ba -> execute();
                                            $res_ba = $stmt_ba->fetch(); 
                                            $ba_name =$res_ba['BA_name'];
                                        ?>

                            <div class="col-sm-4">
                                <label class="col-sm-auto control-label">เลือกปีการศึกษา</label>
                                <select class="form-control" id="Year" name="Year">
                                    <?php foreach($res_year as $val){ ?>
                                    <option value=<?=$val['Year'];?>> <?php echo $val['Year']+543;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-auto control-label">เลือกเทอมการศึกษา</label>
                                <select class="form-control" id="Term" name="Term">
                                    <option value=1> 1</option>
                                    <option value=2> 2</option>
                                    <option value=3> 3</option>
                                </select>
                            </div>


                            <div class="col-sm-4">
                                <label class="col-sm-auto control-label">สาขา</label>
                                <input class="form-control"  readonly value="<?=$ba_name?>">
                                <input class="form-control hidden" id="BA" name="BA"  value="<?=$BA?>">
                            </div>

                        </div>
                        <div>
                            <p class="text-right">
                                <button class="btn btn-space btn-success btn-lg " type="button" id="sum"
                                    OnClick="fncSubmit()">
                                    <h4> ค้นหา</h4>
                                </button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
