<?php
    session_start();

    $search_recipe = $_POST['search_recipe'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>お問い合わせ | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../assets/css/contact_form.css" rel="stylesheet" media="all">
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
                <div class="box">
                    <div class="login">
                        <h3>お問い合わせ</h3>

                        <form action="./../contact_confirm/index.php" method="post">
                            <div class="form-group">
                                <div class="txtbox">
                                    <label for="InputName">お名前</label>
                                    <input type="user_name" name="name" class="form-control" id="InputName" placeholder="名前を入力して下さい。" required>
                                </div>
                                <div class="txtbox">
                                    <label for="InputEmail">メールアドレス</label>
                                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="メールアドレスを入力して下さい。" required>
                                </div>
                                <div class="txtbox">
                                    <label for="InputTextarea">内容</label>
                                    <textarea class="form-control" name="content" id="InputTextarea" placeholder="内容を入力して下さい。" required></textarea>
                                </div>
                                <div class="confirm text-center">
                                    <input type="submit" value="確認" class="btn btn-success" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>




        <footer class="text-center bg_orange">
            <p>©️Pistachio, Inc.</p>
        </footer>


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </div>
</body>
</html>
