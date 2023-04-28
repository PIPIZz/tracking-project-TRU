<?php
require_once('../Process/P_C_session.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php');?>

<body>
    <div class="be-wrapper bbe-fixed-sidebar be-color-header-danger">
        <?php require_once('navbar.php');?>
        <div class="be-content">

            <?php
                        $menu=isset($_GET['menu']);
                        if($menu == 1){
                            if($_GET['menu'] == "home"){
                                require_once('home.php');
                            }else if($_GET['menu'] == 'teacher'){
                                require_once('Teacher.php');                           
                            }else if($_GET['menu'] == 'enroll'){
                                require_once('Enroll_stu.php');
                            }else if($_GET['menu'] == 'Date_test'){
                                require_once('Test_date.php');  
                            }else if($_GET['menu'] == 'logout'){
                                require_once('../Process/P_Logout.php');
                            }   
                         }
                ?>

        </div>

    </div>
    <?php require_once('footter.php');?>
</body>

</html>