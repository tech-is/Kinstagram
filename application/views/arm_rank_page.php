<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet">
    <?php echo link_tag("/style/css/rank_style.css"); ?>
    <?php echo link_tag("/style/css/header.css"); ?>
    <?php $this->load->view('/common/header'); ?>
</head>
<body>
    <nav class="underNav">
        <ul class="underTab">
            <li class="new"><div class="centerLine"><a href="#" class="a_new">新  着</a></div></li>
            <div class="accordion">
            <li class="menu js-menu"><div class="centerLine"><span class="rankCenter">ランキング</span></div></li>
                <div class="contents"><a href="/kinsta/rank">総合ランキング</a></div>
                <div class="contents detailMenu ">部位別ランキング</div>
                    <ul class="detailContentsList">
                        <li class="detailContents"><form method="get" action="/kinsta/armRank" name="armRankButton"><a href="javascript:document.armRankButton.submit()">腕筋</a></form></li>
                        <li class="detailContents"><form method="get" action="/kinsta/shoulderRank" name="shoulderRankButton"><a href="javascript:document.shoulderRankButton.submit()">肩筋</a></form></li>
                        <li class="detailContents"><form method="get" action="/kinsta/breastRank" name="breastRankButton"><a href="javascript:document.breastRankButton.submit()">胸筋</a></form></li>
                        <li class="detailContents"><form method="get" action="/kinsta/absRank" name="absRankButton"><a href="javascript:document.absRankButton.submit()">腹筋</a></form></li>
                        <li class="detailContents"><form method="get" action="/kinsta/footRank" name="footRankButton"><a href="javascript:document.footRankButton.submit()">足筋</a></form></li>
                    </ul>
            </div>
            <li class="select"><div class="centerLine"><a href="#" class="a_select">セレクト</a></div></li>
        </ul>
    </nav>
    <main>
        <ul class="wrapper">
            <li class="weekTitle">今週の"素敵なゴリマッチョ"達</li>
            
            <li class="name_no1">
                🏆NO.1<?php echo ($favorite_arm_rank[0]['user_name'])?>
                <img src="/img/<?php echo '142136.png'?>" class="kiretemasu"alt="">
                <?php //echo ($favorite_arm_rank[0]['follower_number']).'マッスルメンバー'?>
            </li>
            <li class="followerNum"></li>

            <li class="picture1">
                <img class="picture" src="/img/45222_s.jpg"/>
                <p><img src="/img/<?php echo '142136.png'?>" class="kiretemasu" alt="">
                <?php echo ($favorite_arm_rank[0]['count']).'マッスル'?>
                </p>
            </li>
            <li class="message">message<br/><?php echo ($favorite_arm_rank[0]['post_message'])?><br/>
            <?php foreach ($favorite_arm_rank as $value) : ?>
            
            
            <?php if($favorite_arm_rank[0]['post_id'] == $value['post_id']):?></br>
                <?php if(!empty($value['comment_user_name'])):?>
                    <?php echo $value['comment_user_name'] . ':' ?>
                    <?php echo $value['text_group'] ?></br>
                <?php endif ?>
            <?php endif ?>
        
            <?php endforeach;?>
            <li class="myTraning">マイトレーニング<br/><?php echo ($favorite_arm_rank[0]['mytraining'])?></li>
            <li class="myFood">フード<br/><?php echo ($favorite_arm_rank[0]['mymenu'])?></li>
            

            
            
            
            <li class="name_no2">
                🥈No.2
                <?php 
                $num1 = 0;
                for($i=1;$i<=count($favorite_arm_rank);$i++){
                    if($favorite_arm_rank[0]['post_id']!==$favorite_arm_rank[$i]['post_id']){
                        echo ($favorite_arm_rank[$i]['user_name']);
                        $num1 = $i;
                        break;
                    }
                }
                ?>
                <img src="/img/<?php echo '142136.png'?>" class="kiretemasu"alt="">
                <?php //echo ($favorite_arm_rank[$num1]['follower_number'].'マッスルメンバー')?>
            </li>
            <li class="picture2"><img class="picture" src="/img/<?php echo ($favorite_arm_rank[$num1]["list_image"]);?>"/>
                <p><img src="/img/<?php echo '142136.png'?>" class="kiretemasu"alt="">
                    <?php echo ($favorite_arm_rank[$num1]['count']).'マッスル'?>
                </p>
            </li>

            <li class="name_no3">
                🥉No.3
                <?php 
                $num2 = 0;
                for($i=$num1+1;$i<=count($favorite_arm_rank);$i++){
                    if($favorite_arm_rank[$num1]['user_name']!==$favorite_arm_rank[$i]['user_name']){
                        echo ($favorite_arm_rank[$i]['user_name']);
                        $num2 = $i;
                        break;
                    }
                }
                ?>
                <img src="/img/<?php echo '142136.png'?>" class="kiretemasu"alt="">
                <?php //echo ($favorite_arm_rank[$num2]['follower_number'].'マッスルメンバー')?>
            </li> 
            <li class="picture3">
                <img class="picture" src="/img/<?php echo ($favorite_arm_rank[$num2]['list_image']);?>"/>
                <p><img src="/img/<?php echo '142136.png'?>" class="kiretemasu"alt="">
                    <?php echo ($favorite_arm_rank[$num2]['count']).'マッスル'?>
                </p>
            </li> 
            
        </ul>
    </main>
    <script type="text/javascript" src="<?php echo ("/style/js/rankpage.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo ("/style/js/header.js"); ?>"></script>
</body>
</html>