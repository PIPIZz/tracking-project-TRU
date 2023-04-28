<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php'); ?>

<body>
    <div class="be-wrapper bbe-fixed-sidebar be-color-header-danger">
        <div class="be-content">

            <?php    
           
          
            $menu=isset($_GET['menu']);
                    if($menu == 1){
                        if($_GET['menu'] == "register"){
                            require_once('regis.php');
                        }else if($_GET['menu'] == 'home'){
                            require_once('home.php');
                        }else if($_GET['menu'] == 'role'){
                            require_once('PageWhichrole.php');
                        }else if($_GET['menu'] == 'reset'){
                            require_once('Resetpassword.php');
                        }else if($_GET['menu'] == 'reset_new'){
                            require_once('Reset_New_password.php');
                        }
                    }else{
                         require_once('home.php');    
                        }
            ?>

        </div>

    </div>
    <?php require_once('footter.php');?>
</body>

</html>