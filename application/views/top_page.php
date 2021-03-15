<!DOCTYPE html>
<html id="bodyScroll" lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/style/css/top_style.css">
    <title>Kinstagram</title>
    <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
    <body>
        <header class="header_font_border">
            <li class="titleLogo"><form method="post" action="/kinsta/top" name="topButton"><a href="javascript:document.topButton.submit()" class="titleLogoReroad">Kinstagram</a></form></li>
            <li class="sub_title">筋肉達との出会いがここに・・・</li>
            <li class="search_window">
                <input id="keyword" type="text" value="" name="serchText" class="window_color" placeholder="検索" autocomplete="off">
            </li>
            <div id="serchResult" aria-hidden="true" class="serchBox hiddenSerch"></div>
            
            <li class="uploadup">
                <form action="/kinsta/post" method="post" name="pcUploadButton">
                    <a href="javascript:document.pcUploadButton.submit()">
                        <span class="material-icons">cloud_upload</span>
                    </a>
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
                        <div class="contents"><form method="get" action="/kinsta/rank" name="totalRankButton"><a href="javascript:document.totalRankButton.submit()">総合ランキング</a></form></div>
                        <div class="contents detailMenu ">部位ランキング</div>
                            <ul class="detailContentsList">
                                <li class="detailContents"><form method="get" action="/kinsta/armRank" name="armRankButton"><a href="javascript:document.armRankButton.submit()">腕筋</a></form></li>
                                <li class="detailContents"><form method="get" action="/kinsta/shoulderRank" name="shoulderRankButton"><a href="javascript:document.shoulderRankButton.submit()">肩筋</a></form></li>
                                <li class="detailContents"><form method="get" action="/kinsta/breastRank" name="breastRankButton"><a href="javascript:document.breastRankButton.submit()">胸筋</a></form></li>
                                <li class="detailContents"><form method="get" action="/kinsta/absRank" name="absRankButton"><a href="javascript:document.absRankButton.submit()">腹筋</a></form></li>
                                <li class="detailContents"><form method="get" action="/kinsta/footRank" name="footRankButton"><a href="javascript:document.footRankButton.submit()">足筋</a></form></li>
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
                                            <div class="iconDiv5001"><img class="icon5001" src="/img/<?php echo $value["profile_image"]?>">
                                                <ul class="followerFollowUl">
                                                    <li class="nameFollowFollower"><?php echo $value["user_name"]?></li>
                                                    <li class="followerNumber">マッスルメンバー数
                                                        <?php if(!empty($value["follower_number"])):?> 
                                                        <?php echo $value["follower_number"].'人'?></li>
                                                        <?php else:?>
                                                            <?php echo '0人'?></li>
                                                        <?php endif;?>
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
                                <img src="/img/<?php echo $value["list_image"]?>" alt="" class="allPhotos">
                            </li>
                        <?php endforeach; ?> 
                        <?php endif;?>
                    </ul>
                    
                </main>
                <aside class="asideToreni asideToreni2">
                    <ul class="asideUl">
                        <li class="followToreni">おすすめトレーニー</li>
                        <hr class="follow_border">
                        <?php $i = 0;?>
                        <?php if (!empty($five_data)) : ?>
                            <?php foreach ($five_data as $value) : ?>
                                <li class="asideIcon">
                                    <a href="/kinsta/onlyMypage?userId=<?php echo $value['user_id'];?>" class="icon">
                                        <img src="/img/<?php echo $value["profile_image"]?>" alt="" class="recommended">
                                    </a>
                                </li>
                                <li class="name">
                                    <div>
                                        <a href="/kinsta/onlyMypage?userId=<?php echo $value['user_id'];?>" class="a_name"><?php echo $value["user_name"]?></a>
                                        <a href="#" class="addMassuleMember" id="openMember<?php echo $i ?>" data-myid="<?php echo $login_userid[0]['user_id']?>" data-value="<?php echo $value['user_id']?>">マッスルメンバーに追加</a>
                                    </div>
                                    <section id="modalMember1" class="hidden">
                                        <ul class="memberPostFollowPicture">
                                            <p><?php echo $value["user_name"]?></p>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="<?php echo ("/style/js/toppage.js"); ?>"></script>
    </body>
</html>