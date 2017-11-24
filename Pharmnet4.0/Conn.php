
<?php
    $dbname = 'pharmnet';
	$host = 'localhost:5432';
	$username = 'root';
	$password = '';


    $opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];

	try{

    $dbh = new PDO("mysql:dbname=$dbname;host=$host;", $username, $password ,$opt);
	$dbh->exec("SET CHARACTER SET utf8");
  }catch(PDOException $ex){
ECHO 'BKAKA';
  }

  $sql = "SELECT GPID ,
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
          Where GPID < 100
         ";

  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  file_put_contents("fish.json", json_encode($result, JSON_UNESCAPED_UNICODE));
