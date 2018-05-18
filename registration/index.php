<?php
    require_once dirname(__FILE__) .'./../data/require.php';

    $informations_mail=$_GET['informations_mail'];
    $password=$_GET['password'];
    $informations_name=$_GET['informations_name'];

    $conn = new DbConn();

    if($informations_mail){
    $sql  = 'INSERT INTO informations(informations_mail,password,informations_name)';
    $sql .= '   VALUES("'.$informations_mail.'","'.$password.'","'.$informations_name.'")';
    }

    $conn->execute($sql);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>会員登録画面 | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../../assets/css/top.css" rel="stylesheet" media="all">
    <link href="./../../assets/css/login.css" rel="stylesheet" media="all">
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
<body >
    <header>
        <div class="row">
            <img src="./../../assets/img/logo.png" width="250">
        </div>
    </header>

    <section class="container">
        <div class="row otoiawse text-center">
            <div class="col-xs-12 text-center"><a class="btn btn-success" href="">お問い合わせはこちら</a></div>
        </div>

        <div class="row login-container">
            <div class="box login">
                <div class="login">
                    <h3>会員登録</h3>
                    <form method="get">
                        <div class="form-group">
                            <label for="InputEmail">メールアドレス</label>
                            <input type="email" class="form-control" id="InputEmail" placeholder="メールアドレスを入力して下さい。" name="informations_mail">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">パスワード</label>
                            <input type="password" class="form-control" id="InputPassword" placeholder="パスワードを入力して下さい。" name="password">
                        </div>
                        <div class="form-group">
                            <label for="InputName">ニックネーム</label>
                            <input type="text" class="form-control" id="InputName" placeholder="ニックネームを入力して下さい。" name="informations_name">
                        </div>
                        <div class="text-center"><input type="submit" value="会員登録" class="btn btn-success"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row text-center toroku-link">
            <a href="">会員登録はこちら（無料）</a>
        </div>

        <div class="this-box-all">
            <div class="row ttl">
                <h4>このサイトについて</h4>
            </div>
            <div class="row this-contents">
                <div class="col-xs-4 this-content">
                    <div class="this-content-txt this-box">
                        <p>冷蔵庫の中を管理できるよ！</p>
                    </div>
                </div>
                <div class="col-xs-4 this-content">
                    <div class="this-content-txt this-box">
                        <p>栄養バランスを管理できるよ！</p>
                    </div>
                </div>
                <div class="col-xs-4 this-content">
                    <div class="this-content-txt this-box">
                        <p>レシピ検索できるよ！</p>
                    </div>
                </div>
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
