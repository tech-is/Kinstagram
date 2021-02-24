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
</head>

<body class="body">
    <form action="/Kinsta/mypage" method="post">
        <!-- <?php if (!empty($array_user)) : ?> -->
        <?php foreach ($array_user as $value) : ?>
            <div class="profile">
                <div class="profile-inline">
                    <div class="profile-img">
                        <img src="/img/142135.png">
                    </div>
                    <div>
                        <p class="user_name text-center" name="user_name">
                            <?php echo $value['user_name'] ?>
                        </p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn new-primary" name="profile_image" data-toggle="modal" data-target="#exampleModal">
                            プロフィール編集
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- <?php endif; ?> -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                    <?php if (!empty($array_user)) : ?>
                        <?php foreach ($array_user as $value) : ?>
                        <div class="modal-content bg-black">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">プロフィール編集</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">肉ネーム</label>
                                    <input id="user_name" class="form-control  bg-gray" type="text" value="<?php echo $value['user_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">紹介文</label>
                                    <input id="introduction" class="form-control  bg-gray" type="text" value="<?php echo $value['introduction'] ?>">
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
                                    <input id="email" class="form-control bg-gray" type="text" value="<?php echo $value['E-mail'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">パスワード</label>
                                    <input id="password" class="form-control bg-gray" type="text" value="<?php echo str_repeat("筋", mb_strlen($value['password'], "UTF8")); ?>">
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
        <!-- 写真一覧ループ処理 -->
        <div class="img-list">
        >

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