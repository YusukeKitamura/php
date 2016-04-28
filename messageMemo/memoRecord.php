<?php
	//ステップ１　DB接続
	$dsn      = 'mysql:dbname=messageMemo;host=localhost';
	//接続するためのユーザー情報
	$user     = 'root';
	$password = '';

	//DB接続オブジェクトを作成
	$dbh      = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');

	$sql  = 'SELECT * FROM `client`';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$insertFlag = 0;	//データ格納可能状態
	$clientID = 0;

	//伝言受信者と電話発信者の組み合わせがテーブル内のものと一致した場合、取得したクレーム回数を代入
	$arrayRow = array();
	while(1){
	    // データ取得
	    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
	    if($rec == false){
	      break;
	    }
	    // データ格納
	    $arrayRow[] = $rec;
	    if($arrayRow['messageTakerDepartment'] == $_POST['messageTakerDepartment'] and
		   $arrayRow['messageTakerName'] == $_POST['messageTakerName'] and
		   $arrayRow['phoneCallerCompany'] == $_POST['phoneCallerCompany'] and
		   $arrayRow['phoneCallerDepartment'] == $_POST['phoneCallerDepartment'] and
		   $arrayRow['phoneCallerName'] == $_POST['phoneCallerName']) {
			$complaintNum = $arrayRow['complaintNum'];
			$clientID = $arrayRow['clientID'];
			$insertFlag = 1;
			break;
		}
	}

	//伝言受信者と電話発信者の組み合わせがテーブルに存在しない場合は新たにデータを追加
  	if($insertFlag == 0) {
		$sql = 'INSERT INTO `client`(`clientID`, `messageTakerDepartment`, `messageTakerName`, `phoneCallerCompany`, 
				`phoneCallerDepartment`, `phoneCallerName`, `complaintNum`) 
				VALUES (null,"'.$_POST['messageTakerDepartment'].'","'.$_POST['messageTakerName'].'","'.$_POST['phoneCallerCompany'].'","'.
				$_POST['phoneCallerDepartment'].'","'.$_POST['phoneCallerName'].'",0)';
	    $stmt = $dbh->prepare($sql);
	    $stmt->execute();
		$complaintNum = 0;

		//クライアントIDを取得
		$sql = 'SELECT COUNT(*) AS cnt FROM `client`';
	    $stmt = $dbh->prepare($sql);
	    $stmt->execute();
	    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
	    $clientID = $rec['cnt'];
	}

	//伝言の内容が「クレーム」の場合はクレーム回数を増やしてclientテーブルを修正
	$messageType = "";
	if(isSet($_POST['optMessageType'])){
		$messageType = $_POST['optMessageType'];
	}
	if($messageType == "complaint"){
		$complaintNum = $complaintNum + 1;
		$sql = 'UPDATE `client` SET `complaintNum`="'.$complaintNum.
				'WHERE `messageTakerDepartment`='.$_POST['messageTakerDepartment'].
				' and `messageTakerName` = ' . $_POST['messageTakerName'].
				' and `phoneCallerCompany` = ' . $_POST['phoneCallerCompany'].
				' and `phoneCallerDepartment` = ' . $_POST['phoneCallerDepartment'].
				' and `phoneCallerName` = ' . $_POST['phoneCallerName'];
    	$stmt = $dbh->prepare($sql);
    	$stmt->execute();
		$messageType = "クレーム";
	} else {
		$messageType = Null;
	}

	//memoテーブルに伝言の内容を登録
	$memoDate = $_POST['cmbYear'] . "年" . $_POST['cmbMonth'] . "月" .
	$_POST['cmbDay'] . "日" . $_POST['cmbHour'] . "時" . $_POST['cmbMinute'] . "分";

	$sql = 'INSERT INTO `memo`(`memoID`, `clientID`, `date`, `messageType`, `memo`, `phoneAnswererName`) VALUES (null,'
	      .$clientID.',"'.$memoDate.'","'.$messageType.'","'.$_POST['memo'].'","'.$_POST['phoneAnswererName'].'")';
echo $sql;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
 ?>
 <!DOCTYPR HTML PUBLIC "-//W3C//DTD/ HTML 4. Transitional//EN">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>伝言メモ登録完了画面</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/form.css" rel="stylesheet">
    <link href="assets/css/timeline.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">

      	<h1>伝言メモ登録完了画面</h1>

      <div class="col-md-4 content-margin-top">
      	送信しました。
      </div>

      </div>
	</nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>