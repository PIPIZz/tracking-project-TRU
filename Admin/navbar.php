<?php
if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
}else{
    $menu = 'home';
}
?>
<nav class="navbar navbar-default navbar-fixed-top be-top-header ">
    <div class="container-fluid ">
        <img src="../img/logo1.png" width="80" height="80">
    </div>
</nav>
<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">เมนู</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                        <li class="divider">เมนู </li>
                        <li class="<?=($menu=="home")? "active":" ";  ?>"><a href="index.php?menu=home">
                                <h4><i class="icon mdi mdi-home"></i><span>หน้าแรก</span></h4>
                            </a>
                        </li>
                        <li class="<?=($menu=="grade")?  "active":" ";  ?>">
                            <a href="index.php?menu=grade">
                                <h4><i class="icon mdi mdi-folder-star-alt"></i><span>เกรด</span></h4>
                            </a>
                        </li>
                        <li class="<?=($menu=="re")?  "active":" ";  ?>">
                            <a href="index.php?menu=re">
                                <h4><i class="icon mdi mdi-file-plus"></i><span>รายงาน</span></h4>
                            </a>
                        </li>
                        <li class="<?=($menu=="logout")?  "active":" ";  ?>">
                            <a href="index.php?menu=logout">
                                <h4><i class="icon mdi mdi-power"></i><span>ออกจากระบบ</span></h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>