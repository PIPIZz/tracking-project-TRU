<?php
    include ('../connect/config.php');

    $id = $_SESSION['sess_id'];

    $sql = "SELECT d.Pro_id, Stu_id, Grade, Pro_name, Year, Term, Pro_BA, Teacher_1, Teacher_2,Step 
    FROM project_detail as d INNER JOIN project as p ON d.Pro_id = p.Pro_id Where Stu_id = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt ->execute();
    $res = $stmt->fetch();

    if($res == ""){
        $step = '0';
    }else if($res !== ""){
        $s= $res['Step'];
        // echo $s;
        $step = $s;  
    }else{
        echo 'Error';
    }
    $pro_id =$res['Pro_id'];
?>
<div class="container">
    <div class="p-3">
        <div class="row">
            <div class="row text-center">
                <div class="col-auto">
                    <div
                        class="card  <?php if($step > 0 ){ echo "text-bg-dark" ;}else if($step == 0){echo 'text-bg-secondary';}  ?>">
                        <div class="card-body">
                            บันทึกแบบเสนอโครงงาน
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div
                        class="card <?php if($step > 1 ){ echo "text-bg-dark" ;}else if($step == 1){echo 'text-bg-secondary';}  ?> ">
                        <div class="card-body">
                            บทที่ 1
                        </div>
                    </div>

                </div>
                <div class="col-auto">
                    <div
                        class="card  <?php if($step > 2 ){ echo "text-bg-dark" ;}else if($step == 2){echo 'text-bg-secondary';}  ?>">
                        <div class="card-body">
                            บทที่ 2
                        </div>
                    </div>

                </div>
                <div class="col-auto">
                    <div
                        class="card  <?php if($step > 3 ){ echo "text-bg-dark" ;}else if($step == 3){echo 'text-bg-secondary';}  ?>">
                        <div class="card-body">
                            บทที่ 3
                        </div>
                    </div>

                </div>
                <div class="col-auto">
                    <div
                        class="card  <?php if($step > 4 ){ echo "text-bg-dark" ;}else if($step == 4){echo 'text-bg-secondary';}  ?>">
                        <div class="card-body">
                            วันสอบโครงงาน
                        </div>
                    </div>

                </div>
                <div class="col-auto">
                    <div
                        class="card  <?php if($step > 5 ){ echo "text-bg-dark" ;}else if($step == 5){echo 'text-bg-secondary';}  ?>">
                        <div class="card-body">
                            โครงงาน
                        </div>
                    </div>

                </div>
                <div class="col-auto">
                    <div
                        class="card  <?php if($step > 6 ){ echo "text-bg-dark" ;}else if($step == 6){echo 'text-bg-secondary';}  ?>">
                        <div class="card-body">
                            โครงงาน
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <?php 
            if($step==0){
                require_once('./Project/Step1.php');
            }else if($step==1){
                $sql4 = "SELECT * FROM file1  WHERE Pro_id = '$pro_id' AND Type = 1 ";
                $stmt4 = $conn->prepare($sql4);
                $stmt4 -> execute();
                $res4 = $stmt4->fetch();    
                $status = $res4['F_Status'];
                               
                if($status == 3){  
                    include('Project/Step2.1.php');
                }else if($status == 1){
                    include('Project/Stepwait.php');
                }else{ 
                    include('Project/Step2.php');
                }                   
            }else if($step==2){
                $sql5 = "SELECT * FROM file1  Where Pro_id = '$pro_id' and Type =2";
                $stmt5 = $conn->prepare($sql5);
                $stmt5 -> execute();
                $res5 = $stmt5->fetch(); 
                $status = $res5['F_Status'];
                               
                if($status == 3){
                    include('Project/Step3.1.php');
                }else if($status == 1){
                    include('Project/Stepwait.php');
                }else{
                    include('Project/Step3.php');
                }                   
                
            }else if($step==3){
                $sql6 = "SELECT * FROM file1  Where Pro_id = '$pro_id' and Type =3";
                $stmt6 = $conn->prepare($sql6);
                $stmt6 -> execute();
                $res6 = $stmt6->fetch(); 
                $status = $res6['F_Status'];                        
             if($status == 3){  
                //  echo $status;    
                 include('Project/Step4.1.php');
             }else if($status == 1){
                 include('Project/Stepwait.php');
             }else{
                 include('Project/Step4.php');
             }                                           

            }else if($step==4){
                include('Project/Step5.1.php');
                
            }else if($step==5){
                $sql_date = "SELECT * FROM date_test  Where Pro_id = '$pro_id' ";
                $stmt_date = $conn->prepare($sql_date);
                $stmt_date -> execute();
                $res_date = $stmt_date->fetch();            
                    if($res_date ==! ""){
                        include('Project/Step5.php');
                    }else if($res_date == ""){
                        include('Project/Step5.1.php');
                    }else{                                  
                        include('Project/Step5.php');
                    } 
            // echo('test');
            }else if($step==6){
                
                $sql_g = "SELECT * FROM project_detail  Where Pro_id = '$pro_id' AND Stu_id = '$id'";
                $stmt_g = $conn->prepare($sql_g);
                $stmt_g -> execute();
                $res_g = $stmt_g->fetch(); 
        
                $grade = $res_g['Grade'];

                if($grade == "I"){    
                    include('Project/Step6.1.php');
                }else{
                    include('Project/Step6.2.php');
                }
            }              
        ?>
        </div>
    </div>
</div>
<script>
function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
    keyboard: false
})
</script>