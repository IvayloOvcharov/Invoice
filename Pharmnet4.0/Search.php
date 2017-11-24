<?php
session_start();

$MainStaitment = "SELECT GPID ,
        GD.ID_Sup ,
        GP_SupName ,
        GD.ID_Inv ,
        GP_InvName,
        DocNum ,
        DocSum ,
        DocCurrency ,
        DueDate ,
        GD.UserID ,
        GU.GP_USERNAME ,
        USERID_CH ,
        GST.Status_TYPE,
        USERID_DATE ,
        Comment ,
        bank ,
        pay_date ,
        Payment ,
        SWIFT ,
        A_USERID ,
        GUA.GP_USERNAME ,
        A_USERID_CH ,
        GSTA.Status_TYPE,
        A_USERID_DATE ,
        P_USERID ,
        GUP.GP_USERNAME ,
        P_USERID_CH ,
        GSTP.Status_TYPE,
        P_USERID_DATE ,
        F_USERID ,
        GUF.GP_USERNAME ,
        F_USERID_CH ,
        GSTF.Status_TYPE,
        F_USERID_DATE
FROM    GP_DBT GD
  LEFT JOIN GP_Inv GI ON GI.ID_Inv = GD.ID_Inv
  LEFT JOIN GP_Status GST ON GD.USERID_CH = GST.CH_TYPE
  LEFT JOIN GP_Status GSTA ON GD.A_USERID_CH = GSTA.CH_TYPE
  LEFT JOIN GP_Status GSTP ON GD.P_USERID_CH = GSTP.CH_TYPE
  LEFT JOIN GP_Status GSTF ON GD.F_USERID_CH = GSTF.CH_TYPE
        LEFT JOIN GP_SUPPLIER GS ON GD.ID_Sup = GS.ID_Sup
        LEFT JOIN GP_USERS GU ON GD.UserID = GU.GP_USERID
        LEFT JOIN GP_USERS GUA ON GD.A_USERID = GUA.GP_USERID
        LEFT JOIN GP_USERS GUP ON GD.P_USERID = GUP.GP_USERID
        LEFT JOIN GP_USERS GUF ON GD.F_USERID = GUF.GP_USERID


        ";

$Where = ' and GPID > 105650 ';
$MainStaitment = $MainStaitment . ' where 1=1 ';
if(isset($_GET['Supplier'])) {
    $Where = '';
  $_SESSION['supplier'] =  $_GET['Supplier'];
  $supp = $_SESSION['supplier'];
  $MainStaitment = $MainStaitment . "and GP_SupName like '%$supp%'" ;
}
else {
  $_SESSION['supplier'] = '';
}

if(isset($_GET['Code'])) {
    $Where = '';
  $_SESSION['Code'] =  $_GET['Code'];
  $code = $_SESSION['Code'];
  $MainStaitment = $MainStaitment . "and GP_InvName like '%$code%'" ;
}
else {
    $_SESSION['Code'] = '';
}
// if(isset($_GET['IDDoc'])) {
//   $_SESSION['IDDoc'] =  $_GET['IDDoc'];
//   $IDDoc = $_SESSION['IDDoc'];
// //  $MainStaitment = $MainStaitment . "AND GP_InvName like '%$IDDoc%'" ;
// }
// else {
//     $_SESSION['IDDoc'] = '';
// }
//PayDate
if(isset($_GET['FillDate'])) {
    $Where = '';
  $_SESSION['FillDate'] =  $_GET['FillDate'];
  $NDoc = $_SESSION['FillDate'];
  $NDoc = explode("_ ", $NDoc);
  $FromDate = $NDoc[0];
  $ToDate = $NDoc[1];


  //(Price BETWEEN 10 AND 20)
  $MainStaitment = $MainStaitment . "and  (USERID_DATE BETWEEN '$FromDate' AND '$ToDate') ";
}
else {
    $_SESSION['FillDate'] = '';
}
if(isset($_GET['PadejDate'])) {
    $Where = '';
  $_SESSION['PadejDate'] =  $_GET['PadejDate'];
  $NDoc = $_SESSION['PadejDate'];
  $NDoc = explode("_ ", $NDoc);
  $FromDate = $NDoc[0];
  $ToDate = $NDoc[1];


  //(Price BETWEEN 10 AND 20)
  $MainStaitment = $MainStaitment . "and  (DueDate BETWEEN '$FromDate' AND '$ToDate') ";
}
else {
    $_SESSION['PadejDate'] = '';
}
if(isset($_GET['PayDate'])) {
    $Where = '';
  $_SESSION['PayDate'] =  $_GET['PayDate'];
  $NDoc = $_SESSION['PayDate'];
  $NDoc = explode("_ ", $NDoc);
  $FromDate = $NDoc[0];
  $ToDate = $NDoc[1];


  //(Price BETWEEN 10 AND 20)
  $MainStaitment = $MainStaitment . "and  (Paymnet BETWEEN '$FromDate' AND '$ToDate') ";
}
else {
    $_SESSION['PayDate'] = '';
}
if(isset($_GET['NDoc'])) {
    $Where = '';
  $_SESSION['NDoc'] =  $_GET['NDoc'];
  $NDoc = $_SESSION['NDoc'];
  $MainStaitment = $MainStaitment . "and DocNum like '%$NDoc%'" ;
}
else {
    $_SESSION['NDoc'] = '';
}
if(isset($_GET['signature'])) {
    $Where = '';
  $_SESSION['signatures'] =  $_GET['signature'];

  $signature = $_SESSION['signatures'];
  $signatures = explode('---', $signature);
  $signaturing = $signatures[1];
  $MainStaitment = $MainStaitment . " and F_USERID = $signaturing " ;
}
else {
    $_SESSION['signatures'] = '';
}
if(isset($_GET['Comment'])) {
    $Where = '';
  $_SESSION['Comment'] =  $_GET['Comment'];
  $Comment =  $_SESSION['Comment'];
  $MainStaitment = $MainStaitment . "and Comment like '%$Comment%'" ;
}
else {
    $_SESSION['Comment'] = '';
}
if(isset($_GET['BankPay'])) {
    $Where = '';
  $_SESSION['BankPay'] =  $_GET['BankPay'];
  $BankPay = $_SESSION['BankPay'];
  $MainStaitment = $MainStaitment . "and Payment like '%$BankPay%'" ;
}
else {
    $_SESSION['BankPay'] = '';
}
if(isset($_GET['total'])) {
  $Where = '';
  $_SESSION['total'] =  $_GET['total'];
  $Total = explode("_ ", $_SESSION['total']);
  $FromTotal = $Total[0];
  $ToTotal = $Total[1];
  $MainStaitment = $MainStaitment . "and DocSum > $FromTotal AND DocSum < $ToTotal";
}
else {
    $_SESSION['total'] = '';
}
$DueOrder = " ORDER by GPID DESC";


if(isset($_GET['OrderBy'])) {

  $_SESSION['OrderBy'] =  $_GET['OrderBy'];
  $Order = $_SESSION['OrderBy'];
  $Order = explode("*", $Order);
  if ($Order == "DocNum" || $Order[0] == "DocSum" || $Order[0] == "DueDate" ) {

  $DueOrder = " ORDER BY CAST($Order[0] as DECIMAL(10,2)) $Order[1]" ;
  }
  else{

    $DueOrder = " ORDER BY $Order[0] $Order[1]" ;
  }


}
$MainStaitment = $MainStaitment . $Where;
//date("Y/m/d")
$MainStaitment = $MainStaitment . $DueOrder;

//CAST(price AS DECIMAL(10,2))



$DbtSTMT=$dbh->query($MainStaitment);




 ?>
