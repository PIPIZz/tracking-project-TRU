<?php require_once('../Process/P_C_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('head.php'); ?>

<body>
<div class="be-wrapper be-fixed-sidebar ">


<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="d-flex flex-column " style="width : 230px; min-height : 100vh">
            <?php require_once('navbar.php');?>
        </div>
        <div class="col bg-light bg-gradient">
            <?php
                $menu=isset($_GET['menu']);
                if($menu == 1){
                    if($_GET['menu'] == 'home'){
                        require_once('home.php');
                    }else if($_GET['menu'] == 'Project'){
                        require_once('Project.php');
                    }else if($_GET['menu'] == 'editProfile'){
                        require_once('EditProfile.php');
                    }else if($_GET['menu'] == 'table'){
                        require_once('./Project/Tb_member.php');
                    }else if($_GET['menu'] == 'logout'){
                        require_once('../Process/P_Logout.php');
                    }else if($_GET['menu'] == 'test'){
                        require_once('./Project/test.php');
                    }
                 }

            ?>
        </div>
    </div>
</div>
</div>
    <?php require_once('footter.php');?>
</body>

</html>