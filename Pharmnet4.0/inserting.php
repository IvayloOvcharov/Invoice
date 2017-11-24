<?php
session_start();
include('Conn.php');
//INSERT INTO public."Shifts"("ObektID", "Shift","Workhour")VALUES (?, ?, ?);

$Supplier = $_POST['Supplier'];
$Code = $_POST['Code'];
$Ndoc = $_POST['Ndoc'];
$Total = $_POST['Total'];
$Signature = $_POST['Signature'];
$Comment = $_POST['Com'];
//$TODAY = "'2017-09-20 00:00:00.00'";
date_default_timezone_set('Europe/Sofia');
$TODAY = date("y-m-d h:i:s");
$TODAY = '20'.$TODAY;
$DueDate = $_POST['DueDate'];
$DueDate = "$DueDate";
$Currency = $_POST['Currnecy'];
//$TODAY = date();
$stmt = $dbh->prepare("INSERT INTO GP_DBT (ID_Sup,ID_Inv,DocSum,F_USERID,DocNum,Comment,USERID_DATE,DueDate,DocCurrency) VALUES ($Supplier,$Code,$Total,$Signature,$Ndoc,'$Comment','$TODAY','$DueDate','$Currency')");
  $stmt->execute();
