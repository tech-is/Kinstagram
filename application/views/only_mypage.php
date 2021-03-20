<!-- 背景など全ページに共有するcssやBootstrapを使用する場合は以下のコード記述 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinstagram|mypage</title>
    <?php $this->load->view('/common/header'); ?>
    <link rel="stylesheet" href="/style/css/onlyMypage.css">
    <link rel="stylesheet" href="/style/css/mypage_responsive.css">
    <link rel="stylesheet">
    <link rel="stylesheet" href="/style/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="body">
    <header class="header_font_border">
        <li class="titleLogo">
            <a href="/kinsta/top" class="titleLogoReroad">Kinstagram</a>
        </li>
        <li class="sub_title">筋肉達との出会いがここに・・・</li>
        <li class="search_window"><input type="text" class="window_color" placeholder="検索"></li>
        <li class="uploadup">
            <form action="/kinsta/add" method="post" enctype="multipart/form-data">
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
                <!-- Modal -->
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
    <div class="mainPhotflame">
        <form action="/Kinsta/mypage_update" method="post">
            <?php //if (!empty($data)) : ?>
            <?php //foreach ($data as $value) : ?>
                <div class="profile">
                    <div class="profile-inline">
                        <div class="profile-img">
                            <?php //var_dump($myData);?>
                            <img src="/img/<?php echo $myData[0]['profile_image']?>">
                        </div>
                        <div>
                            <p class="user_name text-center" name="user_name">
                                <?php echo $myData[0]['user_name']; ?>
                            </p>
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn new-primary" name="profile_image" data-toggle="modal" data-target="#exampleModal">
                                プロフィール編集
                            </button> -->
                        </div>
                    </div>
                </div>
            <?php //endforeach; ?>
            <?php //endif; ?> 


            <!-- マイページ編集用のModal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <?php if (!empty($array_user)) : ?>
                        <?php foreach ($array_user as $value) : ?>
                            <div class="modal-content bg-black">
                                <!-- <div class="modal-header"> -->
                                    <!-- <h5 class="modal-title" id="exampleModalLabel">プロフィール編集</h5> -->
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                <!-- </div> -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">アイコン画像</label>
                                        <canvas id="preview" style="max-width:200px;"></canvas>
                                        <?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?>
                                        <input name="profile_image" type="file" accept='image/*' onchange="previewImage(this);">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">肉ネーム</label>
                                        <?php echo form_error('username'); ?>
                                        <input name="user_name" class="form-control  bg-gray" type="text" value="<?php echo $value['user_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">紹介文</label>
                                        <input name="introduction" class="form-control  bg-gray" type="text" value="<?php echo $value['introduction']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">マッチョ区分</label>
                                        <div class="radio">
                                            <?php $category = $value['my_category']; ?>
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
                                        <label class="control-label">ID</label>
                                        <?php echo form_error('E-mail'); ?>
                                        <input name="E-mail" class="form-control bg-gray" type="text" value="<?php echo $value['E-mail']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">パスワード</label>
                                        <?php echo form_error('password'); ?>
                                        <input name="password" class="form-control bg-gray" type="text" value="<?php echo $value['password']; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                    <button type="submit" class="btn new-primary">保存</button>
                                </div>
                            </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
            </div>
            <!-- Modal -->
            
            </div>
            <!-- 写真一覧ループ処理 -->
            <div id="individual_img" class="img-list">
                
                <!-- //ディレクトリを取得 -->
                <!-- $img_fld = '/img/';  //後で$_REQUESTにする -->
              

                <?php if (!empty($myData[0]["list_image"])) : ?>
                    <?php for ($i = 0; $i < count($myData); $i++ ) : ?>
                        <img id="myImage" onclick="changeIt()" src='/img/<?php echo $myData[$i]["list_image"]?>' data-toggle="modal" data-target="#individualModal">
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </form>
    </div>
    <!-- 個別ページ用のモーダル -->
    <div class="modal fade" id="individualModal" tabindex="-1" role="dialog" aria-labelledby="individualModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-max" role="document">
                <div class="modal-content border border-gray">
                    <div class="modal-header bg-black">
                        <?php foreach ($array_user as $value) : ?>
                            <img src="/img/142135.png">
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
                                    <img id="post-img" class='post-img' src="" alt="1">
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
                                                    <div class="good-count" data-myid="<?php echo $login_userid[0]['user_id']?>" data-value="<?php echo $value['user_id']?>">326</div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/mune.jpg" alt="胸">
                                                <div class="good-btn-text">胸キレてるね</div>
                                                <div class="good-count">481</div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/kata.png" alt="肩">
                                                <div class="good-btn-text">肩キレてるね</div>
                                                <div class="good-count">1000</div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/hara.png" alt="腹">
                                                <div class="good-btn-text">腹キレてるね</div>
                                                <div class="good-count">5</div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/ashi.png" alt="足">
                                                <div class="good-btn-text">足キレてるね</div>
                                                <div class="good-count">0</div>
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
    <script type="text/javascript" src="<?php echo ("/style/js/onlymypage.js"); ?>"></script>
</body>
</html>