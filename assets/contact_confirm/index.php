<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>お問い合わせ内容の確認 | そして空になった</title>
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
<body >
    <header>
        <div class="row">
            <img src="./../assets/images/logo.png" width="250" style="padding-left: 10px;">
        </div>

    </header>

        <section class="container">
            <div class="box">
                <div class="login">
                    <h3>お問い合わせ内容の確認</h3>

                    <form action="thanks.php" method="post">
                        <div class="container form-group">
                            <div class="txtbox">
                                <label class="control-label">名前</label>
                <p class="form-control-static"><?php echo $name; ?></p>
                <input type="hidden" name="name" value="<?php echo $name; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <label class="control-label">メールアドレス</label>
                <p class="form-control-static"><?php echo $email; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <label class="control-label">お問い合わせ内容</label>
                <p class="form-control-static"><?php echo $content; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-offset-2 col-xs-4 col-sm-6">
                <button type="button" class="btn btn-default btn-lg" onclick="history.back()">戻る</button>
            </div>

            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-lg btn-success">送信</button>
            </div>
        </div>
    </div>
</form>

                </div>
            </div>
        </section>


        <footer class="text-center bg_orange">
            <p>©️Pistachio, Inc.</p>
        </footer>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
