<!-- 背景など全ページに共有するcssやBootstrapを使用する場合は以下のコード記述 -->
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
                        <h5 class="modal-title bg-black" id="postModalLabel">タンクトッパー</h5>
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
                                        <label class="control-label">メッセージ</label>
                                        <input class="form-control bg-gray" type="text">

                                        <label class="control-label">＃キーワード</label>
                                        <input class="form-control bg-gray" type="text">

                                        <label class="control-label">マイメニュー</label>
                                        <input class="form-control bg-gray" type="text">

                                        <label class="control-label">マイトレーニング</label>
                                        <input class="form-control bg-gray" type="text">

                                        <button type="button" class="btn good-btn bg-gray"><img class="good" src="/img/174076.png" alt="胸good"></button>
                                        <button type="button" class="btn good-btn bg-gray"><img class="good" src="/img/174076.png" alt="腕good"></button>
                                        <button type="button" class="btn good-btn bg-gray"><img class="good" src="/img/174076.png" alt="肩good"></button>
                                        <button type="button" class="btn good-btn bg-gray"><img class="good" src="/img/174076.png" alt="腹good"></button>
                                        <button type="button" class="btn good-btn bg-gray"><img class="good" src="/img/174076.png" alt="足good"></button>
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