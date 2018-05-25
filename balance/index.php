<?php
    session_start();
    $informations_id = $_SESSION['id'];

    require_once dirname(__FILE__) .'./../data/require.php';

    // データベース接続のクラス
    $conn = new DbConn();




    $conn->fetch($sql);


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
    $sql .= ' WHERE DATE(eat_at)  = DATE(now()) && informations_id = '.'"'.$informations_id.'"';
    $sql .= ' GROUP BY foods.number ';
    $sql .= ' ) AS T1';

    $foods = $conn->fetch($sql);
    $consumed = $conn->fetch($sql);
    $pantrys = $conn->fetch($sql);

    foreach ($foods as $val) {
        $today01 = $val['cnt1'] / 5 * 100;
        $today02 = $val['cnt2'] / 3 * 100;
        $today03 = $val['cnt3'] / 5 * 100;
        $today04 = $val['cnt4'] / 7 * 100;
        $today05 = $val['cnt5'] / 4 * 100;
        $today06 = $val['cnt6'] / 3 * 100;
    };





    $sql  = 'SELECT ';
    $sql .= ' COUNT(CASE WHEN T2.nutrients=1 THEN 1  END) as ycnt1,';
    $sql .= ' COUNT(CASE WHEN T2.nutrients=2 THEN 1  END) as ycnt2,';
    $sql .= ' COUNT(CASE WHEN T2.nutrients=3 THEN 1  END) as ycnt3,';
    $sql .= ' COUNT(CASE WHEN T2.nutrients=4 THEN 1  END) as ycnt4,';
    $sql .= ' COUNT(CASE WHEN T2.nutrients=5 THEN 1  END) as ycnt5,';
    $sql .= ' COUNT(CASE WHEN T2.nutrients=6 THEN 1  END) as ycnt6';
    $sql .= ' FROM ( ';
    $sql .= ' SELECT foods_name,nutrients,eat_at,informations_id  ';
    $sql .= ' FROM foods ';
    $sql .= ' INNER JOIN pantrys ON foods.id = pantrys.foods_id ';
    $sql .= ' INNER JOIN consumed ON pantrys.id = consumed.pantrys_id ' ;
    $sql .= ' WHERE DATE(eat_at)  = DATE(now()) - 1 && informations_id = '.'"'.$informations_id.'"';
    $sql .= ' GROUP BY foods.number ';
    $sql .= ' ) AS T2';

    $foods = $conn->fetch($sql);
    $consumed = $conn->fetch($sql);
    $pantrys = $conn->fetch($sql);
    $informations = $conn->fetch($sql);

// var_dump($sql);


    foreach ($foods as $val) {
        $yesterday01 = $val['ycnt1'] / 5 * 100;
        $yesterday02 = $val['ycnt2'] / 3 * 100;
        $yesterday03 = $val['ycnt3'] / 5 * 100;
        $yesterday04 = $val['ycnt4'] / 7 * 100;
        $yesterday05 = $val['ycnt5'] / 4 * 100;
        $yesterday06 = $val['ycnt6'] / 3 * 100;
    };

    $sql  = 'SELECT ';
    $sql .= ' COUNT(CASE WHEN T3.nutrients=1 THEN 1  END) as wcnt1,';
    $sql .= ' COUNT(CASE WHEN T3.nutrients=2 THEN 1  END) as wcnt2,';
    $sql .= ' COUNT(CASE WHEN T3.nutrients=3 THEN 1  END) as wcnt3,';
    $sql .= ' COUNT(CASE WHEN T3.nutrients=4 THEN 1  END) as wcnt4,';
    $sql .= ' COUNT(CASE WHEN T3.nutrients=5 THEN 1  END) as wcnt5,';
    $sql .= ' COUNT(CASE WHEN T3.nutrients=6 THEN 1  END) as wcnt6';
    $sql .= ' FROM ( ';
    $sql .= ' SELECT foods_name,nutrients,eat_at,informations_id ';
    $sql .= ' FROM foods ';
    $sql .= ' INNER JOIN pantrys ON foods.id = pantrys.foods_id ';
    $sql .= ' INNER JOIN consumed ON pantrys.id = consumed.pantrys_id ';
    $sql .= ' WHERE DATE(eat_at)  BETWEEN (DATE(now()) - INTERVAL 6 DAY) AND DATE(now()) && informations_id = '.'"'.$informations_id.'"';
    $sql .= ' ) AS T3';

    $foods = $conn->fetch($sql);
    $consumed = $conn->fetch($sql);
    $pantrys = $conn->fetch($sql);
    $informations = $conn->fetch($sql);


    foreach ($foods as $val) {
        $week01 = ($val['wcnt1'] / 7) / 5 * 100;
        $week02 = ($val['wcnt2'] / 7) / 3 * 100;
        $week03 = ($val['wcnt3'] / 7) / 5 * 100;
        $week04 = ($val['wcnt4'] / 7) / 7 * 100;
        $week05 = ($val['wcnt5'] / 7) / 4 * 100;
        $week06 = ($val['wcnt6'] / 7) / 3 * 100;
    };






    $sql  = 'SELECT ';
    $sql .= ' COUNT(CASE WHEN T4.nutrients=1 THEN 1  END) as mcnt1,';
    $sql .= ' COUNT(CASE WHEN T4.nutrients=2 THEN 1  END) as mcnt2,';
    $sql .= ' COUNT(CASE WHEN T4.nutrients=3 THEN 1  END) as mcnt3,';
    $sql .= ' COUNT(CASE WHEN T4.nutrients=4 THEN 1  END) as mcnt4,';
    $sql .= ' COUNT(CASE WHEN T4.nutrients=5 THEN 1  END) as mcnt5,';
    $sql .= ' COUNT(CASE WHEN T4.nutrients=6 THEN 1  END) as mcnt6';
    $sql .= ' FROM ( ';
    $sql .= ' SELECT foods_name,nutrients,eat_at,informations_id ';
    $sql .= ' FROM foods ';
    $sql .= ' INNER JOIN pantrys ON foods.id = pantrys.foods_id ';
    $sql .= ' INNER JOIN consumed ON pantrys.id = consumed.pantrys_id ';
    $sql .= ' WHERE DATE(eat_at)  BETWEEN (DATE(now()) - INTERVAL 29 DAY) AND DATE(now()) && informations_id = '.'"'.$informations_id.'"';
    $sql .= ' ) AS T4';

    $foods = $conn->fetch($sql);
    $consumed = $conn->fetch($sql);
    $pantrys = $conn->fetch($sql);
    $informations = $conn->fetch($sql);

    // var_dump($sql);

    foreach ($foods as $val) {
        $month01 = ($val['mcnt1'] / 30) / 5 * 100;
        $month02 = ($val['mcnt2'] / 30) / 3 * 100;
        $month03 = ($val['mcnt3'] / 30) / 5 * 100;
        $month04 = ($val['mcnt4'] / 30) / 7 * 100;
        $month05 = ($val['mcnt5'] / 30) / 4 * 100;
        $month06 = ($val['mcnt6'] / 30) / 3 * 100;
    };

// var_dump($sql);
    // var_dump($informations_id);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>栄養バランス | そして空になった</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=2.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="./../assets/css/common.css" rel="stylesheet" media="all">
    <link href="./../assets/css/balance.css" rel="stylesheet" media="all">
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

        <main>
            <section class="blance">
                <h1 class="pl_10">栄養バランス表</h1>
                <div class="container">
                    <div class="kikna row">
                        <div class="kikan_celect">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#sampleContentA" data-toggle="tab">今日</a></li>
                                <li><a href="#sampleContentB" data-toggle="tab">7日間</a></li>
                                <li><a href="#sampleContentC" data-toggle="tab">30日間</a></li>
                            </ul>

                            <!-- タブ内容 -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="sampleContentA">

                                    <div class="taishokikan text-right">
                                        <span id="view_today"></span>
                                    </div>
                                    <div class="intab">
                                        <div class="row">
                                            <div class="chart col-sm-8">
                                                <canvas id="graph" width="300px" height="300px"></canvas>
                                            </div>
                                            <div class="eiyouso col-sm-4">
                                                <h5>1群</h5>
                                                <p class="eiyounaiyou">筋肉や血、骨を作る良質タンパク質の供給源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">５品目</span></p>
                                                <h5>2群</h5>
                                                <p class="eiyounaiyou">骨や歯を丈夫にするカルシウムの供給源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">３品目</span></p>
                                                <h5>3群</h5>
                                                <p class="eiyounaiyou">皮膚や粘膜を保護するカロチンの供給</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">５品目</span></p>
                                                <h5>4群</h5>
                                                <p class="eiyounaiyou">体の機能を調節するビタミンCの供給</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">７品目</span></p>
                                                <h5>5群</h5>
                                                <p class="eiyounaiyou">糖質性のエネルギー源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">４品目</span></p>
                                                <h5>6群</h5>
                                                <p class="eiyounaiyou">脂肪性のエネルギー源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">３品目</span></p>
                                            </div>
                                        </div>
                                    </div>
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




                                <div class="tab-pane" id="sampleContentB">

                                    <div class="intab">
                                        <div class="row">
                                            <div class="taishokikan text-right">
                                                <span id="view_week"></span>
                                            </div>
                                            <div class="chart col-sm-8">
                                                <canvas id="week" width="300px" height="300px"></canvas>
                                            </div>
                                            <div class="eiyouso col-sm-4">
                                                <h5>1群</h5>
                                                <p class="eiyounaiyou">筋肉や血、骨を作る良質タンパク質の供給源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">５品目</span></p>
                                                <h5>2群</h5>
                                                <p class="eiyounaiyou">骨や歯を丈夫にするカルシウムの供給源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">３品目</span></p>
                                                <h5>3群</h5>
                                                <p class="eiyounaiyou">皮膚や粘膜を保護するカロチンの供給</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">５品目</span></p>
                                                <h5>4群</h5>
                                                <p class="eiyounaiyou">体の機能を調節するビタミンCの供給</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">７品目</span></p>
                                                <h5>5群</h5>
                                                <p class="eiyounaiyou">糖質性のエネルギー源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">４品目</span></p>
                                                <h5>6群</h5>
                                                <p class="eiyounaiyou">脂肪性のエネルギー源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">３品目</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                        <script type="text/javascript">
                                            document.getElementById("view_week").innerHTML = getToday();

                                            function getToday() {

                                                var now = new Date();
                                                var mon = now.getMonth() + 1;
                                                var day = now.getDate();

                                                var endday = now.getDate() - 6;

                                                if(endday < 0) {
                                                    if(mon == 1) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 31 + (now.getDate() - 6);
                                                        var e = "12月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                    }
                                                    if(mon == 2) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 31 + (now.getDate() - 6);
                                                        var e = "1月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                        }
                                                    if(mon == 3) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 28 + (now.getDate() - 6);
                                                        var e = mon - 1 + "月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                    }
                                                    if(mon == 4 || mon == 6 ||  mon == 8 || mon == 9) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 31 + (now.getDate() - 6);
                                                        var e = mon  + "月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                    }
                                                    if(mon == 5 || mon == 7 || mon == 10 || mon == 12) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 30 + (now.getDate() - 6);
                                                        var e = mon - 1 + "月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                    }
                                                }
                                                else {
                                                    var now = new Date();
                                                    var mon = now.getMonth() + 1;
                                                    var day = now.getDate();

                                                    var s = mon + "月" + day + "日";
                                                    var endday = now.getDate() - 6;
                                                    var e = mon + "月" + endday + "日";
                                                    return e + " 〜 " + s;

                                                }
                                            }
                                        </script>



                                <div class="tab-pane" id="sampleContentC">
                                    <div class="intab">
                                        <div class="row">
                                            <div class="taishokikan text-right">
                                                <span id="view_month"></span>
                                            </div>
                                            <div class="chart col-sm-8">
                                                <canvas id="month" width="300px" height="300px"></canvas>
                                            </div>
                                            <div class="eiyouso col-sm-4">
                                                <h5>1群</h5>
                                                <p class="eiyounaiyou">筋肉や血、骨を作る良質タンパク質の供給源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">５品目</span></p>
                                                <h5>2群</h5>
                                                <p class="eiyounaiyou">骨や歯を丈夫にするカルシウムの供給源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">３品目</span></p>
                                                <h5>3群</h5>
                                                <p class="eiyounaiyou">皮膚や粘膜を保護するカロチンの供給</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">５品目</span></p>
                                                <h5>4群</h5>
                                                <p class="eiyounaiyou">体の機能を調節するビタミンCの供給</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">７品目</span></p>
                                                <h5>5群</h5>
                                                <p class="eiyounaiyou">糖質性のエネルギー源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">４品目</span></p>
                                                <h5>6群</h5>
                                                <p class="eiyounaiyou">脂肪性のエネルギー源</p>
                                                <p class="meyasu">1日の目安&nbsp;<span class="num">３品目</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                        <script type="text/javascript">
                                            document.getElementById("view_month").innerHTML = getToday();

                                            function getToday() {

                                                var now = new Date();
                                                var mon = now.getMonth() + 1;
                                                var day = now.getDate();

                                                var endday = now.getDate() - 29;

                                                if(endday < 0) {
                                                    if(mon == 1) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 31 + (now.getDate() - 29);
                                                        var e = "12月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                    }
                                                    if(mon == 2) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 31 + (now.getDate() - 29);
                                                        var e = "1月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                        }
                                                    if(mon == 3) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 28 + (now.getDate() - 29);
                                                        var e = mon - 1 + "月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                    }
                                                    if(mon == 4 || mon == 6 ||  mon == 8 || mon == 9) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 31 + (now.getDate() - 29);
                                                        var e = mon  + "月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                    }
                                                    if(mon == 5 || mon == 7 || mon == 10 || mon == 12) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;
                                                        var day = now.getDate();

                                                        var s = mon + "月" + day + "日";
                                                        var endday = 30 + (now.getDate() - 29);
                                                        var e = mon - 1 + "月" + endday + "日";
                                                        return e + " 〜 " + s;
                                                    }
                                                }
                                                else {
                                                    var now = new Date();
                                                    var mon = now.getMonth() + 1;
                                                    var day = now.getDate();

                                                    var s = mon + "月" + day + "日";
                                                    var endday = now.getDate() - 29;
                                                    var e = mon + "月" + endday + "日";
                                                    return e + " 〜 " + s;

                                                }
                                            }
                                        </script>
                            </div>
                        </div>


                </div>

            </section>
        </main>

        <footer class="text-center bg_orange">
            <p>©️Pistachio, Inc.</p>
        </footer>
    </div>

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
          // データ2
            var data2 = {
                label:'昨日 (%)',
                data:data[2],
                backgroundColor: "rgba(50, 50, 250, 0.3)",
                borderColor: "rgba(50, 50, 200, 0.3)",
                pointHoverBackgroundColor: "rgba(50, 50, 200, 0.3)",
                pointHoverBorderColor: "rgba(50, 50, 200, 0.3)",
            }
          // ラベル(横軸)
            var label = data[0];

          // データの設定
            var config = {
                type: 'radar', // グラフの種類（レーダーチャートを指定）
                data: { labels: label, datasets: [data1, data2]},


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
                    [<?php echo $today01; ?>, <?php echo $today02; ?>, <?php echo $today03; ?>, <?php echo $today04; ?>, <?php echo $today05; ?>, <?php echo $today06; ?> ],
                    [<?php echo $yesterday01; ?>, <?php echo $yesterday02; ?>, <?php echo $yesterday03; ?>, <?php echo $yesterday04; ?>, <?php echo $yesterday05; ?>, <?php echo $yesterday06; ?> ]]
        drawGraph(data);
        // window.onload=function () {
        // };
    })

    </script>

    <!-- 週 -->
    <script>
    $(function(){
            var drawWeek = function(data){
            var ctx = document.getElementById('week').getContext('2d');
          // データ1
            var data1 = {
                label:'1日あたり (%)',
                data:data[1],
                backgroundColor: "rgba(250, 50, 50, 0.3)",
                borderColor: "rgba(200, 50, 50, 0.3)",
                pointHoverBackgroundColor: "rgba(200, 50, 50, 0.3)",
                pointHoverBorderColor: "rgba(200, 50, 50, 0.3)",
            }
          // ラベル(横軸)
            var label = data[0];

          // データの設定
            var config = {
                type: 'radar', // グラフの種類（レーダーチャートを指定）
                data: { labels: label, datasets: [data1] },


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

          var myChartWeek = new Chart(ctx, config);

        };

        var data = [['１群', '２群', '３群', '４群', '５群','６群'],
                    [<?php echo $week01; ?>, <?php echo $week02; ?>, <?php echo $week03; ?>, <?php echo $week04; ?>, <?php echo $week05; ?>, <?php echo $week06; ?> ]]
        drawWeek(data);
        // window.onload=function () {
        // };
    });


    </script>

    <!-- 月 -->
    <script>
    $(function(){
              var drawMonth = function(data){
            var ctx = document.getElementById('month').getContext('2d');
          // データ1
            var data1 = {
                label:'1日あたり (%)',
                data:data[1],
                backgroundColor: "rgba(250, 50, 50, 0.3)",
                borderColor: "rgba(200, 50, 50, 0.3)",
                pointHoverBackgroundColor: "rgba(200, 50, 50, 0.3)",
                pointHoverBorderColor: "rgba(200, 50, 50, 0.3)",
            }
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

          var myChartMonth = new Chart(ctx, config);

        };

        var data = [['１群', '２群', '３群', '４群', '５群','６群'],
                    [<?php echo $month01; ?>, <?php echo $month02; ?>, <?php echo $month03; ?>, <?php echo $month04; ?>, <?php echo $month05; ?>, <?php echo $month06; ?> ]]
        drawMonth(data);
        // window.onload=function () {
        // };
    });


    </script>

</body>
</html>
