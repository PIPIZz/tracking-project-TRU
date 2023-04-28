<?php

$HOST_NAME ="localhost";
$CHAR_SET = "charset=utf8";
$USER_NAME ="root";
$PASSWORD ="";
$DB_NAME ="project";


try {
    //code...
    $conn=new PDO('mysql:host='.$HOST_NAME.';dbname='.$DB_NAME.';'.$CHAR_SET,$USER_NAME,$PASSWORD);
    //echo'เชื่อต่อฐานข้อมูลได้';

} catch (PDOException $e) {
    echo "ไม่สามารถเชื่อมต้อฐานข้อมูลได้".$e->getMessage();
    //throw $th;
}

?>