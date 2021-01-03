<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP|k-instagram</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>style/css/kinsta_style.css">

</head>

<body>
    <header>
        <div class="header-in">
            <img src="<?php echo base_url(); ?>img/kinstalogo.png" height="80" width="300">
        </div>
    </header>
    <div class="kinsta-top">
        <div class="top-icon">
            <img src="<?php echo base_url(); ?>img/muscle.png">
        </div>
        <div class="top-explanation">
            <div class="top-since">
                <p>SINCE 2020</p>
                <b>ALL is an<br>Expert</b>
            </div>
            <div class="top-life">
                <p>Life with muscle training</p>
            </div>
        </div>
        <div class="top-form">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                新規会員登録はこちらから
            </button>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                すでに会員登録済みの方はこちら
            </button>
        </div>
        <div class="top-support">
            <a href="#">利用規約</a>
            <a href="#">ガイドライン</a>
            <a href="#">個人情報保護方針</a>
            <a href="#">サポート<a>
        </div>
    </div>

    <div class="introduction123">
        <div class="introduction1">
            <div class="intro-text">
                <b>写真を投稿しよう</b>
                <p>日々のあなたのトレーニングを、写真で投稿してみましょう。<br>
                    ​自分のトレーニングが結果として残るので、モチベーションアップ間違いなしです！
                    ​</p>
            </div>
        </div>
        <div class="introduction2">
            <div class="intro-text">
                <b>筋トレ仲間を見つけよう！</b>
                <p>気になったユーザーや、気に入った写真をお気に入り登録しましょう。<br>
                    ​また、コメント機能を使ってコミュニケーションをとってみましょう。
                    ​</p>
            </div>
        </div>
        <div class="introduction3">
            <div class="intro-text">
                <b>新たなトレーニングを取り入れよう</b>
                <p>筋トレ仲間たちは、それぞれ違ったトレーニングをしているはずです。<br>
                    ​ぜひ、トレーニング内容を共有して、様々なトレーニングに挑戦してみてください！</p>
            </div>
        </div>
    </div>

    <div class="selection">
        <div class="select1">
            <div class="select-text">
                <p>Let's Train together</p>
            </div>
            <div class="select-registration">
                <button type="button" class="btn2 btn-primary" data-toggle="modal" data-target="#exampleModal1">
                    新規会員登録はこちらから
                </button>
            </div>
        </div>
        <div class="select2">
            <div class="select-text">
                <p>Enjoy muscle training</p>
            </div>
            <div class="select-login">
                <button type="button" class="btn2 btn-primary" data-toggle="modal" data-target="#exampleModal2">
                    会員登録済みの方はこちら
                </button>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-menu">
            <p>アクセス</p>
            <a href="#">トップ</a>
            <a href="#">新着</a>
            <a href="#">マイページ</a><br>
            <a href="#">ランキング</a>
            <a href="#">お気に入り</a><br>
            <a href="#">セレクト</a>
            <a href="#">投稿する</a>
        </div>
        <div class="footer-menu">
            <p>information</p>
            <a href="#">ニュース</a>
            <a href="#">Q&A</a>
            <a href="#">お問い合わせ</a>
        </div>
        <div class="footer-menu">
            <p>k-instagram　公式</p>
            <a href="#">公式Twitterアカウント</a>
            <a href="#">公式Facebookアカウント</a>
        </div>
    </footer>

    <!-- Modal -->
    <form action="#" method="POST">
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">新規会員登録</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="mail" placeholder="メールアドレス">
                        <input type="text" name="mail" placeholder="電話番号">
                        <input type="text" name="mail" placeholder="ユーザ名">
                        <input type="text" name="mail" placeholder="パスワード">
                        <input type="text" name="mail" placeholder="パスワード確認">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-primary">送信する</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">K-instagramログイン</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="mail" placeholder="メールアドレス">
                        <input type="text" name="mail" placeholder="パスワード">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-primary">ログイン</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
