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
                                <li><a href="#sampleContentB" data-toggle="tab">今週</a></li>
                                <li><a href="#sampleContentC" data-toggle="tab">今月</a></li>
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
                                                <div class="eiyouso_box">
                                                    <p>1群：筋肉や血、骨を作る良質タンパク質の供給源</p>
                                                    <p>2群：骨や歯を丈夫にするカルシウムの供給源</p>
                                                    <p>3群：皮膚や粘膜を保護するカロチンの供給源</p>
                                                    <p>4群：体の機能を調節するビタミンCの供給源</p>
                                                    <p>5群：糖質性のエネルギー源</p>
                                                    <p>6群：脂肪性のエネルギー源</p>

                                                </div>
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
                                    <div class="taishokikan text-right">
                                        <span id="view_week"></span>

                                        <script type="text/javascript">
                                            document.getElementById("view_week").innerHTML = getToday();

                                            function getToday() {

                                                var now = new Date();
                                                var mon = now.getMonth() + 1;
                                                var day = now.getDate();


                                                var startday = now.getDate() - now.getDay();
                                                var endday = now.getDate() + (6 - now.getDay());


                                                if(mon == 1) {
                                                    if(endday > 31) {
                                                        var now = new Date();

                                                        var startday = now.getDate() - now.getDay();
                                                        var s = "1月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay()) - 31;
                                                        var e = "2月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;
                                                    } if(startday < 1 ) {
                                                        var now = new Date();

                                                        var startday = 31 - (now.getDate() - now.getDay());
                                                        var s = "12月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay());
                                                        var e = "1月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;

                                                    }
                                                }
                                                if(mon == 2) {
                                                    if(endday > 28) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = now.getDate() - now.getDay();
                                                        var s = mon + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay()) - 28;
                                                        var e = mon + 1 + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;
                                                    } if(startday < 1 ) {
                                                        var now = new Date();

                                                        var startday = 31 - (now.getDate() - now.getDay());
                                                        var s = "1月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay());
                                                        var e = "2月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;

                                                    }
                                                }
                                                if(mon == 3) {
                                                    if(endday > 31) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = now.getDate() - now.getDay();
                                                        var s = mon + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay()) - 31;
                                                        var e = mon + 1 + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;
                                                    } if(startday < 1 ) {
                                                        var now = new Date();

                                                        var startday = 30 - (now.getDate() - now.getDay());
                                                        var s = "2月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay());
                                                        var e = "3月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;

                                                    }
                                                }
                                                if(mon == 4 || mon == 6 || mon == 9) {
                                                    if(endday > 30) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = now.getDate() - now.getDay();
                                                        var s = mon + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay()) - 30;
                                                        var e = mon + 1 + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;
                                                    } if(startday < 1 ) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = 31 - (now.getDate() - now.getDay());
                                                        var s = mon - 1 + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay());
                                                        var e = mon + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;

                                                    }
                                                }
                                                if(mon == 5 || mon == 7 || mon == 10) {
                                                    if(endday > 31) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = now.getDate() - now.getDay();
                                                        var s = mon + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay()) - 31;
                                                        var e = mon + 1 + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;
                                                    } if(startday < 1 ) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = 30 - (now.getDate() - now.getDay());
                                                        var s = mon - 1 + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay());
                                                        var e = mon + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;

                                                    }
                                                }
                                                if(mon == 8) {
                                                    if(endday > 31) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = now.getDate() - now.getDay();
                                                        var s = mon + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay()) - 31;
                                                        var e = mon + 1 + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;
                                                    } if(startday < 1 ) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = 31 - (now.getDate() - now.getDay());
                                                        var s = mon - 1 + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay());
                                                        var e = mon + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;

                                                    }
                                                }
                                                if(mon == 12) {
                                                    if(endday > 31) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = now.getDate() - now.getDay();
                                                        var s = mon + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay()) - 31;
                                                        var e = mon + 1 + "月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;
                                                    } if(startday < 1 ) {
                                                        var now = new Date();
                                                        var mon = now.getMonth() + 1;

                                                        var startday = 30 - (now.getDate() - now.getDay());
                                                        var s = mon - 1 + "月" + startday + "日 (" + "日" + ")";

                                                        var endday = now.getDate() + (6 - now.getDay());
                                                        var e = "1月" + endday + "日 ("　+ "土" + ")";
                                                        return s + " 〜 " + e;

                                                    }

                                                } else {
                                                    var now = new Date();
                                                    var mon = now.getMonth()+1;
                                                    var day = now.getDate();

                                                    var startday = now.getDate() - now.getDay();
                                                    var s = mon + "月" + startday + "日 (" + "日" + ")";

                                                    var endday = now.getDate() + 6 - now.getDay();
                                                    var e = mon + "月" + endday + "日 ("　+ "土" + ")";
                                                    return s + " 〜 " + e;
                                                }
                                            }

                                        </script>

                                    </div>

                                </div>
                                <div class="tab-pane" id="sampleContentC">
                                    <div class="taishokikan text-right">
                                        <span id="view_month"></span>

                                        <script type="text/javascript">
                                            document.getElementById("view_month").innerHTML = getToday();

                                            function getToday() {
                                                var now = new Date();
                                                var mon = now.getMonth()+1;

                                                var s = mon + "月";
                                                return s;
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
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
    <script>
        var drawGraph = function(data){
            var ctx = document.getElementById('graph').getContext('2d');
          // データ1
            var data1 = {
                label:'今日',
                data:data[1],
                backgroundColor: "rgba(250, 50, 50, 0.3)",
                borderColor: "rgba(200, 50, 50, 0.3)",
                pointHoverBackgroundColor: "rgba(200, 50, 50, 0.3)",
                pointHoverBorderColor: "rgba(200, 50, 50, 0.3)",
            };
          // データ2
            var data2 = {
                label:'昨日',
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
                            // 最小値の値を0指定
                            beginAtZero:true,
                            min: 0,
                            // 最大値を指定
                            max: 100,
                        }
                    }
                }
            }

          var myChart = new Chart(ctx, config);

        };

        window.onload=function () {
            var data = [['１群', '２群', '３群', '４群', '５群','６群'],
                        [22, 23, 21, 20, 19, 11],
                        [25, 23, 50, 23, 22, 0]]
            drawGraph(data);
        };
    </script>
</body>
</html>
