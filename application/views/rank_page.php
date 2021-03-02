<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet">
    <?php echo link_tag("/style/css/rank_style.css"); ?>
</head>
<body>
    <nav class="underNav">
        <ul class="underTab">
            <li class="new"><a href="#" class="a_new">新  着</a></li>
            <div class="accordion">
                <li class="menu js-menu">ランキング</li>
                <div class="contents"><a href="#">総合ランキング</a></div>
                <div class="contents detailMenu ">部位別ランキング</div>
                    <ul class="detailContentsList">
                        <li class="detailContents"><a href="#">腕筋</a></li>
                        <li class="detailContents"><a href="#">肩筋</a></li>
                        <li class="detailContents"><a href="#">胸筋</a></li>
                        <li class="detailContents"><a href="#">腹筋</a></li>
                        <li class="detailContents"><a href="#">足筋</a></li>
                    </ul>
                </div>
            <li class="select"><a href="#" class="a_select">セレクト</a></li>
        </ul>
    </nav>
    <main>
        <ul class="wrapper">
            <li class="weekTitle">今週の"素敵なゴリマッチョ"達</li>
            <?php var_dump($total_rank)?>
            <li class="name_no1"><?php echo ($total_rank[0]['user_name'])?></li>
           

            <li class="picture1"><img class="picture" src="/img/<?php echo ($total_rank[0]["list_image"]);?>"/></li>
            <li class="message">message<br/><?php echo ($total_rank[0]['post_message'])?></li>
            <li class="myTraning">マイトレーニング<br/><?php echo ($total_rank[0]['post_message'])?></li>
            <li class="myFood">フード<br/><?php echo ($total_rank[0]['mymenu'])?></li>
            

            
            <!-- <li class="message">メッセージ</li>
            <li class="mytraning">マイトレーニング</li>
            <li class="kiretemasu_no1">キレてますアイコン+1000</li>
            <li class="name_no2">No2.アイコンnakanishi</li>
            <li class="name_no3">No3.アイコン筋トレ大変</li> -->
            <!-- <li class="picture2"><img class="picture" src="<?php //echo ("/assets/kinsta_img/1.jpg");?>"/></li>
            <li class="picture3"><img class="picture" src="<?php //echo ("/assets/kinsta_img/1.jpg");?>"/></li> -->
            <!-- <li class="kiretemasu_no2">キレてますアイコン+100</li>
            <li class="kiretemasu_no3">キレてますアイコン+50</li> -->
        </ul>
    </main>
    <script type="text/javascript" src="<?php echo ("/style/js/rankpage.js"); ?>"></script>
</body>
</html>