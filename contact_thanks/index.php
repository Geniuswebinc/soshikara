<?php
    session_start();
    $id=$_SESSION['id'];
    // require_once dirname(__FILE__) .'./../login/login.php';
    require_once dirname(__FILE__) .'./../data/require.php';


    $name = $_POST['name'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    // データベース接続のクラス
    $conn = new DbConn();

    $sql  = 'INSERT INTO ';
    $sql .= '    contacts (contacts_name, contacts_mail, content)';
    $sql .= '  VALUES ( ';
    $sql .= '   "'.$name.'", "'.$email.'", "'.$content.'" ';
    $sql .= '  )';
    $conn->execute($sql);
    // var_dump($sql);

    // if(!$_SESSION['id'] > 0) {
    //     header('Location: ./../top/index.php');
    // }elseif(!$_SESSION['id'] < 0) {
    //     header('Location: ./../login/index.php');
    // }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>サンクス | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../assets/css/contact_thanks.css" rel="stylesheet" media="all">
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
    <div id="wrapper">
        <header>
            <div class="row">
                <img src="./../assets/images/logo.png" width="250" style="padding-left: 10px;">
            </div>

        </header>

        <main>
            <section class="container">
                <div class="box" style="margin-bottom: 90px;">
                    <div class="thanks text-center" style="margin-top: 180px;">
                        <h3>お問い合わせいただきありがとうございました。</h3>
                    </div>
                </div>

                <div class="back_to_top text-center">

                    <form method="post" action="totop.php">
                        <input type="submit" value="TOPに戻る">
                    </form>
            </section>
        </main>


        <footer class="text-center bg_orange">
            <p>©️Pistachio, Inc.</p>
        </footer>

    </div>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
