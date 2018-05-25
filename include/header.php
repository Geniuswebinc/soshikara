<header>
    <div class="row top-header">
        <div class="col-xs-6 top-img text-left">
            <img src="./../assets/images/logo.png" width="250">
        </div>
        <div class="col-xs-6 top-login text-right">
            <a href="">お問い合わせはこちら</a>


                <p class="msg">ログイン中 <?php echo $login_name;?>さん</p>
                <form name="Logout" method="post" action="./../login/logout.php">
                    <input type="submit" value="Logout" class="btn btn-success btn-sm">
                </form>

        </div>
    </div>

    <div class="row mt_10">
        <ul class="nav nav-justified bg_orange">
            <li role="presentation" class="active"><a href="./../top/">HOME</a></li>
            <li role="presentation"><a href="./../pantry/">登録・一覧</a></li>
            <li role="presentation"><a href="./../balance">栄養バランス</a></li>
            <li role="presentation"><a href="./../shun/">旬の食材</a></li>
            <li role="presentation"><a href="#">キャラクター</a></li>
        </ul>
    </div>
</header>
