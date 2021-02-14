<!DOCTYPE html>
<html id="bodyScroll" lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet">
    <?php echo link_tag("/assets/kinsta_css/top_style.css"); ?>
    <title>Kinstagram</title>
    <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
    <body>
        
            <header class="header_font_border">
                <li class="titleLogo"><a href="#" class="titleLogoReroad">Kinstagram</a></li>
                <li class="sub_title">筋肉達との出会いがここに・・・</li>
                <li class="search_window"><input type="text" class="window_color" placeholder="検索"></li>
                <li class="uploadup"><a href="#"><span class="material-icons">cloud_upload</span></a></li>
                <li class="login">
                    <a href="#" class="btn-square-shadow">ログイン</a>
                    <a href="#" class="btn-square-shadow">マイページ</a>
                </li>
                <div class="hambarger">
                    <li class="menuIcon">
                        <input id="menu" type="checkbox">
                        <label for="menu" class="open"><span class="material-icons">dehaze</span></label>
                        <label for="menu" class="back"></label>
                        <nav class="hambargerNav">
                            <ul class="hambargerUl">
                                <li>マイページ</li>
                                <li>アップロード</li>
                                <li>ログイン</li>
                                <li>ログアウト</li>
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
                            <a href="#" class="a_new">新&nbsp;着</a>
                        </div>
                    </li>
                    <div class="accordion">
                        <li class="menu js-menu">
                            <div class="centerLine">
                                <span class="rankCenter">ランキング</span>
                            </div>
                        </li>
                        <div class="contents"><a href="#">総合ランキング</a></div>
                        <div class="contents detailMenu ">部位ランキング</div>
                            <ul class="detailContentsList">
                                <li class="detailContents"><a href="#">腕筋</a></li>
                                <li class="detailContents"><a href="#">肩筋</a></li>
                                <li class="detailContents"><a href="#">胸筋</a></li>
                                <li class="detailContents"><a href="#">腹筋</a></li>
                                <li class="detailContents"><a href="#">足筋</a></li>
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
                                    <li class="followMember1">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember2">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember3">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember4">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember5">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember6">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember7">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember8">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember9">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="followMember10">
                                        <div class="iconDiv5001"><img class="icon5001"/>
                                            <ul class="followerFollowUl">
                                                <li class="nameFollowFollower"></li>
                                                <li class="followerNumber">2</li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- <nav class = "followUnderNav"></nav> -->
            
                  

            
            <div class="divMainAsaid">
            <main id="mainPicture">
                <ul class="scroll" data-max="29" data-lastnum="9">
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/1.jpg");?>"/></li>
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/2.jpg");?>"/></li>
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/3.jpg");?>"/></li>
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/3.jpg");?>"/></li>
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/3.jpg");?>"/></li>
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/3.jpg");?>"/></li>
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/3.jpg");?>"/></li>
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/3.jpg");?>"/></li>
                    <li class="sizePicture"><img class="picture" data-src="<?php echo ("/assets/kinsta_img/3.jpg");?>"/></li>



                   
                    
                    
                    
                    
                    
                    
                </ul>
            </main>
            <aside class="asideToreni asideToreni2">
                <ul class="asideUl">
                    <li class="followToreni">おすすめトレーニー</li>
                    <hr class="follow_border">
                    <li class="asideIcon">
                        <a href="#" class="icon"><img id="icon1" src="<?php echo ("/assets/kinsta_img/try_kinniku30px.png");?>"/></a>
                    </li>
                    <li class="name">
                        <div>
                            <a href="#" class="a_name" id="openMember1">プロテイン君</a>
                            <a href="#" class="massule_member">マッスルメンバーに追加</a>
                        </div>
                        <section id="modalMember1" class="hidden">
                            <p>プロテイン</p>
                            <p>投稿10件</p>
                            <p>マッスルメンバー10人</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>マッスルメンバーに追加</p>
                        </section>
                    </li>
                    
                    <li class="asideIcon">
                        <a href="#">
                            <img id="icon2" src="<?php echo ("/assets/kinsta_img/try_kinniku30px.png");?>"/>
                        </a>
                    </li>
                    <li class="name">
                    <div>
                        <a href="#" class="a_name" id="openMember2">きんに君</a>
                        <a href="#" class="massule_member">マッスルメンバーに追加</a>
                    </div>
                        <section id="modalMember2" class="hidden">
                            <p>きんに君</p>
                            <p>投稿10件</p>
                            <p>マッスルメンバー10人</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>マッスルメンバーに追加</p>
                        </section>
                    </li>
                    <li class="asideIcon">
                        <a href="#"><img id="icon3" src="<?php echo ("/assets/kinsta_img/try_kinniku30px.png");?>"/></a>
                    </li>
                    <li class="name">
                    <div>
                        <a href="#" class="a_name" id="openMember3">油は大敵君</a>
                        <a href="#" class="massule_member">マッスルメンバーに追加</a>
                    </div>
                        <section id="modalMember3" class="hidden">
                            <p>油は大敵君</p>
                            <p>投稿10件</p>
                            <p>マッスルメンバー10人</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>マッスルメンバーに追加</p>
                        </section>
                    </li>
                    <li class="asideIcon">
                        <a href="#"><img id="icon4" src="<?php echo ("/assets/kinsta_img/try_kinniku_kadomaru.png");?>"/></a>
                    </li>
                    <li class="name">
                    <div>
                        <a href="#" class="a_name" id="openMember4">ムキムキ君</a>
                        <a href="#" class="massule_member">マッスルメンバーに追加</a>
                    </div>
                        <section id="modalMember4" class="hidden">
                            <p>ムキムキ君</p>
                            <p>投稿10件</p>
                            <p>マッスルメンバー10人</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>マッスルメンバーに追加</p>
                        </section>
                    </li>
                    <li class="asideIcon">
                        <a href="#"><img id="icon5" src="<?php echo ("/assets/kinsta_img/try_kinniku_kadomaru.png");?>"/></a>
                    </li>
                    <li class="name">
                        <div>
                            <a href="#" class="a_name" id="openMember5">バキバキ君</a>
                            <a href="#" class="massule_member">マッスルメンバーに追加</a>
                        </div>
                        <section id="modalMember5" class="hidden">
                            <p>バキバキ君</p>
                            <p>投稿10件</p>
                            <p>マッスルメンバー10人</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>写真</p>
                            <p>マッスルメンバーに追加</p>
                        </section>
                    </li>
                    <hr class="other_border">
                    <li class="otherMember">
                        <a href="#" class="aOtherMember" id="otherMemberIrekae">その他のメンバーを見る</a>
                    </li>
                </ul>
            </aside>
            </div>
            <script type="text/javascript" src="<?php echo ("/assets/kinsta_js/toppage.js"); ?>"></script>
        
    </body>
</html>