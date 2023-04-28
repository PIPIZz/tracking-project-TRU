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
                            if($_GET['menu'] == "Profile"){
                                require_once('Profile.php');
                            }else if($_GET['menu'] == 'home'){
                                require_once('home.php');

                            }else if($_GET['menu'] == 'teacher'){
                                require_once('Teacher.php');                                 
                            }else if($_GET['menu'] == 'edit_t'){
                                require_once('Edit_T.php');  
                            }else if($_GET['menu'] == 'Ba'){
                                require_once('enroll1.php');
                            }else if($_GET['menu'] == '4'){
                                require_once('enroll4.php');
                            }else if($_GET['menu'] == 'result_Project2'){
                                require_once('Result_Project2.php'); 
                                
                                
                            }else if($_GET['menu'] == 'Date_test'){
                                require_once('Date_test.php');        
                            }else if($_GET['menu'] == 'report'){
                                require_once('re.php');        
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