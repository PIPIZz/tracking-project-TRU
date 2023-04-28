<?php
    require_once( '../connect/config.php' );
    // echo ($_GET['StuID']);
    $sql = "SELECT * FROM student WHERE id='$_GET[StuID]' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);

?>