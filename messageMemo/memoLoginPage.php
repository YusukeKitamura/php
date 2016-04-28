<!DOCTYPR HTML PUBLIC "-//W3C//DTD/ HTML 4. Transitional//EN">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>伝言メモ閲覧画面</title>

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

      	<h1>伝言メモ閲覧画面</h1>

      	<form method="POST" action="memoCheckPage.php">
      		<table border="1">
      			<tr>
              <td rowspan="2">ユーザー</td>
              <td>部署名</td>
              <td><input type="text" name="userDepartment"></td>
            </tr>
            <tr>
              <td>氏名</td>
              <td><input type="text" name="userName">様</td>
            </tr>
            <tr>
              <td colspan="3" align="center">
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