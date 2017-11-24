<?php
session_start();
include('Conn.php');

$Supplier = $_POST['Supplier'];
$Code = $_POST['Code'];
$Ndoc = $_POST['Ndoc'];
$Total = $_POST['Total'];
$Signature = $_POST['Signature'];
$Comment = $_POST['Com'];
$GPID = $_POST['GPIDd'];
$DueDate = $_POST['DueDate'];
$stmt = $dbh->prepare("UPDATE GP_DBT SET ID_Sup=$Supplier,ID_Inv=$Code,DocSum=$Total,F_USERID=$Signature,DocNum=$Ndoc,DueDate='$DueDate',Comment='$Comment' WHERE GPID=$GPID");
$stmt->execute();
