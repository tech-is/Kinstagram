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
    <link rel="stylesheet" href="/style/css/header_style.css">
</head>

<body class="body">
    <form action="/Kinsta/mypage" method="post">
        <!-- <?php if (!empty($myicon_data)) : ?> -->
        <?php foreach ($myicon_data as $value) : ?>
            <div class="profile">
                <div class="profile-inline">
                    <div class="profile-img">
                        <img src="/img/<?php echo $value["profile_image"]?>">
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- <?php endif; ?> -->

        
        

        <!-- Modal -->
        <!-- 写真一覧ループ処理 -->
        <div class="img-list">
        

        <?php if (!empty($myposts_data)) : ?>
        <?php foreach ($myposts_data as $value) : ?>
           <?php// var_dump($value['list_image']);?> 
            <img src="/img/<?php echo $value["list_image"]?>">
        <?php endforeach; ?>
        <?php endif; ?>
            <?php

            //ディレクトリを取得
            // $img_fld = '/img/list_img_userid_1/';  //後で$_REQUESTにする
            //ディレクトリ内の一覧を取得する
            // $img_list = glob('.' . $img_fld . '*');
            // var_dump($img_list);
            //画像の枚数を取得
            // $count = count($img_list);
            //  画像を表示
            // for ($i = 0; $i < $count; $i++) {
            //     $file = pathinfo($img_list[$i]);
            //     $file_name = $file["basename"];
            //     echo '<img src="' . $img_fld . $file_name . '">';
            // }
            ?>
        </div>
        <!-- 写真一覧 -->
    </form>
</body>

</html>