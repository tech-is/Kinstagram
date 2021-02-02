<!-- 背景など全ページに共有するcssやBootstrapを使用する場合は以下のコード記述 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('/common/header'); ?>
    <link rel="stylesheet" href="/style/css/post.css">

    <title>Kinstagram|Post_scr</title>
</head>

<body>
    <form>
        <!-- 投稿ボタン -->
        <button type="button" class="btn new-primary" data-toggle="modal" data-target="#postModal">投稿></button>
        <!-- 投稿ボタン -->

        <!-- Modal -->
        <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content  border border-gray">
                    <div class="modal-header bg-black">
                        <h5 class="modal-title bg-black" id="postModalLabel">New post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-black">

                        <img class='post-img' src="/img/list_img_userid_1/45217_s.jpg" alt="1">

                        <input type="file" name="upfile">


                        <div class="form-group">
                            <label class="control-label">メッセージ</label>
                            <input class="form-control bg-gray" type="text">
                        </div>
                        <div class="form-group">
                            <label class="control-label">＃キーワード</label>
                            <input class="form-control bg-gray" type="text">
                        </div>
                        <div class="form-group">
                            <label class="control-label">マイメニュー</label>
                            <input class="form-control bg-gray" type="text">
                        </div>
                        <div class="form-group">
                            <label class="control-label">マイトレーニング</label>
                            <input class="form-control bg-gray" type="text">
                        </div>
                    </div>
                    <div class="modal-footer bg-black">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="button" class="btn new-primary">投稿</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </form>
</body>

</html>