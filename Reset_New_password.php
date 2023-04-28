<div class="position-absolute top-50 start-50 translate-middle"> 
    <div class="card border-dark mb-3" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title text-center">
                <img src="img/logo1.png" alt="logo" width="102" height="100" class="logo-img">
                <span class="splash-description">
                    <h3> มหาวิทยาลัยธนบุรี</h3>
                </span>
            </h5>
            <br><br>
            <?php
                if($_GET['key'] && $_GET['token'])
                {
                    include('./connect/config.php');
                    $email = $_GET['key'];
                    $token = $_GET['token'];

                    $sql = "SELECT * FROM student WHERE email =$email  ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    $row = $stmt->fetch();
                    
                    // echo $count ;
                    // print_r($row);
                    $curDate = date("Y-m-d H:i:s");

                        if ($count > 0) {
                        if($row['exp_date'] >= $curDate){ ?>
                                <h4 class="text-center pm-3"> รีเซ็ตรหัสผ่าน</h4>
                                <div class="mb-3 row p-2">
                                    <label class="col-sm-4 col-form-label">รหัสผ่านใหม่</label>
                                    <div class="col-sm-8">
                                        <input type="password"  placeholder="Password" class="form-control" id="password1"  name="password1" >
                                    </div>
                                </div>

                                <div class="mb-3 row p-2">
                                    <label class="col-sm-4 col-form-label">ยืนยันรหัสผ่านใหม่</label>
                                    <div class="col-sm-8">
                                        <input type="password" placeholder="Password" class="form-control" id="password2"  name="password2" >
                                    </div>
                                </div>
                                <input type="text" id="email" hidden value="<?=$email?>">
                                <input type="text" id="token" hidden  value="<?=$token?>">

                                <div class="row  align-self-center">
                                    <div class="col text-end"> <button type="submit" id="button_reset" name="button_reset"  value="insert" class="btn btn-primary">ยืนยัน</button></div>
                                    <div class="col"> <a href="index.php?menu=home" class="btn btn-danger" type="button"> ยกเลิก</a></div>
                                </div>
                <?php       }
                        } else { ?> 

                    <h5 class="text-center">This forget password link has been expired</h5> 
                <?php }?>


                <?php }else { ?> 
                    <h5 class="text-center">This Don't Have key and Token</h5> 
                    <?php } ?>
        </div>
    </div>
   
</div>

<script>
 $("#button_reset").click(function() {
    console.log('click');
    var pass1 = document.getElementById("password1").value;
    var pass2 = document.getElementById("password2").value;
    var email = document.getElementById("email").value;
    var token = document.getElementById("token").value;

    if(pass1 != pass2){
        throw alert('Password Not Match');
        
    }else{
        window.open('Process/P_reset_Newpassword.php?password1=' + pass1 +'&email=' + email +'&token=' + token)
    }

    // console.log(pass1);
    // console.log(pass2);
    
 })

</script>