<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>筋肉画像の投稿結果</title>
</head>
<body>
    <div>
    <h3>Kin-gratulation！あなたの筋肉画像は正常に投稿されました</h3>
    <p>投稿した筋肉画像を表示するには、ここをクリック!
    <?php anchor('/img/list_img_userid_1'.$image_metadata['file_name'],'私の筋肉を見る!')?>
    </p>
    
    <p>
    <?php echo anchor('upload-image','筋肉仲間の筋肉を確認する'); ?>
    </p> 
    </div>
</body>
</html>