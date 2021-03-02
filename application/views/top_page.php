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
            <li class="titleLogo"><form method="post" action="/kinsta/top" name="topButton"><a href="javascript:document.topButton.submit()" class="titleLogoReroad">Kinstagram</a></form></li>
            <li class="sub_title">筋肉達との出会いがここに・・・</li>
            <li class="search_window"><input type="text" class="window_color" placeholder="検索"></li>
            <li class="uploadup">
                <form action="/kinsta/post" method="post" name="pcUploadButton">
                    <a href="javascript:document.pcUploadButton.submit()">
                        <span class="material-icons">cloud_upload</span>
                    </a>
                </form>
            </li>
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
        
        
    <!-- <script>
        document.getElementsByClassName('btn')[0].onclick=function postClick(){
            if(document.getElementById('postModal').style.display=="block"){
                document.getElementById('postModal').style.display="none";
            }else{
            document.getElementById('postModal').style.display="block";
            document.getElementById('formModal').style.right="2%";

            }
        };
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
    </script> -->
        <nav class="underNav">
                <ul class="underTab" id="underTab2">
                    <li class="new">
                        <div class="centerLine">
                            <form method="post" action="/kinsta/top" name="newButton"><a href="javascript:document.newButton.submit()" class="a_new">新&nbsp;着</a></form>
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
                                    <?php if (!empty($data_array)) : ?>
                                    <?php foreach ($data_array as $value) : ?>
                                        <li class="followMember1">
                                            <div class="iconDiv5001"><img class="icon5001" src="/img/<?php echo $value["list_image"]?>">
                                                <ul class="followerFollowUl">
                                                    <li class="nameFollowFollower"><?php echo $value["user_name"]?></li>
                                                    <li class="followerNumber">マッスルメンバー数<?php echo $value["follower_number"]?></li>
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
                <ul class="scroll" data-max="29" data-lastnum="9">
                    <div class="imgList">
                        <?php if (!empty($all_posts)) : ?>
                        <?php foreach ($all_posts as $value) : ?>
                            <form method="post" action="/kinsta/imagelist">
                                <li class="sizePicture">
                                    <input type="image" class="p" src="/img/<?php echo $value["list_image"]?>">
                                    <input type="hidden" name="user_id" value="<?php echo $value['user_id']?>">
                                </li>
                            </form>
                        <?php endforeach; ?> 
                        <?php endif;?>
                    </div>
                </ul>
            </main>
            <aside class="asideToreni asideToreni2">
                <ul class="asideUl">
                    <li class="followToreni">おすすめトレーニー</li>
                    <hr class="follow_border">
                    <?php if (!empty($five_data)) : ?>
                        <?php foreach ($five_data as $value) : ?>
                            <form method="post" action="/kinsta/imagelist">
                                <li class="asideIcon">
                                    <a href="#" class="icon">
                                        <input type="image" id="icon1" src="/img/<?php echo $value["profile_image"]?>">
                                        <input type="hidden" name="user_id" value="<?php echo $value['user_id']?>">
                                    </a>
                                </li>
                                <li class="name">
                                    <div>
                                        <a href="#" class="a_name" id="openMember1"><?php echo $value["user_name"]?></a>
                                        <a href="#" class="massule_member">マッスルメンバーに追加</a>
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
                            </form>
                            <?php endforeach; ?>
                            <?php endif; ?>
            
             
                    <hr class="other_border">
                    <li class="otherMember">
                        <a href="#" class="aOtherMember" id="otherMemberIrekae">その他のメンバーを見る</a>
                    </li>
                </ul>
            </aside>
            </div>
        <script type="text/javascript" src="<?php echo ("/style/js/toppage.js"); ?>"></script>
        
    </body>
</html>