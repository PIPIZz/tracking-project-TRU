<div class="user-info-list panel panel-default">
    <div class="panel-body">
        <table class="no-border no-strip skills">
            <tbody class="no-border-x no-border-y">

                <?php
                    include('../connect/config.php');
                    $sql = "SELECT * FROM project INNER JOIN step On step_id = Step WHERE Pro_id = '$id' ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $res = $stmt->fetchAll();
                    $i = 1;
                    foreach($res as $val){       
                ?>
                <tr>
                    <td class="icon"><span class="mdi mdi-case"></span></td>
                    <td class="item">สถานะปัจจุบัน<span class="icon s7-portfolio"></span></td>
                    <td><?=$val['step_name']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>