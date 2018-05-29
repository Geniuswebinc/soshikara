<?php
require_once dirname(__FILE__) .'./../data/require.php';
require_once dirname(__FILE__) .'./../login/login.php';



// データベース接続のクラス
$conn = new DbConn();

echo $_POST['search_name'];

// 食材登録
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
    $conn->execute($sql);
}

// 消費
if ($_POST['consumed_quantity']) {
    $id = $_POST['pantrys_id'];
    $quantity = $_POST['consumed_quantity'];
    $sql = 'INSERT INTO';
    $sql .= ' consumed(consumed_quantity, pantrys_id)';
    $sql .= ' VALUES (';
    $sql .= "'".$quantity."','".$id."'";
    $sql .= ' )';
    $conn->execute($sql);

    $p_quantity = $_POST['pantry_quantity'];
    $diff = $p_quantity - $quantity;
    if ($diff > 0) {
         $sql = 'UPDATE pantrys';
         $sql .= ' SET pantrys_quantity = '.$diff;
         $sql .= ' WHERE id = '.$id;
         $conn->execute($sql);
         var_dump($sql);
    } else if ($diff == 0) {
        $sql = 'UPDATE pantrys';
        $sql .= ' SET updated_at = CURRENT_TIMESTAMP';
        $sql .= ' WHERE id = '.$id;
        $conn->execute($sql);
    }
}

// 取消
if ($_POST['c_id']) {
    $c_id = $_POST['c_id'];
    $c_quantity = $_POST['c_quantity'];
    $p_id = $_POST['c_pantry_id'];
    $p_quantity = $_POST['c_pantry_quantity'];
    $quantity = $p_quantity + $c_quantity;

    $sql = 'UPDATE pantrys';
    $sql .= ' SET pantrys_quantity = '.$quantity;
    $sql .= ' , updated_at = NULL';
    $sql .= ' WHERE id = '.$p_id;
    $conn->execute($sql);

    $sql2 = 'DELETE FROM consumed';
    $sql2 .= ' WHERE id = '.$c_id;
    $conn->execute($sql2);
}

// 食材マスター
$sql = 'SELECT * FROM foods';
$foods = $conn->fetch($sql);

// パントリー取得
$sql = 'SELECT p.*, f.id as f_id, f.foods_name, f.nutrients, f.unit, f.number  FROM pantrys p';
$sql .= ' LEFT OUTER JOIN foods f';
$sql .= ' ON p.foods_id = f.id';
$sql .= ' WHERE p.updated_at is NULL';
if ($_POST['search_name']) {
    $search_name = $_POST['search_name'];
    $sql .= ' AND f.foods_name ="'.$search_name.'"';
}
if ($_POST['search_food']) {
    $number = $_POST['search_food'];
    $sql .= ' AND f.number ='.$number;
}
$sql .= ' ORDER BY p.pantrys_created_at DESC';
$pantries = $conn->fetch($sql);


//　消費済み取得
$sql = 'SELECT *, c.id as c_id FROM consumed c';
$sql .= ' LEFT OUTER JOIN pantrys p';
$sql .= ' ON c.pantrys_id = p.id';
$sql .= ' LEFT OUTER JOIN foods f';
$sql .= ' ON p.foods_id = f.id';
$sql .= ' ORDER BY c.eat_at DESC';
$consumeds = $conn->fetch($sql);

// var_dump($sql);
// var_dump($foods);
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
    <link href="./../assets/css/pantry.css" rel="stylesheet" media="all">
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
    <?php
        require_once dirname(__FILE__) .'./../include/header.php';
    ?>

    <section class="pantry">
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
                    <input type="submit" value="登録" class="btn btn-success mt_25" id="btnRegister">
                </form>
            </div>

            <div class="right mt_25">
                <form method="post">
                    <div class="col-xs-11">
                        <select class="js-example-basic-single form-control w_200" name="search_food" id="select_search_food">
                            <option></option>
                            <?php foreach ($foods as $food)
                                {
                            ?>
                                <option value="<?php echo $food['number']; ?>"><?php echo $food['foods_name']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-1">
                        <input type="submit" value="検索" class="btn btn-success" id="btnSearch">
                    </div>
                </form>
            </div>

            <ul class="nav nav-tabs">
                <li class="active"><a href="#pantry" data-toggle="tab" id="tabpantry">パントリー</a></li>
                <li><a href="#consum" data-toggle="tab" id="tabConsumed">消費済み</a></li>
            </ul>

            <!-- タブ内容 -->
            <div class="tab-content active">
                <div class="tab-pane active" id="pantry">
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
                                foreach ($pantries as $pantry) {
                            ?>
                            <tr>
                                <td><?php echo $pantry['nutrients']; ?></td>
                                <td><?php echo $pantry['foods_name']; ?></td>
                                <td><?php echo $pantry['limit_date']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($pantry['pantrys_created_at'])); ?></td>
                                <form method="post">
                                    <td>
                                        <?php
                                            $unit = $pantry['unit'];
                                            if ($unit == 1) {
                                        ?>
                                        <input type="number" name="consumed_quantity" step="0.5" min="0" max="<?php echo $pantry['pantrys_quantity']; ?>" class="form-control">
                                        <?php
                                            } else if ($unit == 2) {
                                        ?>
                                        <input type="number" name="consumed_quantity" step="50" min="0" max="<?php echo $pantry['pantrys_quantity']; ?>" class="form-control">
                                        <?php
                                            } else if ($unit == 3) {
                                        ?>
                                        <input type="number" name="consumed_quantity" step="10" min="0" max="<?php echo $pantry['pantrys_quantity']; ?>" class="form-control">
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo '/'.$pantry['pantrys_quantity'];
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
                                        <input type="hidden" name="pantrys_id" value="<?php echo $pantry['id'];?>">
                                        <input type="hidden" name="pantry_quantity" value="<?php echo $pantry['pantrys_quantity']; ?>">
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
                            <th class="text-center">消費取消</th>
                        </thead>
                        <tdody>
                            <?php
                                foreach ($consumeds as $consumed) {
                            ?>
                            <tr>
                                <td><?php echo $consumed['nutrients']; ?></td>
                                <td><?php echo $consumed['foods_name']; ?></td>
                                <td><?php echo $consumed['limit_date']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($consumed['eat_at'])); ?></td>
                                <td>
                                    <?php
                                        echo $consumed['consumed_quantity'];
                                        $unit2 = $consumed['unit'];
                                        if ($unit2 == 1) {
                                            echo "個";
                                        } else if ($unit2 == 2) {
                                            echo "g";
                                        } else if ($unit2 == 3) {
                                            echo "ml";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <button name="delete" class="btn btn-default">取り消し</button>
                                        <input type="hidden" name="c_id" value="<?php echo $consumed['c_id'];?>">
                                        <input type="hidden" name="c_quantity" value="<?php echo $consumed['consumed_quantity']; ?>">
                                        <input type="hidden" name="c_pantry_id" value="<?php echo $consumed['pantrys_id']; ?>">
                                        <input type="hidden" name="c_pantry_quantity" value="<?php echo $consumed['pantrys_quantity']; ?>">
                                    </form>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tdody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php
        require_once dirname(__FILE__) .'./../include/footer.php';
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $('select').select2();
    </script>
    <script type="text/javascript" src="./../assets/js/pantry.js"></script>
</body>
</html>
