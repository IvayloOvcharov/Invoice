<?php
session_start();
include('Conn.php');
//INSERT INTO public."Shifts"("ObektID", "Shift","Workhour")VALUES (?, ?, ?);

$IdRow = $_POST['idRow'];
$Status = $_POST['Status'];
$Comment = $_POST['Com'];
date_default_timezone_set('Europe/Sofia');
$TODAY = date("y-m-d h:i:s");
$TODAY = '20'.$TODAY;

$stmt = $dbh->prepare("UPDATE GP_DBT SET USERID_CH=$Status,Comment='$Comment',A_USERID_DATE='$TODAY' WHERE GPID=$IdRow");
$stmt->execute();
