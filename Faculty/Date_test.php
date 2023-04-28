<style>
.dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover,
.dropbtn:focus {
    background-color: #3e8e41;
}

/* #myInput {
    box-sizing: border-box;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;
    border-bottom: 1px solid #ddd;
    } */

#myInput:focus {
    outline: 3px solid #ddd;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    /* position: absolute; */
    background-color: #f6f6f6;
    /* min-width: 230px; */
    /* overflow: auto; */
    /* border: 1px solid #ddd; */
    z-index: 1;
}

.dropdown-content li {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: none;
}

.dropdown li:hover {
    background-color: #ddd;
    cursor: pointer;
}

.show {
    display: block;
}
</style>
<div class="main-content container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">สอบโครงงาน</div>
                <div class="panel-body">
                    <form action="../Process_Faculty/P_Save_Testdate.php" method="POST"
                        class="form-horizontal group-border-dashed">

                        <div class="form-group no-padding">
                            <div class="col-sm-7">
                                <h4 class="wizard-title">กลุ่มที่สอบ</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ค้นหา</label>
                            <div class="col-sm-3">
                                <a class="btn btn-space btn-success btn-lg " href="Tb_group.php">ค้นหา</a>

                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-9">
                                <div class="panel panel-default panel-table">
                                    <div class="panel-heading">กลุ่มที่สอบ
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <!-- <th style="text-align: center">ลำดับ</th> -->
                                                    <th >ชื่อโครงงาน</th>
                                                    <th >ภาค</th>
                                                    <th >สาขา</th>
                                                    <th class="actions width:10%">ลบรายชื่อ</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                  include('../connect/config.php');
                                                    
                                                    // echo '_SESSION[StuID] = '.$_SESSION["StuID"][$i];

                                                    $_SESSION["intLine"] = isset($_SESSION["intLine"]) ? $_SESSION["intLine"] : '';
                                                    if($_SESSION["intLine"] != ''){

                                                    for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
                                                    {
                                                        if(isset($_SESSION["ProID"][$i])  != "")
                                                        {
                                                            $SQL = "SELECT * FROM project as p INNER JOIN sector as s ON s.Sector_id=p.Pro_Sector INNER JOIN ba as b ON b.BA_id=p.Pro_BA WHERE Pro_id = '".$_SESSION["ProID"][$i]."' ";                                                       
                                                            $stmt = $conn->prepare($SQL);
                                                            $stmt->execute();
                                                            $data = $stmt->fetchAll();
                                                            // $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                            // var_dump($value);
                                                            
                                                            foreach($data as $item){                                                            

                                                        ?>
                                                <tr>
                                                    <!-- <td style="text-align: center"><?php echo $item['Pro_id'];?></td> -->
                                                    <td ><?php echo $item['Pro_name']?></td>
                                                    <td ><?php echo $item['Sector_name']?>
                                                    <td ><?php echo $item['BA_name']?>
                                                    </td>
                                                    <td style="text-align: center"><a
                                                            href="../Process_Faculty/P_clear_Pro.php?Line=<?=$i;?>">ลบ</a>
                                                    </td>
                                                </tr>
                                                <?php } }}} ?>
                                        </table>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="panel-divider"></div>
                        <div class="form-group no-padding">
                            <div class="col-sm-7">
                                <h4 class="wizard-title">รายละเอียดที่สอบ</h4>
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="col-sm-3 control-label">วันที่สอบ</label>
                            <div class="col-md-3 col-xs-7">
                                <div data-min-view="2" data-date-format="yyyy-mm-dd"
                                    class="input-group date datetimepicker">
                                    <input size="16" type="text" value="" class="form-control" id="date"
                                        name="date"><span class="input-group-addon btn btn-primary"><i
                                            class="icon-th mdi mdi-calendar"></i></span>
                                </div>
                                <!-- <div class="input-group ">

                                    <input size="16" class="form-control" date-format="yyyy-mm-dd" type="date" id="date" name="date">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">เวลา</label>
                            <div class="col-md-3 col-xs-7">
                                <!-- <div data-show-meridian="true" data-start-view="1" data-date-format="HH:ii"
                                    data-link-field="dtp_input1" class="input-group date datetimepicker">
                                    <input size="16" type="text" value="" class="form-control" id="time"
                                        name="time"><span class="input-group-addon btn btn-primary"><i
                                            class="icon-th mdi mdi-calendar"></i></span>
                                </div> -->
                                <div class="input-group ">
                                    <input size="16" class="form-control" type="time" id="time" name="time">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">สถานที่</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="place" name="place">
                            </div>
                        </div>



                        <div class="panel-divider"></div>
                        <div class="form-group no-padding">
                            <div class="col-sm-7">
                                <h4 class="wizard-title">คณะกรรมการ</h4>
                            </div>
                        </div>
                        <?php 
                      $sql2 = "SELECT * FROM director";
                      $stmt2 = $conn->prepare($sql2);
                      $stmt2 ->execute();
                      $res = $stmt2->fetchAll();
                    ?>
                        <?php for ($i = 0; $i < 5; $i++) { ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ชื่อกรรมการ <?=$i+1?> :</label>
                            <div class="col-sm-6 dropdown">
                                <div id="myDropdown-<?php echo $i+1?>" class="dropdown-content">
                                    <input class="form-control" type="text" placeholder="Search.." name="direc[]"
                                        id="myInput-<?php echo $i+1?>" onkeyup="filterFunction(this)">
                                    <?php foreach($res as $key => $value){ ?>
                                    <li id="dir-<?php echo $key+1?>" value="<?php echo $value['Direc_name'];?>"
                                        onclick="setVal(this)"><?php echo $value['Direc_name'];?></li>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <p class="text-right">
                            <button type="sumbit" name="button_click" value="insert"
                                class="btn btn-space btn-primary btn-lg ">
                                บันทึก</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/jquery.min.js"> </script>

<script type="text/javascript">
function filterFunction(e) {

    var input, filter, ul, li, a, i;
    input = e;
    let inputValue = e.value;
    filter = inputValue.toUpperCase();
    div = document.getElementById(e.id).parentElement
    a = div.getElementsByTagName("li");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "block";
        } else {
            a[i].style.display = "none";
        }
    }
    if (inputValue === "") {
        $('.dropdown-content li').css("display", "none")
    }
}

function setVal(e) {
    console.log(e)
    var txtVal = $(e).attr("value");
    var getParent = e.parentNode;
    var input = getParent.children[0]
    $(input).val(txtVal)
    $('.dropdown-content li').css("display", "none")
}

// $(document).ready(function() {

//     var initialText = $('.editable').val();
//     $('.editOption').val(initialText);

//     $('.selectpicker').change(function() {
//         var myOpt = [];
//         $(".selectpicker").each(function () {
//             myOpt.push($(this).val());
//         });
//         console.log(myOpt)
//         $(".selectpicker").each(function () {
//             $(this).find("option").prop('hidden', false);
//             var sel = $(this);
//             console.log(sel.val())
//             $.each(myOpt, function(key, value) {
//                 if((value != "") && (value != sel.val())) {
//                     sel.find("option").filter('[value="' + value +'"]').prop('hidden', true);
//                     $('.selectpicker').selectpicker('refresh')
//                 } else {
//                     sel.find("option").filter('[value="' + value +'"]').prop('hidden', false);
//                     $('.selectpicker').selectpicker('refresh')
//                 }
//             });
//         });

//         var selected = $('option:selected', this).attr('class');
//         var optionText = $('.editable').text();

//         if(selected == "editable"){
//             $('.editOption').show();

//             $('.editOption').keyup(function(){
//                 var editText = $('.editOption').val();
//                 $('.editable').val(editText);
//                 $('.editable').html(editText);
//             });

//         }else{
//             $('.editOption').hide();
//         }
//     });

// });
</script>