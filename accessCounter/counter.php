<?php
    /*
        MySQLを用いたアクセスカウンタ
        HTMLに埋め込むときは以下のようにする
        <script language="javascript" type="text/javascript" src="counter.php"></script>
    */
    //ステップ１　DB接続
    $dsn      = 'mysql:dbname=dbname;host=localhost';
    //接続するためのユーザー情報
    $user     = 'user';
    $password = '';

    //JavaScriptの形式で埋め込むために必要
    header("Content-type: application/x-javascript" );

    session_start();

    $this_day = date("Ymd");    //今日の年月日を取得

    //DB接続オブジェクトを作成
    $dbh  = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->query('SET NAMES utf8');

    //counterテーブルを取得
    $sql  = 'SELECT * FROM `counter`';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);  //1レコード取り出し
    $day       = $rec['day'];
    $yesterday = $rec['yesterday'];
    $today     = $rec['today'];
    $total     = $rec['total'];

    if ($day==date('Y-m-d')) {
        //同じ日にダブルカウントしないようにする
        if (!isset($_SESSION['access'])) {
            $_SESSION['access'] = 1;
            $today++;
            $total++;
        }
    } else {
        if (!isset($_SESSION['access'])) {
            $_SESSION['access'] = 1;
        }
        $day = date('Y-m-d');
        $yesterday = $today;
        $today = 1;
        $total++;
    }

    //counterテーブルを更新
    $sql  = 'UPDATE `counter` SET `day`='.$this_day.',`yesterday`='.$yesterday.',`today`='.$today.',`total`='.$total;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();


?>
<!--
    JavaScriptの形式で合計と当日と前日のアクセス数を出力
-->
document.write( " <b>Counter : </b>   " );
document.write( " <b> Total: <?= $total ?></b>   " );
document.write( " <b> Today: <?= $today ?></b>   " );
document.write( "  <b> Yesterday: <?= $yesterday ?></b> " );