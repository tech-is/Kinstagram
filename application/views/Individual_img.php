<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinstagram|Individual</title>
    <?php $this->load->view('/common/header'); ?>

    <link rel="stylesheet" href="/style/css/individual_img.css">
</head>

<body>
    <form>
        <!-- 投稿ボタン -->
        <button type="button" class="btn new-primary" data-toggle="modal" data-target="#postModal">投稿></button>
        <!-- 投稿ボタン -->

        <!-- Modal -->
        <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-max" role="document">
                <div class="modal-content border border-gray">
                    <div class="modal-header bg-black">
                        <?php foreach ($array_user as $value) : ?>
                            <img src="/img/142135.png">
                            <h5 class="modal-title bg-black" id="postModalLabel">
                                <?php echo $value['user_name'] ?>
                            </h5>
                        <?php endforeach; ?>

                        <?php $follow = 0; ?> <!--フォロー判定　DBから読み込み -->
                        <?php if ($follow == 0) : ?>
                            <input type="button" class="btn-gradient-radius" value="フォローする">
                        <?php else : ?>
                            <input type="button" class="btn-gradient-radius" value="フォロー中">
                        <?php endif; ?>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-black">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class='post-img' src="/img/list_img_userid_1/45211_s.jpg" alt="1">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                            <?php foreach ($array_post as $value2) : ?>
                                                <label class="control-label">メッセージ</label>
                                                <input class="form-control bg-gray" type="text" value="<?php echo $value2['post_message'] ?>">

                                                <label class="control-label">＃キーワード</label>
                                                <input class="form-control bg-gray" type="text" value="<?php echo $value2['hash_id'] ?>">

                                                <label class="control-label">マイメニュー</label>
                                                <input class="form-control bg-gray" type="text" value="<?php echo $value2['mymenu'] ?>">

                                                <label class="control-label">マイトレーニング</label>
                                                <input class="form-control bg-gray" type="text" value="<?php echo $value2['mytraining'] ?>">
                                            <?php endforeach; ?>

                                        <!-- いいねボタン -->
                                        <div class="good-btn-container">
                                            <div class="good-btn-icon">
                                                <image src="/img/button/ude.png" alt="腕">
                                                    <div class="good-btn-text">腕キレてるね</div>
                                                    <div class="good-count">326</div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/mune.jpg" alt="胸">
                                                <div class="good-btn-text">胸キレてるね</div>
                                                <div class="good-count">481</div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/kata.png" alt="肩">
                                                <div class="good-btn-text">肩キレてるね</div>
                                                <div class="good-count">1000</div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/hara.png" alt="腹">
                                                <div class="good-btn-text">腹キレてるね</div>
                                                <div class="good-count">5</div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/ashi.png" alt="足">
                                                <div class="good-btn-text">足キレてるね</div>
                                                <div class="good-count">0</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

    </form>
</body>

</html>