<!DOCTYPE html>
<html id="bodyScroll" lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/style/css/post.css">
    <link rel="stylesheet" href="/style/css/top_style.css">
    <title>Kinstagram</title>
    <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
    <body>

        <header class="header_font_border">
            <li class="titleLogo"><form method="get" action="/kinsta/top" name="topButton"><a href="javascript:document.topButton.submit()" class="titleLogoReroad">Kinstagram</a></form></li>
            <li class="sub_title">筋肉達との出会いがここに・・・</li>
            <li class="search_window"><input type="text" class="window_color" placeholder="検索"></li>
            <li class="uploadup"><span class="material-icons">cloud_upload</span></li>
            <li class="login">
                <form method="get" action="/kinsta/login">
                    <input type="submit" class="btn-square-shadow" value="ログイン">
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
                            <li><form method="get" action="/kinsta/mypage" name="mypageButton"><a href="javascript:document.mypageButton.submit()" class="textNone">マイページ</a></form></li>
                            <li><form method="get" action="/kinsta/post" name="uploadButton"><a href="javascript:document.uploadButton.submit()" class="textNone">アップロード</a></form></li>
                            <li><form method="get" action="/kinsta/login" name="loginButton"><a href="javascript:document.loginButton.submit()" class="textNone">ログイン</a></form></li>
                            <li><form method="get" action="/kinsta/logout" name="logoutButton"><a href="javascript:document.logoutButton.submit()" class="textNone">ログアウト</a></form></li>
                            <li class="cancelButton"><label for="menu" class="close">×</label></li>
                        </ul>
                    </nav>
                </li>
            </div>


            
        </header>

        <hr class="header_border">