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
    <form action="/kinsta/add" method="post" enctype="multipart/form-data">
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
                        <!-- 参考URLhttps://blog.ver001.com/javascript_preview_canvas/ -->
                        <canvas id="preview" style="max-width:200px;"></canvas>
                        <?php
                        if (isset($error)) {
                            echo $error;
                        }
                        ?>
                        <input name="list_image" type="file" accept='image/*' onchange="previewImage(this);">

                        <div class="form-group">
                            <labelclass="control-label">メッセージ</label>
                                <textarea name="post_message" class="form-control bg-gray" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">マイメニュー</label>
                            <input name="mymenu" class="form-control bg-gray" type="text">
                        </div>
                        <div class="form-group">
                            <label class="control-label">マイトレーニング</label>
                            <input name="mytraining" class="form-control bg-gray" type="text">
                        </div>
                    </div>
                    <div class="modal-footer bg-black">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn new-primary">投稿</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
    </form>
    <script>
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
    </script>
</body>

</html>