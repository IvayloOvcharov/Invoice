<?php
session_start();
include('Conn.php');
//INSERT INTO public."Shifts"("ObektID", "Shift","Workhour")VALUES (?, ?, ?);

$FirmName = $_POST['FirmName'];
$FirmEik = $_POST['eik'];
$id = $_POST['lastChar'];

//$TODAY = date();lastChar
$stmt = $dbh->prepare("INSERT INTO GP_SUPPLIER (ID_Sup,GP_SupName,GP_Sup_Bul) VALUES ($id,'$FirmName',$FirmEik)");
  $stmt->execute();
