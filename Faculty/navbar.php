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
                        <li class="<?=($menu=="home")? "active":" ";  ?>"><a href="index.php?menu=home"><h4><i
                                    class="icon mdi mdi-home"></i><span>หน้าแรก</span></h4></a>
                        </li>
                        <li class="<?=($menu=="Profile")? "active":" ";  ?>"><a href="index.php?menu=Profile"><h4><i
                                    class="icon mdi mdi-account"></i><span>ข้อมูลส่วนตัว</span></h4></a>
                        </li>
                        <li class="<?=($menu=="teacher")? "active":" ";  ?>"><a href="index.php?menu=teacher"><h4><i
                                    class="icon mdi mdi-accounts-add"></i><span>เพิ่มผู้ใช้</span></h4></a>
                        </li>

                        <li class="parent"><a href="#"><h4><i
                                    class="icon mdi mdi-assignment"></i><span>นักศึกษาที่ลงทะเบียน</span></h4></a>
                            <ul class="sub-menu">
                                <?php    
                                include('../connect/config.php');
                                    $sql = "SELECT * FROM ba ";
                                    $stmt = $conn->prepare($sql);
                                    $stmt ->execute();
                                    $res = $stmt->fetchAll();   
                                    foreach($res as $val){
                                        $Ba_id = $val['BA_id'];
                                      $name =  $val['BA_name'];
                                 ?>
                                <li class="<?=($menu == $Ba_id)? "active":" ";  ?>">
                                <?php echo"<a href=index.php?menu=Ba&baid=$Ba_id><h4>$name</h4></a>"; ?>
                                </li>
                                 <?php } ?>
                            </ul>
                        </li>
                        <li class="<?=($menu=="report")? "active":" ";  ?>"><a href="re.php"><h4><i
                                    class="icon mdi mdi-file-plus"></i><span>รายงาน</span></h4></a>
                        </li>
                        <li class="<?=($menu=="Date_test")? "active":" ";  ?>"><a href="index.php?menu=Date_test"><h4><i
                                    class="icon mdi mdi-view-web"></i><span>ตารางสอบ</span></h4></a>
                        </li>
                        <li class="<?=($menu=="logout")?  "active":" ";  ?>"><a href="index.php?menu=logout"><h4><i
                                    class="icon mdi mdi-power"></i><span>ออกจากระบบ</span></h4></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>