<?php
    require_once dirname(__FILE__) .'./../data/require.php';

    $informations_mail=$_POST['informations_mail'];
    $password=$_POST['password'];
    $informations_name=$_POST['informations_name'];

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
    <title>サンクスページ | そして空になった</title>
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
    <link href="./../../assets/css/registration_thanks.css" rel="stylesheet" media="all">
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
            <div class="col-xs-12 text-center"><a class="btn btn-success" href="./../../contact_form/index.php">お問い合わせはこちら</a></div>
        </div>

        <div class="row thanx-msg box text-center">
            <div class="thanx-txt">
                <h3>会員登録いただきありがとうございました。<br>以下のリンクよりサービスをご利用ください。</h3>
            </div>
            <a href="./../../top/index.php">そして空になった TOPページ</a>
        </div>
    </section>

    <footer class="text-center">
        <?php require_once dirname(__FILE__) .'./../include/footer.php';?>
    </footer>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
