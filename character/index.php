<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>キャタクター | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../assets/css/character.css" rel="stylesheet" media="all">
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
<body onload="displayPieChart();">
    <div id="wrapper">
        <?php
            require_once dirname(__FILE__) .'./../include/header.php';
        ?>

        <main>
            <section>
                <h1 class="pl_10">キャラクター</h1>
                <div class="container">
                    <div class="chara row">
                        <div class="box1 col-sm-3">
                            <p class="sankaku">▶︎</p><a class="charaname" href="#tairy">たいりー</a>
                        </div>
                        <div class="box1 col-sm-3">
                            <p class="sankaku">▶︎</p><a class="charaname" href="#shonon">しょうのん</a>
                        </div>
                        <div class="box1 col-sm-3">
                            <p class="sankaku">▶︎</p><a class="charaname" href="#mrk">Mr.K</a>
                        </div>
                        <div class="box1 col-sm-3">
                            <p class="sankaku">▶︎</p><a class="charaname" href="#god">？？？</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="tairy">
                <div class="container">
                    <p class="charaname2">たいりー</p>
                    <div class="box2 row">
                        <div class="col-sm-5">
                            <img src="./../assets/images/tairy.png" alt="" width="100%">
                        </div>
                        <div class="txt col-sm-7">
                            <p>応援してくれるよ！</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="shonon">
                <div class="container">
                    <p class="charaname2">しょうのん</p>
                    <div class="box2 row">
                        <div class="col-sm-5">
                            <img src="./../assets/images/shonon.png" alt="" width="100%">
                        </div>
                        <div class="txt col-sm-7">
                            <p>心配してくれるよ！</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="mrk">
                <div class="container">
                    <p class="charaname2">Mr.K</p>
                    <div class="box2 row">
                        <div class="mrk_img col-sm-5">
                            <img src="./../assets/images/kaisannaiyo.png" alt="" width="80%">
                        </div>
                        <div class="txt mrk_txt col-sm-7">
                            <p>パントリーに旬の食材があったら教えてくれるよ！</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="god">
                <div class="container">
                    <p class="charaname2">？？？</p>
                    <div class="box2 row">
                        <div class="col-sm-5">
                            <img src="./../assets/images/gods.png" onmouseover="this.src='./../assets/images/god.png'" onmouseout="this.src='./../assets/images/gods.png'"　alt="" width="100%">
                        </div>
                        <div class="txt col-sm-7">
                            <p>たまに会えるよ！</p>
                        </div>
                    </div>
                </div>
            </section>

        <?php
            require_once dirname(__FILE__) .'./../include/footer.php';
        ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</body>
</html>
