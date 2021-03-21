<!DOCTYPE html>
<html id="bodyScroll" lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/style/css/top_style.css">
    <link rel="stylesheet" href="/style/css/individual_img.css">
    <title>Kinstagram</title>
    <?php $this->load->view('/common/header'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header class="header_font_border">
        <li class="titleLogo">
            <form method="post" action="/kinsta/top" name="topButton"><a href="javascript:document.topButton.submit()" class="titleLogoReroad">Kinstagram</a></form>
        </li>
        <li class="sub_title">筋肉達との出会いがここに・・・</li>
        <li class="search_window">
            <input id="keyword" type="text" value="" name="serchText" class="window_color" placeholder="検索" autocomplete="off">
        </li>
        <div id="serchResult" aria-hidden="true" class="serchBox hiddenSerch"></div>

        <li class="uploadup">
            <a href="javascript:document.pcUploadButton.submit()" data-toggle="modal" data-target="#postModal">
                <span class="material-icons">cloud_upload</span>
            </a>
            <form action="/kinsta/add" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content  border border-gray">
                            <div class="modal-header bg-black">
                                <h5 class="modal-title bg-black" id="postModalLabel">New post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-black">
                                <!-- 参考URLhttps://blog.ver001.com/javascript_preview_canvas/ -->
                                <canvas id="preview" style="max-width:200px;"></canvas>
                                <?php
                                if (isset($error)) {
                                    echo $error;
                                }
                                ?>
                                <input name="list_image" type="file" accept='image/*' onchange="previewImage(this);">

                                <div class="form-group">
                                    <labelclass="control-label">メッセージ</label>
                                        <textarea name="post_message" class="form-control bg-gray" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">マイメニュー</label>
                                    <input name="mymenu" class="form-control bg-gray" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">マイトレーニング</label>
                                    <input name="mytraining" class="form-control bg-gray" type="text">
                                </div>
                            </div>
                            <div class="modal-footer bg-black">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                <button type="submit" class="btn new-primary">投稿</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </li>
        <li class="login">
            <form method="get" action="/kinsta/logout">
                <input type="submit" class="btn-square-shadow" value="ログアウト">
            </form>
        </li>
        <li class="mypage">
            <form method="get" action="/kinsta/mypage">
                <input type="submit" class="btn-square-shadow" value="マイページ">
            </form>
        </li>
        <div class="hambarger">
            <li class="menuIcon">
                <input id="menu" type="checkbox">
                <label for="menu" class="open"><span class="material-icons">dehaze</span></label>
                <label for="menu" class="back"></label>
                <nav class="hambargerNav">
                    <ul class="hambargerUl">
                        <li><a href="/kinsta/mypage" class="textNone">マイページ</a></li>
                        <li><a href="/kinsta/post" class="textNone">アップロード</a></li>
                        <li><a href="/kinsta/login" class="textNone">ログイン</a></li>
                        <li><a href="/kinsta/logout" class="textNone">ログアウト</a></li>
                        <li class="cancelButton"><label for="menu" class="close">×</label></li>
                    </ul>
                </nav>
            </li>
        </div>



    </header>

    <hr class="header_border">



    <nav class="underNav">
        <ul class="underTab" id="underTab2">
            <li class="new">
                <div class="centerLine">
                    <a href="/kinsta/top" class="a_new">新&nbsp;着</a>
                </div>
            </li>
            <div class="accordion">
                <li class="menu js-menu">
                    <div class="centerLine">
                        <span class="rankCenter">ランキング</span>
                    </div>
                </li>
                <div class="contents">
                    <form method="get" action="/kinsta/rank" name="totalRankButton"><a href="javascript:document.totalRankButton.submit()">総合ランキング</a></form>
                </div>
                <div class="contents detailMenu ">部位ランキング</div>
                <ul class="detailContentsList">
                    <li class="detailContents">
                        <form method="get" action="/kinsta/armRank" name="armRankButton"><a href="javascript:document.armRankButton.submit()">腕筋</a></form>
                    </li>
                    <li class="detailContents">
                        <form method="get" action="/kinsta/shoulderRank" name="shoulderRankButton"><a href="javascript:document.shoulderRankButton.submit()">肩筋</a></form>
                    </li>
                    <li class="detailContents">
                        <form method="get" action="/kinsta/breastRank" name="breastRankButton"><a href="javascript:document.breastRankButton.submit()">胸筋</a></form>
                    </li>
                    <li class="detailContents">
                        <form method="get" action="/kinsta/absRank" name="absRankButton"><a href="javascript:document.absRankButton.submit()">腹筋</a></form>
                    </li>
                    <li class="detailContents">
                        <form method="get" action="/kinsta/footRank" name="footRankButton"><a href="javascript:document.footRankButton.submit()">足筋</a></form>
                    </li>
                </ul>
            </div>
            <li class="select">
                <div class="centerLine"><a href="#" class="a_select">セレクト</a></div>
            </li>
            <li class="newFollow500">
                <a class="aNewFollow500">
                    <input type="checkbox" id="followUnder">
                    <label for="followUnder" class="openUnderFollow">トレーニー１０選</label>
                    <label for="followUnder" class="closeUnderFollow"></label>
                    <nav class="followUnderNav">
                        <ul class="ul500">
                            <?php if (!empty($ten_data)) : ?>
                                <?php foreach ($ten_data as $value) : ?>
                                    <li class="followMember1">
                                        <div class="iconDiv5001"><img class="icon5001" src="/img/<?php echo $value["profile_image"] ?>">
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"><?php echo $value["user_name"] ?></li>
                                                <li class="followerNumber">マッスルメンバー数
                                                    <?php if (!empty($value["follower_number"])) : ?>
                                                        <?php echo $value["follower_number"] . '人' ?></li>
                                            <?php else : ?>
                                                <?php echo '0人' ?>
                                    </li>
                                <?php endif; ?>
                        </ul>
                        </div>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
        </ul>
    </nav>
    </a>
    </li>
    </ul>
    </nav>
    <div class="divMainAsaid">
        <main id="mainPicture">
            <!-- <ul class="scroll" data-max="29" data-lastnum="9"> -->

            <ul class="scroll">
                <?php if (!empty($all_posts)) : ?>
                    <?php foreach ($all_posts as $value) : ?>
                        <li class="sizePicture">
                            <img class="listImage allPhotos" src="/img/<?php echo $value["list_image"] ?>" data-toggle="modal" data-target="#individualModal">
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

        </main>
        <aside class="asideToreni asideToreni2">
            <ul class="asideUl">
                <li class="followToreni">おすすめトレーニー</li>
                <hr class="follow_border">
                <?php $i = 0; ?>
                <?php if (!empty($five_data)) : ?>
                    <?php foreach ($five_data as $value) : ?>
                        <li class="asideIcon">
                            <a href="/kinsta/onlyMypage?userId=<?php echo $value['user_id']; ?>" class="icon">
                                <img src="/img/<?php echo $value["profile_image"] ?>" alt="" class="recommended">
                            </a>
                        </li>
                        <li class="name">
                            <div>
                                <a href="/kinsta/onlyMypage?userId=<?php echo $value['user_id']; ?>" class="a_name"><?php echo $value["user_name"] ?></a>
                                <a href="#" class="addMassuleMember" id="openMember<?php echo $i ?>" data-myid="<?php echo $login_userid[0]['user_id'] ?>" data-value="<?php echo $value['user_id'] ?>">マッスルメンバーに追加</a>
                            </div>
                            <section id="modalMember1" class="hidden">
                                <ul class="memberPostFollowPicture">
                                    <p><?php echo $value["user_name"] ?></p>
                                    <p>投稿10件</p>
                                    <p>マッスルメンバー10人</p>
                                    <p>写真</p>
                                    <p>マッスルメンバーに追加</p>
                                </ul>
                            </section>
                        </li>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                <?php endif; ?>


                <hr class="other_border">
                <li class="otherMember">
                    <a href="#" class="aOtherMember" id="otherMemberChange">その他のメンバーを見る</a>
                </li>
            </ul>
        </aside>
    </div>

<!-- 個別ページ用のモーダル -->
<form action="/Kinsta/individual_top" method="get">
        <div class="modal fade" id="individualModal" tabindex="-1" role="dialog" aria-labelledby="individualModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-max" role="document">
                <div class="modal-content border border-gray">
                    <div class="modal-header bg-black">
                        <?php foreach ($array_user as $value) : ?>
                            <img src="/img/142136.png">
                            <h5 class="modal-title bg-black" id="individualModalLabel">
                                <?php echo $value['user_name']; ?>
                            </h5>
                        <?php endforeach; ?>

                        <input type="button" id="follow" class="btn-gradient-radius" value="フォローする" onclick="change()">
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-black">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                <!-- JSでsrcのurlがセットされる -->
                                    <img id="list-img" class='list-img' src="" alt="1">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php foreach ($array_post as $value2) : ?>
                                            <label class="control-label">メッセージ</label>
                                            <textarea class="form-control bg-gray" type="text" cols="30" rows="5" readonly><?php echo $value2['post_message']; ?></textarea>

                                            <label class="control-label">マイメニュー</label>
                                            <input class="form-control bg-gray" type="text" value="<?php echo $value2['mymenu']; ?>" readonly>

                                            <label class="control-label">マイトレーニング</label>
                                            <input class="form-control bg-gray" type="text" value="<?php echo $value2['mytraining']; ?>" readonly>
                                        <?php endforeach; ?>

                                        <!-- いいねボタン -->
                                        <div class="good-btn-container">
                                            <div class="good-btn-icon">
                                                <image src="/img/button/ude.png" alt="腕">
                                                    <div class="good-btn-text">腕キレてるね</div>
                                                    <div class="iframe">
                                                        <iframe src="/iine/iine1.html" class="iineiframe"></iframe>
                                                    </div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/mune.jpg" alt="胸">
                                                <div class="good-btn-text">胸キレてるね</div>
                                                <div class="iframe">
                                                    <iframe src="/iine/iine2.html" class="iineiframe"></iframe>
                                                </div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/kata.png" alt="肩">
                                                <div class="good-btn-text">肩キレてるね</div>
                                                <div class="iframe">
                                                    <iframe src="/iine/iine3.html" class="iineiframe"></iframe>
                                                </div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/hara.png" alt="腹">
                                                <div class="good-btn-text">腹キレてるね</div>
                                                <div class="iframe">
                                                    <iframe src="/iine/iine4.html" class="iineiframe"></iframe>
                                                </div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/ashi.png" alt="足">
                                                <div class="good-btn-text">足キレてるね</div>
                                                <div class="iframe">
                                                    <iframe src="/iine/iine5.html" class="iineiframe"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 写真モーダル -->
    </form>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo ("/style/js/toppage.js"); ?>"></script>
    <script>
    // クリックで”フォロー”と”フォローする”のテキストが入れ替わる
        document.getElementById("follow").addEventListener(
            "click",
            function(event) {
                if (event.target.value === "フォロー中") {
                    event.target.value = "フォローする";
                } else {
                    event.target.value = "フォロー中";
                }
            },
            false
        );

        //投稿用のモーダル
        function previewImage(obj) {
            var fileReader = new FileReader();
            fileReader.onload = (function() {
                var canvas = document.getElementById('preview');
                var ctx = canvas.getContext('2d');
                var image = new Image();
                image.src = fileReader.result;
                image.onload = (function() {
                    canvas.width = image.width;
                    canvas.height = image.height;
                    ctx.drawImage(image, 0, 0);
                });
            });
            fileReader.readAsDataURL(obj.files[0]);
        }

        //一覧画像をクリックするとモーダル表示
        //https://stackoverflow.com/questions/26377231/jquery-how-to-change-img-src-path-onclick
        $('.listImage').on('click', function() {
            $('#list-img').prop('src', this.src);
        });
    </script>
    <script src="/iine_app/iine.js"></script>
</body>
</html>