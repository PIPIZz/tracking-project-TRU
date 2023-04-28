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
            <form action="./Process/P_Resetpassword_token.php" method="post" >
                <div class="mb-3 row p-2">
                    <label class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input placeholder="Email" class="form-control" id="email" name="email" type="email">
                    </div>
                </div>


                <div class="row  align-self-center">
                    <div class="col text-end"> <button type="submit" name="password-reset-token" value="insert" class="btn btn-primary" >ส่งลิ้งผ่านอีเมลล์</button></div>
                    <div class="col"> <a href="index.php?menu=home" class="btn btn-danger" type="button"> ย้อนกลับ</a></div>
                </div>

            </form>

        </div>
    </div>
</div>