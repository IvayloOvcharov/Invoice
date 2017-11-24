<?php
session_start();
include('Conn.php');

$sting = "bla";
$stmt = $dbh->prepare("UPDATE GP_Inv SET GP_InvName='somethingelse' WHERE ID_Inv=3");
$stmt->execute();
echo 'asd';
