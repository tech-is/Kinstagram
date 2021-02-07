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
                                    <input class="form-control  bg-gray" type="text" value="<?php echo $value['user_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">紹介文</label>
                                    <input class="form-control  bg-gray" type="text" value="<?php echo $value['introduction'] ?>">
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
                                    <input class="form-control bg-gray" type="text" value="<?php echo $value['E-mail'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">パスワード</label>
                                    <input class="form-control bg-gray" type="text" value="<?php echo $value['password'] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                <button type="button" class="btn new-primary">保存</button>
                            </div>
                        </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
        </div>

        <!-- Modal -->
        <!-- 写真一覧 -->
        <div class="img-list">
            <img src="/img/list_img_userid_1/45196_s.jpg" alt="usename.1">
            <img src="/img/list_img_userid_1/45198_s.jpg" alt="usename.2">
            <img src="/img/list_img_userid_1/45204_s.jpg" alt="usename.3">
            <img src="/img/list_img_userid_1/45211_s.jpg" alt="usename.4">
            <img src="/img/list_img_userid_1/45212_s.jpg" alt="usename.5">
            <img src="/img/list_img_userid_1/45217_s.jpg" alt="usename.6">
        </div>
        <!-- 写真一覧 -->
    </form>
</body>

</html>