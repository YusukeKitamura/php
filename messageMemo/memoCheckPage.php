<?php
	//ステップ１　DB接続
	$dsn      = 'mysql:dbname=messageMemo;host=localhost';
	//接続するためのユーザー情報
	$user     = 'root';
	$password = '';

	//DB接続オブジェクトを作成
	$dbh      = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');
	$sql = sprintf('SELECT * FROM `client`, `memo` WHERE `client`.clientID=`memo`.clientID AND 
				`client`.messageTakerDepartment="%s" AND 
				`client`.messageTakerName="%s"',
				$_POST['userDepartment'],
				$_POST['userName']
				);

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
	<title>
	<?php 
	echo $_POST['userDepartment'] . "  " . $_POST['userName']; 
	?>  様宛ての伝言メモ
	</title>

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
		<h1>
		<?php
		echo $_POST['userDepartment'] . "  " . $_POST['userName']; 
		?>  様宛ての伝言メモ
		</h1>
		<table border= "1">
			<tr>
				<th>日付</th>
				<th>電話発信者</th>
				<th>クレーム回数</th>
				<th>伝言の種類</th>
				<th>メモ</th>
				<th>電話応対者</th>
			</tr>
		<?php
		while(1) {
			// データ取得
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rec == false){
			    break;
			}
			echo "<td>" . $rec['date'] . "</td>";
			echo "<td>" . $rec['phoneCallerCompany'] ." ". $rec['phoneCallerDepartment'] ." ".
			$rec['phoneCallerName'] ."様". "</td>";			
			echo "<td>" . $rec['complaintNum'] . "</td>";		
			echo "<td>" . $rec['messageType'] . "</td>";		
			echo "<td>" . $rec['memo'] . "</td>";
			echo "<td>" . $rec['phoneAnswererName'] . "</td>";	
			echo"<tr>";
			echo"<tr/>";
		}

		?>
		</table>
      </div>
	</nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>