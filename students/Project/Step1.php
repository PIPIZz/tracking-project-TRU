<script language="javascript">
function fncSubmit() {
    var Pro_name = document.getElementById('name').value
    var Pro_BA = document.getElementById('BA').value
    var Pro_Term = document.getElementById('Term').value
    var Pro_Year = document.getElementById('Year').value
    var Pro_Tname1 = document.getElementById('T_name1').value
    var Pro_Tname2 = document.getElementById('T_name2').value
    // alert('ProJect Name = ' + Pro_name);
    window.location.href = "index.php?menu=table&pro_name=" + Pro_name +
        "&BA=" + Pro_BA + "&Term=" + Pro_Term + "&Year=" + Pro_Year + "&T_name1=" + Pro_Tname1 + "&T_name2=" +
        Pro_Tname2;
}
</script>
<?php 
     if($_SESSION["sess_BA"] == 1 ){
        $ba = "วิศวกรรมเครื่องกล";
    }else if($_SESSION["sess_BA"] == 2 ){
        $ba = "วิศวกรรมไฟฟ้า";
    }else if
    ($_SESSION["sess_BA"] == 3 ){
        $ba = "วิศวอุตสาหการ";
    }else if
    ($_SESSION["sess_BA"] == 4 ){
        $ba = "เทคโนโลยีอุตสาหกรรม";
    }

    $BA = $_SESSION['sess_BA'];
    include('../connect/config.php');
    $sql_t = "SELECT * FROM teacher WHERE T_BA = $BA AND T_Status != 'Admin' ";
    $stmt_t = $conn->prepare($sql_t);
    $stmt_t->execute();
    $res_t = $stmt_t->fetchAll();

?>

<form action="../Process_Project/P_Save_Project1.php" method="GET" class="row g-3  p-4 border  border-dark">
    <h1>บันทึกแบบเสนอโครงงาน</h1>
    <div class="col-md-6">
        <label class="form-label">ชื่อโครงงาน</label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$_SESSION["pro_name"]; ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">สาขา</label>
        <input type="text" readonly class="form-control" value="<?=$ba ?>">
        <input type="text" hidden class="form-control" id="BA" name="BA" value="<?=$BA?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">ภาคที่เรียน</label>
        <select class="form-select" id="Term" name="Term">
            <option value="1" <?php if ($_SESSION['Term1'] == '1') { echo ' selected="selected"'; } ?>>1</option>
            <option value="2" <?php if ($_SESSION['Term1'] == '2') { echo ' selected="selected"'; } ?>>2</option>
            <option value="3" <?php if ($_SESSION['Term1'] == '3') { echo ' selected="selected"'; } ?>>3</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">ปีการศึกษา</label>
        <input type="text" require class="form-control" id="Year" name="Year" value="<?=$_SESSION["Year1"]; ?>"
            placeholder="ปีการศึกษา">
    </div>
    <div class="col-md-6">
        <label class="form-label">อาจารย์ที่ปรึกษา</label>
        <select class="form-select" id="T_name1" name="T_name1" value="<?=$_SESSION["T_name1"]; ?>">
            <?php foreach($res_t as $val){ ?>
            <option value="<?=$val['T_id']?>"
                <?php if ($_SESSION['T_name1'] == $val['T_id']) { echo 'selected="selected"'; } ?>>
                <?=$val['T_name']?>
            </option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">อาจารย์ที่ปรึกษาร่วม</label>
        <select class="form-select" id="T_name2" name="T_name2" value="<?=$_SESSION["T_name2"]; ?>">
            <option selected value=""> ไม่มีอาจารย์ที่ปรึกษาร่วม</option>
            <?php foreach($res_t as $val){ ?>
            <option value="<?=$val['T_id']?>"
                <?php if ($_SESSION['T_name2'] == $val['T_id']) { echo ' selected="selected"'; } ?>>
                <?=$val['T_name']?>
            </option>
            <?php } ?>
        </select>
    </div>
    <hr>
    <div class="col-md-12 p-2">
        <h1>เพิ่มรายชื่อสมาชิก</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-outline-dark  " type="button" id="sum" OnClick="return fncSubmit()">
                ค้นหารายชื่อ
            </a>
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-info table-hover border">
            <thead>
                <tr>
                    <th scope="col">รหัสนักศึกษา</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">ภาค</th>
                    <th scope="col">เบอร์โทร</th>
                    <th scope="col">ลบรายชื่อ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($_SESSION["intLine"] == ''){
                    $_SESSION[StuID][0]=$_SESSION['sess_id'];
                    $_SESSION["intLine"] =1;
                }
            // print_r($_SESSION[StuID])."but".$_SESSION["intLine"];
            ///////////////////////
            $_SESSION["intLine"] = isset($_SESSION["intLine"]) ? $_SESSION["intLine"] : '';
            if($_SESSION["intLine"] != ''){
            for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
            {
              if(isset($_SESSION["StuID"][$i])  != "")
                {
                    $SQL = "SELECT * FROM student INNER JOIN sector ON Sector_id=Sector WHERE id = '".$_SESSION["StuID"][$i]."' ";                                                       
                    $stmt = $conn->prepare($SQL);
                    $stmt->execute();
                    $data = $stmt->fetchAll();                   
            foreach($data as $item){                                                            
                ?>
                <tr>
                    <td scope="row"><?php echo $item['id'];?></td>
                    <td><?php echo $item['Stu_name'];?></td>
                    <td><?php echo $item["Sector_name"];?></td>
                    <td><?php echo $item["Phone"];?></td>
                    <td><a href="../Process_Project/P_clear.php?Line=<?=$i;?>">ลบ</a></td>
                </tr>
                <?php }}}}?>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 p-2">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn  btn-success" type="sumbit" name="button_click" value="insert">
                บันทึก
            </button>
        </div>
    </div>
</form>