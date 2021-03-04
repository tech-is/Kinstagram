<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinstagram | Individual</title>
    <?php $this->load->view('/common/header'); ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="/iine_app/iine.css">
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

                        <input type="button" id="follow" class="btn-gradient-radius" value="フォローする" onclick="change()">
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
                                            <textarea class="form-control bg-gray" type="text" cols="30" rows="5" readonly><?php echo $value2['post_message'] ?></textarea>

                                            <label class="control-label">マイメニュー</label>
                                            <input class="form-control bg-gray" type="text" value="<?php echo $value2['mymenu'] ?>" readonly>

                                            <label class="control-label">マイトレーニング</label>
                                            <input class="form-control bg-gray" type="text" value="<?php echo $value2['mytraining'] ?>" readonly>
                                        <?php endforeach; ?>

                                        <!-- いいねボタン -->
                                        <div class="good-btn-container">
                                            <div class="good-btn-icon">
                                                <image src="/img/button/ude.png" alt="腕">
                                                    <div class="good-btn-text">腕キレてるね</div>
                                                    <div class="iframe">
                                                        <iframe src="/iine/iine1.html" class="iineiframe"></iframe>
                                                    </div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/mune.jpg" alt="胸">
                                                <div class="good-btn-text">胸キレてるね</div>
                                                <div class="iframe">
                                                    <iframe src="/iine/iine2.html" class="iineiframe"></iframe>
                                                </div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/kata.png" alt="肩">
                                                <div class="good-btn-text">肩キレてるね</div>
                                                <div class="iframe">
                                                    <iframe src="/iine/iine3.html" class="iineiframe"></iframe>
                                                </div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/hara.png" alt="腹">
                                                <div class="good-btn-text">腹キレてるね</div>
                                                <div class="iframe">
                                                    <iframe src="/iine/iine4.html" class="iineiframe"></iframe>
                                                </div>
                                            </div>
                                            <div class="good-btn-icon">
                                                <img src="/img/button/ashi.png" alt="足">
                                                <div class="good-btn-text">足キレてるね</div>
                                                <div class="iframe">
                                                    <iframe src="/iine/iine5.html" class="iineiframe"></iframe>
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
        </div>
        <!-- Modal -->
    </form>
    <script>
        document.getElementById("follow").addEventListener(
            "click",
            function(event) {
                if (event.target.value === "フォロー中") {
                    event.target.value = "フォローする";
                } else {
                    event.target.value = "フォロー中";
                }
            },
            false
        );
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/iine_app/iine.js"></script>
</body>
