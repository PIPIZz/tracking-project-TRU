<?php 
if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
}else{
    $menu = 'home';
}


?>
<div class="position-absolute top-50 start-50 translate-middle">
    <div class="col-12" <?php if($_GET['alert'] == ''){ echo 'hidden';}else{}  ?>>  
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            <div class="d-flex align-items-center">
             <i class="bi bi-check-circle-fill px-2" style="font-size: 2rem; "></i> <strong>  ลงทะเบียนสำเร็จ !</strong> 
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
    </div>

    <div class="card text-center border-dark mb-3" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">
                <img src="img/logo1.png" alt="logo" width="102" height="100" class="logo-img">
                <span class="splash-description">
                    <h3> มหาวิทยาลัยธนบุรี</h3>
                </span>
            </h5>
            <br><br>
            <form action="./Process/P_Login.php" method="post">
                <div class="row justify-content-center">
                    <div class="form-floating col-8">
                        <input type="text" class="form-control" name="username" placeholder="รหัสนักศึกษา">
                        <label for="floatingInput">รหัสนักศึกษา</label>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="form-floating col-8">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>

                <br>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary col-6" name="login" value="login">เข้าสู่ระบบ</button>
                </div>
                <div class="row justify-content-center m-4">
                    <hr class="divider  col-8">
                </div>
                <div class="row">
                    <div class="col "><a href="index.php?menu=register" class="nav-link">ลงทะเบียน</a></div>
                    <div class="col"><a href="index.php?menu=reset" class="nav-link"> ลืมรหัสผ่านใช่หรือไม่</a></div>
                </div>
            </form>
        </div>
    </div>
</div>