<?php
require_once dirname(__FILE__) .'./../data/require.php';
// データベース接続のクラス
$conn = new DbConn();

$sql = 'SELECT * FROM pantrys p';
$sql .= ' LEFT OUTER JOIN foods f';
$sql .= ' ON p.foods_id = f.id';
$sql .= ' WHERE p.updated_at is NULL';
$pantrys = $conn->fetch($sql);
var_dump($pantrys);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>旬の食材 | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../assets/css/shun.css" rel="stylesheet" media="all">
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

    <section class="shun">
        <h1 class="pl_10">旬の食材</h1>

        <div class="container">
            <div>
                <table class="bg_white">
                    <tr>
                        <td class="p_50 relative">
                            <label class="absolute"><h3>春</h3></label>
                            <a href="#spring" class="scale">
                                <img src="./../assets/images/shun/spring.png" class="img-responsive" alt="春">
                            </a>
                        </td>
                        <td class="p_50 relative">
                            <label class="absolute"><h3>夏</h3></label>
                            <a href="#summer" class="scale">
                                <img src="./../assets/images/shun/summer.png" class="img-responsive" alt="夏">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="p_50 relative">
                            <label class="absolute"><h3>秋</h3></label>
                            <a href="#autumn" class="scale">
                                <img src="./../assets/images/shun/autumn.png" class="img-responsive" alt="秋">
                            </a>
                        </td>
                        <td class="p_50 relative">
                            <label class="absolute"><h3>冬</h3></label>
                            <a href="#winter" class="scale">
                                <img src="./../assets/images/shun/winter.png" class="img-responsive" alt="冬">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="row">
                <h2>◯春</h2>
                <div class="col-xs-4" id="spring">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:いちご" target="_blank">いちご</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:さやえんどう" target="_blank">さやえんどう</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:しいたけ" target="_blank">しいたけ</a></li>
                    </ul>
                </div>

                <div class="col-xs-4" id="summer">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:じゃがいも" target="_blank">じゃがいも</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:そら豆" target="_blank">そら豆</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:たけのこ" target="_blank">たけのこ</a></li>
                    </ul>
                </div>

                <div class="col-xs-4" id="autumn">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:玉ねぎ" target="_blank">玉ねぎ</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:菜の花" target="_blank">菜の花</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <h2>◯夏</h2>
                <div class="col-xs-4" id="winter">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:あじ" target="_blank">あじ</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:うなぎ" target="_blank">うなぎ</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:かぼちゃ" target="_blank">かぼちゃ</a></li>
                    </ul>
                </div>

                <div class="col-xs-4">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:きゅうり" target="_blank">きゅうり</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:トマト" target="_blank">トマト</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:なし" target="_blank">なし</a></li>
                    </ul>
                </div>

                <div class="col-xs-4">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:なす" target="_blank">なす</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:ピーマン" target="_blank">ピーマン</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:ぶどう" target="_blank">ぶどう</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <h2>◯秋</h2>
                <div class="col-xs-4">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:柿" target="_blank">柿</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:栗" target="_blank">栗</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:鮭" target="_blank">鮭</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:さつまいも" target="_blank">さつまいも</a></li>
                    </ul>
                </div>

                <div class="col-xs-4">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:鯖" target="_blank">鯖</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:秋刀魚" target="_blank">秋刀魚</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:しいたけ" target="_blank">しいたけ</a></li>

                    </ul>
                </div>

                <div class="col-xs-4">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:じゃがいも" target="_blank">じゃがいも</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:人参" target="_blank">人参</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:りんご" target="_blank">りんご</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <h2>◯冬</h2>
                <div class="col-xs-4">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:キャベツ" target="_blank">キャベツ</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:鯛" target="_blank">鯛</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:大根" target="_blank">大根</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:ねぎ" target="_blank">ねぎ</a></li>
                    </ul>
                </div>

                <div class="col-xs-4">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:白菜" target="_blank">白菜</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:鰤" target="_blank">鰤</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:ブロッコリー" target="_blank">ブロッコリー</a></li>
                    </ul>
                </div>

                <div class="col-xs-4">
                    <ul>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:ほうれん草" target="_blank">ほうれん草</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:鮪" target="_blank">鮪</a></li>
                        <li><a href="https://www.bob-an.com/recipes/search/SF.query:みかん" target="_blank">みかん</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center bg_orange">
        <p>©️Pistachio, Inc.</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
