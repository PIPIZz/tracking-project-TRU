<?php
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

                <div class="report_tbl">
                    <?php
                     include('../connect/config.php');   
                        $Year = $_GET['Year'];
                        $Term = $_GET['Term'];
                        $BA = $_GET['BA'];   
                        $sql_ba = "SELECT * FROM ba WHERE BA_id = $BA";
                        $stmt_ba = $conn->prepare($sql_ba);
                        $stmt_ba -> execute();
                        $res_ba = $stmt_ba->fetch(); 
                        $ba_name =$res_ba['BA_name'];

                    ?>
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">รายงานสรุปการสอบโครงงาน 1 ปีการศึกษา <?php echo $Year+543 ?> เทอม
                            <?php echo $Term ?> สาขา <?php echo $ba_name?>
                            <div class="tools">
                                <span> 
                                    <a href="./report_copy.php?Year=<?=$_GET['Year']?>&Term=<?=$_GET['Term']?>&BA=<?=$_GET['BA']?>"
                                        target="_blank">
                                      ออกรายงาน <img src="../assets/img/icon/printer (1).png" >
                                    </a>
                                </span>

                            </div>
                        </div>


                        <table id="table1" class="table table-striped table-hover table-fw-widget">
                            <thead>
                                <tr>
                                    <th>ลับดับที่</th>
                                    <th>ชื่อโครงงาน</th>
                                    <th>รายชื่อคณะกรรมการ</th>
                                    <th>ชื่ออาจารย์ที่ปรึกษา</th>
                                    <th>รายชื่อผู้เข้าสอบ</th>
                                    <th>จำนวนรวม</th>
                                    <th>เกรด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                           
                            $id=$_SESSION['sess_id'];
                                   
                            $sql = "SELECT 
                            p.Pro_id,
                            Pro_name,                  
                            Teacher_1,
                            Teacher_2, 
                            Grade,
                            COUNT(*) as count_project
                            FROM project as p
                            INNER JOIN project_detail as pd ON p.Pro_id = pd.Pro_id 
                            INNER JOIN teacher as t ON p.Teacher_1 = t.T_id 
                            INNER JOIN student as s ON pd.Stu_id = s.id 
                            INNER JOIN date_test as date ON date.Pro_id = p.Pro_id
                            INNER JOIN director as d ON d.Direc_id = date.Direc_id 
                            WHERE p.Step = 6 AND Pro_BA = $BA AND Year = $Year AND Term = $Term
                            GROUP BY Pro_name ";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            $i = 1;
                            foreach($result as $val){          
                               
                                $SQL ="SELECT * FROM project_detail WHERE Pro_id ='".$val['Pro_id']."' " ;
                                $stmt_Sql = $conn->prepare($SQL);
                                $stmt_Sql->execute();
                                $res_SQL = $stmt_Sql->fetchAll();

                                $SQL_test ="SELECT Direc_id FROM date_test WHERE Pro_id ='".$val['Pro_id']."' " ;
                                $stmt_test = $conn->prepare($SQL_test);
                                $stmt_test->execute();
                                $res_test = $stmt_test->fetchAll();

                                $sql_Direc = "SELECT count(*) FROM date_test as dt  WHERE dt.Pro_id = '".$val['Pro_id']."' ";
                                $Direc_nRows = $conn->query($sql_Direc)->fetchColumn();

                                $sql_stu_num = "SELECT count(*) FROM project_detail WHERE Pro_id = '".$val['Pro_id']."'";
                                $Stu_nRows = $conn->query($sql_stu_num)->fetchColumn();

                                ?>

                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $val['Pro_name'];?></td>
                                    <td>
                                        <?php
                                            
                                            $j = 1;
                                            foreach($res_test as $item){
                                                $sql_Direcn = "SELECT * FROM director WHERE Direc_id='".$item['Direc_id']."'";
                                                $stmt_Direcn = $conn->prepare($sql_Direcn);
                                                $stmt_Direcn->execute();
                                                $res_Direcn = $stmt_Direcn->fetch();
                                                echo $j.") ".$res_Direcn['Direc_name']."<br>";
                                                $j++;
                                                
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <?php 
                                    $t1 = $val['Teacher_1'];        
                                    $sql1 = "SELECT * FROM  teacher  WHERE T_id = '$t1' ";
                                    $stmt1 = $conn->prepare($sql1);
                                    $stmt1 ->execute();
                                    $res1 = $stmt1->fetch();
                                    
                                    $t2 = $val['Teacher_2'];        
                                    $sql2 = "SELECT * FROM  teacher  WHERE T_id = '$t2' ";
                                    $stmt2 = $conn->prepare($sql2);
                                    $stmt2 ->execute();
                                    $res2 = $stmt2->fetch();
                                    

                                    echo $res1['T_name']."<br>"; 
                                    echo $res2['T_name']; 
                                    ?></td>
                                    <td><?php
                                        foreach($res_SQL as $items){
                                            $sql_Stu = "SELECT * FROM student WHERE id='".$items['Stu_id']."'";
                                            $stmt_Stu = $conn->prepare($sql_Stu);
                                            $stmt_Stu->execute();
                                            $res_Stu = $stmt_Stu->fetch();
                                            echo $res_Stu['Stu_name']."<br>";
                                    
                                        }
                                        ?></td>
                                    <td><?php echo $Stu_nRows;?></td>
                                    <td><?php
                                        foreach($res_SQL as $itemGrade){
                                            $sql_Grade = "SELECT * FROM project_detail WHERE Stu_id='".$itemGrade['Stu_id']."'";
                                            $stmt_Grade = $conn->prepare($sql_Grade);
                                            $stmt_Grade->execute();
                                            $res_Grade = $stmt_Grade->fetch();
                                            echo $res_Grade['Grade']."<br>";
                                        }
                                         ?></td>
                                </tr>
                                <?php   $i++; }?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php require_once('footter.php');?>

</html>