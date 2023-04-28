<div class="position-absolute top-50 start-50 translate-middle">
    <div class="card text-center" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">
                <img src="img/logo1.png" alt="logo" width="102" height="100" class="logo-img">
                <span class="splash-description">
                    <h3> มหาวิทยาลัยธนบุรี</h3>
                </span>
            </h5>
            <br><br>
            <form action="./Process/P_LoginT.php" method="post">
                <div class="row justify-content-center">
                    <div class="form-check col-4">
                        <input class="form-check-input" type="radio"  name="choice" id="choice1" value=1
                            value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            อาจารย์ที่ปรึกษา
                        </label>
                    </div>
                    <div class="form-check col-4">
                        <input class="form-check-input" type="radio" name="choice" id="choice1" value=2
                            value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            แอดมินสาขา
                        </label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="btn_choice" value="btn_choice">ตกลง</button>
                <div class="row justify-content-center p-2">
                    <hr class="divider  col-4">
                </div>
                <a href="index.php?menu=home" class="nav-link" type="button"> ย้อนกลับ</a>
            </form>
        </div>
    </div>
</div>