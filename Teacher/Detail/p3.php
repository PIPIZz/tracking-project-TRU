<div class="user-info-list panel panel-default">
    <div class="panel-body">
        <table class="no-border no-strip skills">
            <tbody class="no-border-x no-border-y">

                <?php
                    include('../connect/config.php');
                    $sql = "SELECT * FROM date_test  WHERE Pro_id = '$id' ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $res = $stmt->fetch();     
                    function DateThai($strDate)
                    {
                                $strYear = date("Y",strtotime($strDate))+543;
                                $strMonth= date("n",strtotime($strDate));
                                $strDay= date("j",strtotime($strDate));
                                $strHour= date("H",strtotime($strDate));
                                $strMinute= date("i",strtotime($strDate));
                                $strSeconds= date("s",strtotime($strDate));
                                $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                $strMonthThai=$strMonthCut[$strMonth];
                                return "$strDay $strMonthThai $strYear ";
                    }                                 
                ?>
                <tr>
                    <td class="icon"><span class="mdi mdi-case"></span></td>
                    <td class="item">วันที่สอบ<span class="icon s7-portfolio"></span></td>
                    <td><?php
                    if($res['tDate'] == ""){
                        echo '';
                    }else{
                        echo DateThai($res['tDate']);
                    }
                     ?></td>
                </tr>
                <tr>
                    <td class="icon"><span class="mdi mdi-case"></span></td>
                    <td class="item">เวลา<span class="icon s7-portfolio"></span></td>
                    <td><?=$res['tTime']?></td>
                </tr>
                <tr>
                    <td class="icon"><span class="mdi mdi-case"></span></td>
                    <td class="item">สถานที่สอบ<span class="icon s7-portfolio"></span></td>
                    <td><?=$res['Place']?></td>
                </tr>
                <?php
                    include('../connect/config.php');
                    $sql2 = "SELECT * FROM date_test as d INNER JOIN director as di ON di.Direc_id=d.Direc_id WHERE Pro_id = '$id' ";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->execute();
                    $res2 = $stmt2->fetchAll();
                    foreach($res2 as $val2){       
                ?>
                <tr>
                    <td class="icon"><span class="mdi mdi-case"></span></td>
                    <td class="item">กรรมการ<span class="icon s7-portfolio"></span></td>
                    <td><?=$val2['Direc_name']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>