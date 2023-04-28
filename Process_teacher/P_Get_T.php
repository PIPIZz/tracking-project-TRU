<?php
    require_once( '../connect/config.php' );
    // echo ($_GET['StuID']);
    $sql = "SELECT * FROM teacher WHERE T_ID='$_GET[T_ID]' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);

?>