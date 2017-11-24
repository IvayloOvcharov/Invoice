<?php
include('Conn.php');


$stmt = $dbh->prepare("UPDATE GP_DBT SET USERID_CH=5 WHERE 1=1");
$stmt->execute();

?>