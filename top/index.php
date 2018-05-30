<?php
require_once dirname(__FILE__) .'./../login/login.php';
require_once dirname(__FILE__) .'./../data/require.php';

$login_name=$_SESSION['name'];
$id=$_SESSION['id'];

$search_recipe=$_GET['search_recipe'];

$conn = new DbConn();

$sql  = 'SELECT * FROM pantrys';
$sql .= '   LEFT OUTER JOIN foods';
$sql .= '   ON pantrys.foods_id=foods.id';
$sql .= '   LEFT OUTER JOIN informations';
$sql .= '   ON pantrys.informations_id=informations.id';
$sql .= '   WHERE informations_name='.'"'.$login_name.'"';

$pantrys=$conn->fetch($sql);

$consumed = $conn->fetch($sql);

$sql  = 'SELECT ';
$sql .= ' COUNT(CASE WHEN T1.nutrients=1 THEN 1  END) as cnt1,';
$sql .= ' COUNT(CASE WHEN T1.nutrients=2 THEN 1  END) as cnt2,';
$sql .= ' COUNT(CASE WHEN T1.nutrients=3 THEN 1  END) as cnt3,';
$sql .= ' COUNT(CASE WHEN T1.nutrients=4 THEN 1  END) as cnt4,';
$sql .= ' COUNT(CASE WHEN T1.nutrients=5 THEN 1  END) as cnt5,';
$sql .= ' COUNT(CASE WHEN T1.nutrients=6 THEN 1  END) as cnt6';
$sql .= ' FROM ( ';
$sql .= ' SELECT foods_name,nutrients,eat_at,informations_id ';
$sql .= ' FROM foods ';
$sql .= ' INNER JOIN pantrys ON foods.id = pantrys.foods_id ';
$sql .= ' INNER JOIN consumed ON pantrys.id = consumed.pantrys_id ';
$sql .= ' WHERE DATE(eat_at)  = DATE(now()) && informations_id = '.'"'.$id.'"';
$sql .= ' GROUP BY foods.number ';
$sql .= ' ) AS T1';
$foods = $conn->fetch($sql);

foreach ($foods as $val) {
    $today01 = $val['cnt1'] / 5 * 100;
    $today02 = $val['cnt2'] / 3 * 100;
    $today03 = $val['cnt3'] / 5 * 100;
    $today04 = $val['cnt4'] / 7 * 100;
    $today05 = $val['cnt5'] / 4 * 100;
    $today06 = $val['cnt6'] / 3 * 100;
};

//var_dump($informations);
//var_dump($pantrys);
//var_dump($sql);
//var_dump($_SESSION);

$image = array(
    "./../assets/images/tairy_cmt.png",
    "./../assets/images/shonon_cmt.png",
    "./../assets/images/god_cmt.png",
);
$image = $image[rand(0, count($image)-1)];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TOP | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../assets/css/top.css" rel="stylesheet" media="all">
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
        <?php require_once dirname(__FILE__) .'./../include/header.php';?>
    </header>

    <section class="container">
        <div class="row search">
            <div class="col-xs-6 search-pantry">
                <div class="seach-container box">
                    <div class="row seach-container-top">
                        <h2 class="col-xs-6">パントリー検索</h2>
                        <div class="col-xs-6 text-right btnstyl"><a class="btn btn-success btn-sm btnhalf" href="./../../pantry/index.php">一覧へ</a></div>
                    </div>
                    <form class="form-inline" method=post action="./../../pantry/index.php">
                        <div class="row seach-form">
                            <input type="search"  name="search_name" class="col-xs-6 form-control input-sm" required>
                            <div class="col-xs-6 text-right btnstyl">
                                <button type="submit" class="btn btn-success btn-sm btnhalf">検索</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xs-6 search-recipe">
                <div class="seach-container box">
                    <div class="row seach-container-top">
                        <h2 class="col-xs-6">レシピ検索</h2>
                        <div class="col-xs-6 text-right btnstyl"><a class="btn btn-success btn-sm btnhalf" href="https://www.bob-an.com/recipes/search/SF.search_type:1/">一覧へ</a></div>
                    </div>
                    <form class="form-inline" method="get" id="searchBox">
                        <div class="row seach-form">
                            <input type="search" name="search_recipe" class="col-xs-6 form-control input-sm" id="searchRecipe" required>
                            <div class="col-xs-6 text-right btnstyl">
                                <button type="submit" class="btn btn-success btn-sm btnhalf"
                                onclick="$('#searchBox').attr('action', 'https://www.bob-an.com/recipes/search/SF.search_type:1/SF.query:'+ $('#searchRecipe').val() ); $('#searchBox').submit();">検索</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row limits box">
            <div class="limits-ttl col-xs-12"><h5>もうすぐ期限切れ</h5></div>
            <div class="limit-cotainer">

                <div class="col-xs-4 limit">
                    <h6>今日</h6>
                    <div class="limit-food">
                        <?php foreach($pantrys as $val){
                            $now=date('Y-m-d');
                            $daydiff = (strtotime($val[limit_date])-strtotime($now))/(3600*24);
                            if($daydiff==0){
                                echo '<li><a href="https://www.bob-an.com/recipes/search/SF.search_type:1/SF.query:'.$val[foods_name].'">'.$val[foods_name].'</a></li>';
                            }
                        }?>
                    </div>
                </div>
                <div class="col-xs-4 limit limit-center">
                    <h6>1日前</h6>
                    <div class="limit-food">
                        <?php foreach($pantrys as $val){
                            $now=date('Y-m-d');
                            $daydiff = (strtotime($val[limit_date])-strtotime($now))/(3600*24);
                            if($daydiff==1){
                                echo '<li><a href="https://www.bob-an.com/recipes/search/SF.search_type:1/SF.query:'.$val[foods_name].'">'.$val[foods_name].'</a></li>';
                            }
                        }?>
                    </div>
                </div>
                <div class="col-xs-4 limit">
                    <h6>2日前</h6>
                    <div class="limit-food">
                        <?php foreach($pantrys as $val){
                            $now=date('Y-m-d');
                            $daydiff = (strtotime($val[limit_date])-strtotime($now))/(3600*24);
                            if($daydiff==2){
                                echo '<li><a href="https://www.bob-an.com/recipes/search/SF.search_type:1/SF.query:'.$val[foods_name].'">'.$val[foods_name].'</a></li>';
                            }
                        }?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <div class="intab">
                    <div class="row">
                        <div class="chart">
                            <canvas id="graph" width="250px" height="250px"></canvas>
                        </div>

                        <script type="text/javascript">
                        document.getElementById("view_today").innerHTML = getToday();

                        function getToday() {
                            var now = new Date();
                            var mon = now.getMonth()+1;
                            var day = now.getDate();
                            var you = now.getDay();

                            var youbi = new Array("日","月","火","水","木","金","土");

                            var s = mon + "月" + day + "日 (" + youbi[you] + ")";
                            return s;
                        }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="chara-show">
                    <?php echo '<img src="'.$image.'" alt="" width="100%">';?>
                </div>
            </div>
        </div>

    </section>

    <footer class="text-center">
        <?php require_once dirname(__FILE__) .'./../include/footer.php';?>
    </footer>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="./../assets/js/chart.php"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

    <!-- 今日 -->
    <script>
    $(function(){

        var drawGraph = function(data){
            var ctx = document.getElementById('graph').getContext('2d');
            // データ1
            var data1 = {
                label:'今日 (%)',
                data:data[1],
                backgroundColor: "rgba(250, 50, 50, 0.3)",
                borderColor: "rgba(200, 50, 50, 0.3)",
                pointHoverBackgroundColor: "rgba(200, 50, 50, 0.3)",
                pointHoverBorderColor: "rgba(200, 50, 50, 0.3)",
            };

            // ラベル(横軸)
            var label = data[0];

            // データの設定
            var config = {
                type: 'radar', // グラフの種類（レーダーチャートを指定）
                data: { labels: label, datasets: [data1]},


                options: {
                    legend: {
                        position: 'left',
                    },
                    // レスポンシブ指定
                    responsive: true,
                    scale: {
                        pointLabels: {
                            fontSize: 15,
                        },
                        ticks: {
                            stepSize: 10,
                            // 最小値の値を0指定
                            beginAtZero:true,
                            min: 0,
                            // 最大値を指定
                            max: 100,
                        }
                    }
                }
            }

            var myChartGraph = new Chart(ctx, config);

        };

        var data = [['１群', '２群', '３群', '４群', '５群','６群'],
        [<?php echo $today01; ?>, <?php echo $today02; ?>, <?php echo $today03; ?>, <?php echo $today04; ?>, <?php echo $today05; ?>, <?php echo $today06; ?> ]]
        drawGraph(data);
        // window.onload=function () {
        // };
    })

</script>
</body>
</html>
