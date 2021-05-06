<!-- 背景など全ページに共有するcssやBootstrapを使用する場合は以下のコード記述 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinstagram|mypage</title>
    <?php $this->load->view('/common/header'); ?>
    <link rel="stylesheet" href="/style/css/mypage.css">
    <link rel="stylesheet" href="/style/css/mypage_responsive.css">
    <link rel="stylesheet" href="/style/css/individual_img.css">
    <link rel="stylesheet" href="/style/css/header_mypage.css">
    <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/iine_app/iine.css">
</head>


<body class="body">
    <header class="header_font_border">
        <li class="titleLogo">
            <form method="post" action="/kinsta/top" name="topButton">
                <a href="javascript:document.topButton.submit()" class="titleLogoReroad">Kinstagram</a>
            </form>
        </li>
        <li class="sub_title">筋肉達との出会いがここに・・・</li>
        <li class="search_window"><input type="text" class="window_color" placeholder="検索"></li>
        <li class="uploadup">
            <a href="javascript:document.pcUploadButton.submit()" data-toggle="modal" data-target="#postModal">
                <span class="material-icons">cloud_upload</span>
            </a>
            <!-- 投稿Modal -->
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
                                <canvas id="previewPost" style="max-width:200px;"></canvas>
                                <?php
                                if (isset($error)) {
                                    echo $error;
                                }
                                ?>
                                <input name="list_image" type="file" accept='image/*' onchange="previewPostImage(this);">

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
            <!-- Modal -->
        </li>

        <li class="login">
            <form method="get" action="/kinsta/logout">
                <input type="submit" class="btn-square-shadow" value="ログアウト">
            </form>
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
                        <li>
                            <form method="get" action="/kinsta/mypage" name="mypageButton"><a href="javascript:document.mypageButton.submit()" class="textNone">マイページ</a></form>
                        </li>
                        <li>
                            <form method="get" action="/kinsta/post" name="uploadButton"><a href="javascript:document.uploadButton.submit()" class="textNone">アップロード</a></form>
                        </li>
                        <li>
                            <form method="get" action="/kinsta/login" name="loginButton"><a href="javascript:document.loginButton.submit()" class="textNone">ログイン</a></form>
                        </li>
                        <li>
                            <form method="get" action="/kinsta/logout" name="logoutButton"><a href="javascript:document.logoutButton.submit()" class="textNone">ログアウト</a></form>
                        </li>
                        <li class="cancelButton"><label for="menu" class="close">×</label></li>
                    </ul>
                </nav>
            </li>
        </div>
    </header>
    <!-- ヘッダーここまで -->
        <div class="profile">
            <div class="profile-inline">
                <div class="profile-img">
                    <img src="/img/<?php echo $myData[0]['profile_image']?>">
                </div>
                <div>
                    <p class="user_name text-center" name="user_name">
                        <?php echo $myData[0]['user_name']; ?>
                    </p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn new-primary" name="profile_image" data-toggle="modal" data-target="#exampleModal">
                        プロフィール編集
                    </button>
                </div>
            </div>
        </div>
    <!-- マイページ編集用のModal -->
    <form action="/Kinsta/mypage_update" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                        <div class="modal-content bg-black">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">プロフィール編集</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">アイコン画像</label>
                                    <canvas id="previewMypage" style="max-width:200px;"></canvas>
                                    <?php
                                    if (isset($error)) {
                                        echo $error;
                                    }
                                    ?>
                                    <input name="profile_image" type="file" accept='image/*' onchange="previewMypageImage(this);">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">ユーザーネーム</label>
                                    <?php echo form_error('username'); ?>
                                    <input name="user_name" class="form-control  bg-gray" type="text" value="<?php echo $myData[0]['user_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">自己紹介</label>
                                    <input name="introduction" class="form-control  bg-gray" type="text" value="<?php echo $myData[0]['introduction']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">マッチョ区分</label>
                                    <div class="radio">
                                        <?php $category = $myData[0]['my_category']; ?>
                                        <?php if ($category == 0) : ?>
                                            <label><input type="radio" name="radio" checked>細マッチョ</label>
                                            <label><input type="radio" name="radio">マッチョ</label>
                                            <label><input type="radio" name="radio">ゴリマッチョ</label>
                                        <?php elseif ($category == 1) : ?>
                                            <label><input type="radio" name="radio">細マッチョ</label>
                                            <label><input type="radio" name="radio" checked>マッチョ</label>
                                            <label><input type="radio" name="radio">ゴリマッチョ</label>
                                        <?php else : ?>
                                            <label><input type="radio" name="radio">細マッチョ</label>
                                            <label><input type="radio" name="radio" checked>マッチョ</label>
                                            <label><input type="radio" name="radio">ゴリマッチョ</label>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">ID(E-mail)</label>
                                    <?php echo form_error('E-mail'); ?>
                                    <input name="E-mail" class="form-control bg-gray" type="text" value="<?php echo $myData[0]['E-mail']; ?>">
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label">パスワード</label>
                                    <?php //echo form_error('password'); ?>
                                    <input type="password" name="password" class="form-control bg-gray" type="text">
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                <button type="submit" class="btn new-primary">保存</button>
                            </div>
                        </div>
            </div>
        </div>
    </form>
    <!-- Modal -->

    <!-- 写真一覧ループ処理 -->
    <div id="individual_img" class="img-list">
        <?php if (!empty($myData[0]["list_image"])) : ?>
                    <?php for ($i = 0; $i < count($myData); $i++ ) : ?>
                        <img class="myImageClass" id="myImage<?php echo $i ?>" src='/img/<?php echo $myData[$i]["list_image"]?>' data-toggle="modal" data-target="#individualModal" data-no=<?php echo $i ?> data-postid=<?php echo $myData[$i]["post_id"]?>>
                    <?php endfor; ?>
        <?php endif; ?>
    </div>
    <!-- 写真一覧 -->

    <!-- 個別画像表示用のモーダル -->
    <form action="/Kinsta/delete" method="post">
        <div class="modal fade" id="individualModal" tabindex="-1" role="dialog" aria-labelledby="individualModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-max" role="document">
                <div class="modal-content border border-gray">
                    <div class="modal-header bg-black">
                            <img src="/img/<?php echo $myData[0]['profile_image']; ?>">
                            <h5 class="modal-title bg-black" id="individualModalLabel">
                                <?php echo $myData[0]['user_name']; ?>
                            </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-black">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                        <img id="post-img" src=""
                                        class='post-img' data-toggle="modal" data-target="#individualModal" data-no=<?php echo $i ?> 
                                        alt="<?php echo $i?>">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <label class="control-label">メッセージ</label>
                                            <textarea id="messageData" class="form-control bg-gray" type="text" cols="30" rows="5" readonly></textarea>

                                            <label class="control-label">マイメニュー</label>
                                            <textarea id="menuData" rows="2" class="form-control bg-gray" type="text" readonly></textarea>

                                            <label class="control-label">マイトレーニング</label>
                                            <textarea id="traningData" rows="4" class="form-control bg-gray" type="text" value= "" readonly></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-black user_delete">
                            <?php //if (!empty($myData[0]["post_id"])) : ?>
                                <?php //for ($i = 0; $i < count($myData); $i++ ) : ?>
                                <input name="delete" type="button" id="delete" class="btn btn-danger" onclick="click_delete('');" value="削除">
                                <!-- <input type="hidden" name="delete" value=" -->
                                <?php //endfor; ?>
                            <?php //endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- 写真モーダル -->
    </form>

    <!-- 画像削除用のJS -->
    <script type="text/javascript" id="delete" data-baseurl="<?= base_url(); ?>">
            function click_delete(data) {
                if (window.confirm('本当に削除されますか？')) {
                    var id = data;
                    var element = document.getElementById('delete');
                    //alert(element.dataset.baseurl);
                    //element.dataset.baseurlでbase_url()を取得
                    location.href = 'delete?num=' + id;
                } else {
                    window.alert('キャンセルされました');
                }
            }
            function click_delete(){
                var mm = document.getElementById('post-img');
                var alt = mm.getAttribute('alt');
                console.log(alt);
            }

    </script>

    <script>
        // プロフィール画像変更時にイメージを表示する
        function previewMypageImage(obj) {
            var fileReader1 = new FileReader();
            fileReader1.onload = (function() {
                var canvas1 = document.getElementById('previewMypage');
                var ctx1 = canvas1.getContext('2d');
                var image1 = new Image();
                image1.src = fileReader1.result;
                image1.onload = (function() {
                    canvas1.width = image1.width;
                    canvas1.height = image1.height;
                    ctx1.drawImage(image1, 0, 0);
                });
            });
            fileReader1.readAsDataURL(obj.files[0]);
        }

        //投稿用のモーダル
        function previewPostImage(obj) {
            var fileReader = new FileReader();
            fileReader.onload = (function() {
                var canvas = document.getElementById('previewPost');
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

    </script>
    <script src="/iine_app/iine.js"></script>
</body>

</html>
