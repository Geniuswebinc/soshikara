<?php
require_once dirname(__FILE__) .'./../login/login.php';
require_once dirname(__FILE__) .'./../data/require.php';

$login_name=$_SESSION['name'];
$informations_id = $_SESSION['id'];
// データベース接続のクラス
$conn = new DbConn();

$sql = 'SELECT * FROM pantrys p';
$sql .= ' LEFT OUTER JOIN foods f';
$sql .= ' ON p.foods_id = f.id';
$sql .= ' WHERE informations_id = '.'"'.$informations_id.'"';
$sql .= ' AND updated_at is Null';
$pantrys = $conn->fetch($sql);

// var_dump($pantrys);

$pantrys_number_array = array();
foreach ($pantrys as $val){
    $pantrys_number_array[] = $val['number'];
}


foreach ($pantrys as $val) {
    $number = $val['number'];
};

$kaisan = './../assets/images/kaisan.png';

// var_dump($pantrys);
// var_dump($number);

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
    <?php
        require_once dirname(__FILE__) .'./../include/header.php';
    ?>

    <section class="shun">
        <h1 class="pl_10">旬の食材</h1>

        <div class="container">
            <div>
                <table class="bg_white main_img">
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

            <div class="row list">
                <h2>◯春</h2>
                <div class="col-xs-4" id="spring">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(1, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:いちご" target="_blank" value="1">いちご</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(2, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                        <td><a href="https://www.bob-an.com/recipes/search/SF.query:さやえんどう" target="_blank">さやえんどう</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(3, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:しいたけ" target="_blank">しいたけ</a></li>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-4">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(4, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:じゃがいも" target="_blank">じゃがいも</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(5, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:そら豆" target="_blank">そら豆</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(6, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:たけのこ" target="_blank">たけのこ</a></td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-4">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(7, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:玉ねぎ" target="_blank">玉ねぎ</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(8, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:菜の花" target="_blank">菜の花</a></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row list">
                <h2>◯夏</h2>
                <div class="col-xs-4" id="summer">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(9, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:あじ" target="_blank">あじ</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(10, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:うなぎ" target="_blank">うなぎ</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(11, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:かぼちゃ" target="_blank">かぼちゃ</a></td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-4">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(12, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:きゅうり" target="_blank">きゅうり</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(13, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:トマト" target="_blank">トマト</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(14, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:なし" target="_blank">なし</a></td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-4">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(15, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:なす" target="_blank">なす</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(16, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:ピーマン" target="_blank">ピーマン</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(17, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:ぶどう" target="_blank">ぶどう</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row list">
                <h2>◯秋</h2>
                <div class="col-xs-4" id="autumn">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(18, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:柿" target="_blank">柿</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(19, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:栗" target="_blank">栗</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(20, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:鮭" target="_blank">鮭</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(21, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:さつまいも" target="_blank">さつまいも</a></td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-4">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(22, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:鯖" target="_blank">鯖</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(23, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:秋刀魚" target="_blank">秋刀魚</a></td></tr>
                        <tr>
                            <th><?php if(in_array(4, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:しいたけ" target="_blank">しいたけ</a></td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-4">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(5, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:じゃがいも" target="_blank">じゃがいも</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(24, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:人参" target="_blank">人参</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(25, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:りんご" target="_blank">りんご</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row list">
                <h2>◯冬</h2>
                <div class="col-xs-4" id="winter">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(26, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:キャベツ" target="_blank">キャベツ</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(27, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:鯛" target="_blank">鯛</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(28, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:大根" target="_blank">大根</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(29, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:ねぎ" target="_blank">ねぎ</a></td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-4">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(30, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:白菜" target="_blank">白菜</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(31, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:鰤" target="_blank">鰤</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(32, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:ブロッコリー" target="_blank">ブロッコリー</a></td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-4">
                    <table class="syokuzai">
                        <tr>
                            <th><?php if(in_array(33, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:ほうれん草" target="_blank">ほうれん草</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(34, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:鮪" target="_blank">鮪</a></td>
                        </tr>
                        <tr>
                            <th><?php if(in_array(35, $pantrys_number_array)) echo "<img src=\"$kaisan\">"; ?></th>
                            <td><a href="https://www.bob-an.com/recipes/search/SF.query:みかん" target="_blank">みかん</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php
        require_once dirname(__FILE__) .'./../include/footer.php';
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
