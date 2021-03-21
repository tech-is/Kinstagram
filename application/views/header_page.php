<!DOCTYPE html>
<html id="bodyScroll" lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="/style/css/headerRankPage.css">
    <title>Kinstagram</title>
    <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
    <body>

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

        <hr class="header_border">