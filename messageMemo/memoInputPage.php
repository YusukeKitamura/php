<?php 
	require_once("func.php");
 ?>
 <!DOCTYPR HTML PUBLIC "-//W3C//DTD/ HTML 4. Transitional//EN">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>伝言メモ入力画面</title>

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

      	<h1>伝言メモ入力画面</h1>

      	<form method="POST" action="memoRecord.php">
      		<table border="1">
      			<tr>
              <td rowspan="2">伝言受信者</td>
              <td>部署名<input type="text" name="messageTakerDepartment"></td>
            </tr>
            <tr>
              <td>氏名<input type="text" name="messageTakerName">様</td>
            </tr>
            <tr>
              <td rowspan="3">電話発信者</td>
              <td>会社名<input type="text" name="phoneCallerCompany"></td>
            </tr>
            <tr>
              <td>部署名<input type="text" name="phoneCallerDepartment"></td>
            </tr>
            <tr>
              <td>氏名<input type="text" name="phoneCallerName">様より</td>
            </tr>
            <tr>
              <td>伝言の種類</td>
              <td><input type="checkbox" name="messageType" value="complaint">クレーム</td>
            </tr>
            <tr>
              <td>メモ欄</td>
              <td><textarea name="memo" rows="5" cols="50"></textarea></td>
            </tr>
            <tr>
              <td>日付</td>
              <td>
                <?php outputComboBox("cmbYear", 2010, 2016); ?>年
                <?php outputComboBox("cmbMonth", 1, 12) ?>月
                <?php outputComboBox("cmbDay", 1, 31) ?>日
                <?php outputComboBox("cmbHour", 0, 23) ?>時
                <?php outputComboBox("cmbMinute", 0, 59) ?>分
              </td>
            <tr>
              <td>電話応対者名</td>
              <td><input type="text" name="phoneAnswererName"></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" value="送信">
                <input type="reset" value="リセット">
              </td>
            </tr>
            </tr>
      		</table>
      	</form>

      </div>
	</nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>