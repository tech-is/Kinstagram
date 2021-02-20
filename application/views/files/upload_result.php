<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/css/upload_result.css">
    <link rel="stylesheet" href="/style/css/upload_result_responsive.css">
    <title>筋肉画像の投稿結果</title>
</head>

<body>
    <div class="body">
        <img src="/img/upload_result.jpg" alt="投稿成功画像">
        <h1 class="text-resule">Kin-gratulation！<br>あなたの筋肉画像は正常に投稿されました</h1>
        <h3 class="mypage">
            投稿した筋肉画像を表示するには、<br>ここをクリック!
            <?php echo anchor('/Kinsta/mypage', '自らの筋肉を確認する'); ?>
        </h3>
        <br>
        <h3 class="top_page">
            トップページに移動するには、<br>ここをクリック！
            <?php echo anchor('/Kinsta/top', '筋肉仲間の筋肉を見る'); ?>
        </h3>
    </div>
</body>

</html>