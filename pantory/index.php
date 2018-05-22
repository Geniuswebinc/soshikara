<?php
require_once dirname(__FILE__) .'./../data/require.php';

// データベース接続のクラス
$conn = new DbConn();

if ($_POST['name']) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $limit_date = $_POST['limit_date'];
    $id = $_POST['id'];

    $sql = 'INSERT INTO';
    $sql .= ' pantrys(pantrys_quantity, limit_date, foods_id, informations_id)';
    $sql .= ' VALUES ( ';
    $sql .= "'".$quantity."','".$limit_date."','".$id."','1'";
    $sql .= ' )';
    $conn->fetch($sql);
}

if ($_POST['complete_id']) {
    $id = $_POST['complete_id'];
    $sql = 'INSERT INTO';
}


$sql = 'SELECT * FROM foods';
$foods = $conn->fetch($sql);

$sql = 'SELECT p.*, f.id as f_id, f.foods_name, f.nutrients, f.unit, f.number  FROM pantrys p';
$sql .= ' LEFT OUTER JOIN foods f';
$sql .= ' ON p.foods_id = f.id';
$sql .= ' ORDER BY p.pantrys_created_at DESC';
$pantries = $conn->fetch($sql);

var_dump($sql);
var_dump($foods);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> 登録・一覧 | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../assets/css/pantory.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
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

    <section class="pantory">
        <h1 class="pl_10">登録・一覧</h1>

        <div class="container">
            <div class="row b1_gray p_20_10 br_5">
                <form method="post">
                    <div class="col-xs-3">
                        <label>食材名</label>
                        <select class="js-example-basic-single form-control" name="name" id="select_food">
                            <option>---</option>
                            <?php foreach ($foods as $food)
                                {
                            ?>
                                    <option value="<?php echo $food['id']; ?>" data-unit="<?php echo $food['unit']; ?>"><?php echo $food['foods_name']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div id="unit"></div>
                    <input type="submit" value="登録" class="btn btn-success mt_25">
                </form>
            </div>

            <div class="right">
                <form method="post">
                    <input type="text" name="">
                    <input type="submit" value="検索" class="btn btn-success">
                </form>
            </div>

            <ul class="nav nav-tabs">
                <li class="active"><a href="#pantory" data-toggle="tab">パントリー</a></li>
                <li><a href="#consum" data-toggle="tab">消費済み</a></li>
            </ul>

            <!-- タブ内容 -->
            <div class="tab-content active">
                <div class="tab-pane active" id="pantory">
                    <table class="table text-center">
                        <thead>
                            <th class="text-center">食品群</th>
                            <th class="text-center">食品名</th>
                            <th class="text-center">期限</th>
                            <th class="text-center">登録日</th>
                            <th class="text-center" colspan="2">量</th>
                            <th class="text-center">消費</th>
                        </thead>
                        <tdody>
                            <?php
                                foreach ($pantries as $pantory) {
                            ?>
                            <tr>
                                <td><?php echo $pantory['nutrients']; ?></td>
                                <td><?php echo $pantory['foods_name']; ?></td>
                                <td><?php echo $pantory['limit_date']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($pantory['pantrys_created_at'])); ?></td>
                                <form method="post">
                                    <td>
                                        <?php
                                            $unit = $pantory['unit'];
                                            if ($unit == 1) {
                                        ?>
                                        <input type="number" name="complete_quantity" step="0.5" min="0" max="<?php echo $pantory['pantrys_quantity']; ?>" class="form-control">
                                        <?php
                                            } else if ($unit == 2) {
                                        ?>
                                        <input type="number" name="complete_quantity" step="50" min="0" max="<?php echo $pantory['pantrys_quantity']; ?>" class="form-control">
                                        <?php
                                            } else if ($unit == 3) {
                                        ?>
                                        <input type="number" name="complete_quantity" step="10" min="0" max="<?php echo $pantory['pantrys_quantity']; ?>" class="form-control">
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo '/'.$pantory['pantrys_quantity'];
                                            if ($unit == 1) {
                                                echo "個";
                                            } else if ($unit == 2) {
                                                echo "g";
                                            } else if ($unit == 3) {
                                                echo "ml";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <button name="complete" class="btn btn-default">消費</button>
                                        <input type="hidden" name="complete_id" value="<?php echo $val['id'];?>">
                                    </td>
                                </form>
                            </tr>
                            <?php
                                }
                            ?>
                        </tdody>
                    </table>
                </div>
                <div class="tab-pane" id="consum">
                    <table class="table text-center">
                        <thead>
                            <th class="text-center">食品群</th>
                            <th class="text-center">食品名</th>
                            <th class="text-center">期限</th>
                            <th class="text-center">消費日</th>
                            <th class="text-center">量</th>
                            <th class="text-center">消費</th>
                        </thead>
                        <tdody>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form method="post">
                                    <button name="update" class="btn btn-default">更新</button>
                                    <input type="hidden" name="id" value="<?php echo $val['id'];?>">
                                </form>
                            </td>
                        </tdody>
                    </table>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $('select').select2();
    </script>
    <script type="text/javascript" src="./../assets/js/pantory.js"></script>
</body>
</html>
