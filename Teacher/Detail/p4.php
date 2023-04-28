<div class="panel panel-default panel-hover">
    <!-- <div class="panel-heading">
        <div class="title">รายชื่อสมาชิก</div>
    </div> -->
    <div class="panel-body table-responsive">
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th style="text-align: center">
                        บทที่
                    </th>
                    <th style="text-align: center">
                        สถานะ
                    </th>
                  
                    <th style="text-align: center">
                        Download
                    </th>  
                </tr>
            </thead>
            <tbody class="no-border-x">
                <?php
                                    include('../connect/config.php');
                                    $sql = "SELECT * FROM file1   WHERE Pro_id = '$id' ";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $res = $stmt->fetchAll();
                                    $i = 1;
                                    foreach($res as $val){       
                                        if($val['F_Status'] == 1 ){
                                            $status = "รออนุมัติ";
                                        }else if($val['F_Status'] == 2 ){
                                            $status = "ผ่าน";
                                        }else if($val['F_Status'] == 3 ){
                                            $status = "ไม่ผ่าน";
                                        }
                ?>           
                <tr>
                    <td style="text-align: center">
                        <h4><?=$val['Type']?></h4>
                    </td>
                    <td style="text-align: center">
                        <?=$status ?>
                    </td> 
                    <td style="text-align: center">
                        <a href="<?="../fileupload/".$val['File'];?>" target="_blank">Download</a>
                    </td>
                </tr>

                <?php     $i++;    }         ?>
            </tbody>
        </table>
    </div>
</div>