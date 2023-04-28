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
            <form action="Process/P_Regis.php" method="GET" >
                
                <div class="mb-3 row p-2">
                    <label  class="col-sm-4 col-form-label">รหัสนักศึกษา</label>
                    <div class="col-sm-8">
                        <input placeholder="รหัสประจำตัวนักศึกษา 13 หลัก" class="form-control " id="id" name="id" required type="text">
                    </div>
                </div>
                <div class="mb-3 row p-2">
                    <label  class="col-sm-4 col-form-label">ชื่อ-นามสกุล</label>
                    <div class="col-sm-8">
                        <input type="text" required placeholder=" ชื่อ-นามสกุล " class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="mb-3 row p-2">
                    <label  class="col-sm-4 col-form-label">ภาค</label>
                    <div class="col-sm-8">
                    <select class="form-select" id="sector" name="sector" >
                    <?php  include('connect/config.php');
                            $sql1 = "SELECT * FROM sector";
                            $stmt1 = $conn->prepare($sql1);
                            $stmt1 ->execute();
                            $res1 = $stmt1->fetchAll(); 
                            foreach($res1 as $val1){ ?>
                                <option value="<?=$val1['Sector_id']?>"><?=$val1['Sector_name']?></option>
                            <?php } ?>
                    </select>
                    </div>
                </div>
                <div class="mb-3 row p-2">
                    <label  class="col-sm-4 col-form-label">สาขา</label>
                    <div class="col-sm-8">
                    <select class="form-select" id="BA" name="BA">
                        <?php $sql = "SELECT * FROM ba";
                            $stmt = $conn->prepare($sql);
                            $stmt ->execute();
                            $res = $stmt->fetchAll(); 
                            foreach($res as $val){ ?>
                                <option value="<?=$val['BA_id']?>"><?=$val['BA_name']?></option>
                            <?php } ?>
                    </select>
                    </div>
                </div>
                <div class="mb-3 row p-2">
                    <label  class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" required placeholder="Email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="mb-3 row p-2">
                    <label  class="col-sm-4 col-form-label">เบอร์โทรศัพท์</label>
                    <div class="col-sm-8">
                        <input type="text" required placeholder="เบอร์โทรศัพท์" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <div class="mb-3 row p-2">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>           
                <div class="row justify-content-center">
                    <div class="col-4"> 
                        <button type="submit" name="button_click" value="insert" class="btn btn-primary">ลงทะเบียน</button>
                    </div>
                    <div class="col-4">
                       <a href="index.php?menu=home" class="btn btn-danger" type="button"> ย้อนกลับ</a>
                    </div>
                </div>       
            </form> 
         
        </div>
    </div>
</div>