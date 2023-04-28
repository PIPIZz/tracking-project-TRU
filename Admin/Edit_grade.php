<?php
session_start();
require_once('../Process/P_C_session.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('head.php');

?>

<body>
    <div class="be-wrapper bbe-fixed-sidebar be-color-header-danger">
        <?php require_once('navbar.php');?>
        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="../Process_admin/P_Save_Grade.php" method="POST">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-heading panel-heading-divider">รายละเอียดโครงงาน</div>
                                <div class="panel-body">
                                    <div style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                                        <?php 
                                    session_start();
                                    $id=$_GET['id'];                                   
                                    include('../connect/config.php');
                                    // print $id;
                                    $sql = "SELECT * FROM project Where Pro_id = '$id'  ";
                                    $stmt = $conn->prepare($sql);
                                    $stmt ->execute();
                                    $res = $stmt->fetch(); 
                               
                                    ?>
                                        <input type="hidden" id="Pro_id" name="Pro_id" value="<?=$res['Pro_id']?>"
                                            class="form-control ">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">ชื่อโครงงาน</label>
                                            <div class="col-sm-6">
                                                <input type="text" value="<?=$res['Pro_name'];?>" disabled="disabled"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                <h4>อาจารย์ที่ปรึกษา</h4>
                                            </label>
                                            <?php        
                                                $t1 = $res['Teacher_1'];        
                                                $sql1 = "SELECT * FROM  teacher  WHERE T_id = '$t1' ";
                                                $stmt1 = $conn->prepare($sql1);
                                                $stmt1 ->execute();
                                                $res1 = $stmt1->fetch();
                                                ?>
                                            <div class="col-sm-6">
                                                <input type="text" value="<?=$res1['T_name'];?>" disabled="disabled"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <?php if($res['Teacher_2'] == ""){}else{ ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                <h4>อาจารย์ที่ปรึกษาร่วม</h4>
                                            </label>
                                            <div class="col-sm-6">
                                                <?php  
                                                    $t2 = $res['Teacher_2'];        
                                                    $sql2 = "SELECT * FROM  teacher  WHERE T_id = '$t2' ";
                                                    $stmt2 = $conn->prepare($sql2);
                                                    $stmt2 ->execute();
                                                    $res2 = $stmt2->fetch();
                                                    ?>

                                                <input type="text" value="<?=$res2['T_name'];?>" disabled="disabled"
                                                    class="form-control">

                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="panel-divider"></div>
                                        <div class="col-sm-12">
                                            <div class="form-group no-padding">
                                                <div class="col-sm-7">
                                                    <h3 class="wizard-title">รายชื่อสมาชิก</h3>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center">ลำดับ</th>
                                                            <th style="text-align: center">รหัสนักศึกษา</th>
                                                            <th style="text-align: center">ชื่อ-นามสกุล</th>
                                                            <th style="text-align: center">ภาค</th>
                                                            <th style="text-align: center">สาขา</th>
                                                            <th style="text-align: center">เบอร์โทร</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                include('../connect/config.php');
                                                 $sql1 = "SELECT * FROM project_detail as d INNER JOIN student as s ON s.id=d.Stu_id INNER JOIN sector as se ON se.Sector_id=s.Sector  WHERE Pro_id = '$id' ";
                                                $stmt1 = $conn->prepare($sql1);
                                                $stmt1->execute();
                                                $res1 = $stmt1->fetchAll();
                                                $i = 1;
                                                foreach($res1 as $index => $val){       
                                                    if($val['Stu_BA'] == 1 ){
                                                        $ba = "วิศวกรรมเครื่องกล";
                                                    }else if($val['Stu_BA'] == 2 ){
                                                        $ba = "วิศวกรรมไฟฟ้า";
                                                    }else if($val['Stu_BA'] == 3 ){
                                                        $ba = "วิศวอุตสาหการ";
                                                    }else if($val['Stu_BA'] == 4 ){
                                                        $ba = "เทคโนโลยีอุตสาหกรรม";
                                                    }
                                                    ?>
                                                        <tr>
                                                            <td style="text-align: center"><?=$i?></td>
                                                            <td style="text-align: center">
                                                                <?=$val['Stu_id'];?>
                                                                <input type="hidden" id="Stu_id[<?=$i?>]"
                                                                    name="Stu_id[<?=$i?>]" value="<?=$val['Stu_id']?>"
                                                                    class="form-control ">
                                                            </td>
                                                            <td style="text-align: center"><?=$val['Stu_name'];?></td>
                                                            <td style="text-align: center"><?=$val['Sector_name'];?>
                                                            </td>
                                                            <td style="text-align: center"><?=$ba;?></td>
                                                            <td style="text-align: center"><?=$val['Phone'];?></td>
                                                            <td>
                                                                <div class="col-sm-6">
                                                                    <select class="form-control"
                                                                        id="edit_Grade[<?=$i?>]"
                                                                        name="edit_Grade[<?=$val['Stu_id']?>]">
                                                                        <option value="A"
                                                                            <?php if ($val['Grade'] == 'A') { echo ' selected="selected"'; } ?>>
                                                                            A </option>
                                                                        <option value="B+"
                                                                            <?php if ($val['Grade'] == 'B+') { echo ' selected="selected"'; } ?>>
                                                                            B+</option>
                                                                        <option value="B"
                                                                            <?php if ($val['Grade'] == 'B') { echo ' selected="selected"'; } ?>>
                                                                            B</option>
                                                                        <option value="C+"
                                                                            <?php if ($val['Grade'] == 'C+') { echo ' selected="selected"'; } ?>>
                                                                            C+</option>
                                                                        <option value="C"
                                                                            <?php if ($val['Grade'] == 'C') { echo ' selected="selected"'; } ?>>
                                                                            C</option>
                                                                        <option value="D+"
                                                                            <?php if ($val['Grade'] == 'D+') { echo ' selected="selected"'; } ?>>
                                                                            D+</option>
                                                                        <option value="D"
                                                                            <?php if ($val['Grade'] == 'D') { echo ' selected="selected"'; } ?>>
                                                                            D</option>
                                                                        <option value="F"
                                                                            <?php if ($val['Grade'] == 'F') { echo ' selected="selected"'; } ?>>
                                                                            F</option>
                                                                        <option value="P"
                                                                            <?php if ($val['Grade'] == 'P') { echo ' selected="selected"'; } ?>>
                                                                            P</option>
                                                                        <option value=""
                                                                            <?php if ($val['Grade'] == '') { echo ' selected="selected"'; } ?>>
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <input type="hidden" id="i" name="i" value="<?=$i?>"
                                                            class="form-control ">
                                                        <?php     $i++;    }         ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <p class="text-right">
                                            <button name="button_editGrade" name="insert" type="summit"
                                                class="btn btn-space btn-primary btn-lg "> บันทึกเกรด</button>
                                            <a class="btn btn-space btn-default btn-lg"
                                                href="index.php?menu=grade">ยกเลิก</a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php require_once('footter.php');?>
</body>

</html>