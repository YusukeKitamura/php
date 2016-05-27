<!DOCTYPR HTML PUBLIC "-//W3C//DTD/ HTML 4. Transitional//EN">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>伝言メモシステム</title>

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
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><span class="strong-title">
                 伝言メモシステム
              </span></a>
              <br />
              <br />
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
              </ul>
          </div>
          <!-- /.navbar-collapse -->
    </div>
      <!-- /.container-fluid -->

    <div class="row">
      <div class="col-md-4 content-margin-top">

        <div class="text-center">
          <a href="memoInputPage.php">伝言メモ入力画面</a>
          <br />
          <a href="memoLoginPage.php">伝言メモ閲覧画面</a>
        </div>

      </div>
    </div>
    <script type="text/javascript"><!--
    myWeek=new Array("日","月","火","水","木","金","土");
    function myFunc(){
      myDate=new Date();
      myMsg = myDate.getFullYear() + "年";
      myMsg += ( myDate.getMonth() + 1 ) + "月";
      myMsg += myDate.getDate() + "日";
      myMsg += "(" + myWeek[myDate.getDay()] +  "曜日)";
      myMsg += myDate.getHours() + "時";
      myMsg += myDate.getMinutes() + "分";
      myMsg += myDate.getSeconds() + "秒";
      document.getElementById("myIDdate").innerHTML = myMsg;
    }
    </script>
    <div id="myIDdate"></div>
    <script type="text/javascript">
      setInterval( "myFunc()", 1000 );
    </script>
	</nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>