<?php

if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
}

?>

<img src="../img/logo1.png" class="p-3" alt="">
<ul class="nav nav-pills nav-pills flex-column mb-auto" id="menu">
    <li>
        <a href="index.php?menu=home" class="nav-link <?=($menu=="home")? "active":"";  ?>" aria-current="page">
            <i class="fs-4 bi-house" width="16" height="16"></i> <span class="ms-1 d-none d-sm-inline">หน้าแรก</span>
        </a>
    </li>
    <li>
        <a href="index.php?menu=Project" class="nav-link <?=($menu=="Project")? "active":"";  ?>">
            <i class="fs-4 bi-pencil-square" width="16" height="16"></i> <span
                class="ms-1 d-none d-sm-inline">จัดการโครงงาน</span>
        </a>
    </li>
    <li>
        <a href="index.php?menu=logout" class="nav-link <?=($menu=="logout")?  "active":" ";  ?>">
            <i class="fs-4 bi-gear" width="16" height="16"></i> <span class="ms-1 d-none d-sm-inline">ลงชื่อออก</span>
        </a>
    </li>
   
</ul>
