<?php
require_once dirname(__FILE__) .'./../data/require.php';

$login_mail=$_GET['login_mail'];
$login_pass=$_GET['login_pass'];

$conn = new DbConn();

if($login_mail){
$sql  = ' SELECT * FROM informations';
 $sql .= '   WHERE informations_mail="'.$login_mail.'"';
}

$informations = $conn->fetch($sql);

var_dump($informations);
var_dump($sql);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TOP | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../../assets/css/top.css" rel="stylesheet" media="all">
    <!--[if IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/css3-mediaqueries.js"></script>
    <script src="/js/selectivizr-min.js"></script>
    <![endif]-->
    <!--[if lte IE 8]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/selectivizr-min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="row top-header">
            <div class="col-xs-6 top-img text-left">
                <img src="./../../assets/img/logo.png" width="250">
            </div>
            <div class="col-xs-6 top-login text-right">
                <a href="">お問い合わせはこちら</a>
                <p class="msg">ログイン中 <?php foreach($informations as $val){
                    echo $val[informations_name];
                } ?>さん</p>
                <form name="Logout" method="post" action="/cgi-bin/Logout.cgi">
                    <input type="submit" value="Logout" class="btn btn-success btn-sm">
                </form>
            </div>
        </div>

        <div class="row mt_10">
            <ul class="nav nav-justified bg_orange">
                <li role="presentation" class="active"><a href="#">HOME</a></li>
                <li role="presentation"><a href="#">登録・一覧</a></li>
                <li role="presentation"><a href="#">栄養バランス</a></li>
                <li role="presentation"><a href="#">旬の食材</a></li>
                <li role="presentation"><a href="#">キャラクター</a></li>
            </ul>
        </div>
    </header>

    <section class="container">
        <div class="row search">
            <div class="col-xs-6 search-pantry">
                <div class="seach-container box">
                    <div class="row seach-container-top">
                        <h2 class="col-xs-6">パントリー検索</h2>
                        <div class="col-xs-6 text-right btnstyl"><a class="btn btn-success btn-sm btnhalf" href="#登録ページ">一覧へ</a></div>
                    </div>
                    <form class="form-inline">
                        <div class="row seach-form">
                            <input type="search" name="" class="col-xs-6 form-control input-sm" required>
                            <div class="col-xs-6 text-right btnstyl"><input type="submit" value="検索" class="btn btn-success btn-sm btnhalf"></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xs-6 search-recipe">
                <div class="seach-container box">
                    <div class="row seach-container-top">
                        <h2 class="col-xs-6">レシピ検索</h2>
                        <div class="col-xs-6 text-right btnstyl"><a class="btn btn-success btn-sm btnhalf" href="#登録ページ">一覧へ</a></div>
                    </div>
                    <form class="form-inline">
                        <div class="row seach-form">
                            <input type="search" name="" class="col-xs-6 form-control input-sm" required>
                            <div class="col-xs-6 text-right btnstyl"><input type="submit" value="検索" class="btn btn-success btn-sm btnhalf"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row limits box">
            <div class="limits-ttl col-xs-12"><h5>もうすぐ期限切れ</h5></div>
            <div class="limit-cotainer">

                <div class="col-xs-4 limit">
                    <h6>今日</h6>
                    <div class="limit-food">
                        <li><a href="#">おこめ</a></li>
                        <li><a href="#">おにぎり</a></li>
                        <li><a href="#">おむずび</a></li>
                        <li><a href="#">白米</a></li>
                        <li><a href="#">玄米</a></li>
                        <li><a href="#">雑穀米</a></li>
                        <li><a href="#">おかゆ</a></li>
                    </div>
                </div>
                <div class="col-xs-4 limit limit-center">
                    <h6>1日前</h6>
                    <div class="limit-food">

                        <li><a href="#">おにく</a></li>
                        <li><a href="#">牛肉</a></li>
                        <li><a href="#">豚肉</a></li>
                        <li><a href="#">鶏肉</a></li>
                        <li><a href="#">チキン</a></li>
                        <li><a href="#">ささみ</a></li>
                        <li><a href="#">あぶらみ</a></li>
                    </div>
                </div>
                <div class="col-xs-4 limit">
                    <h6>2日前</h6>
                    <div class="limit-food">
                        <li><a href="#">あいす</a></li>
                        <li><a href="#">チョコレート</a></li>
                        <li><a href="#">飴</a></li>
                        <li><a href="#">クッキー</a></li>
                        <li><a href="#">ポテトチップス</a></li>
                        <li><a href="#">柿の種</a></li>
                        <li><a href="#">ピスタチオ</a></li>
                    </div>
                </div>
            </div>
        </div>

        <div class="row balance">
            <div class="col-xs-6 data">
                <div class="sumple-size"><h2>ここにパラグラフを表示</h2></div>
            </div>
            <div class="col-xs-6 tairi">
                <div class="sumple-size"><h2>ここにタイリーを表示</h2></div>
            </div>
        </div>

    </section>

    <footer class="text-center">
        <p>©︎Pistachio, Inc.</p>
    </footer>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
