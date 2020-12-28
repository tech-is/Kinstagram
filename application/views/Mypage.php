<!-- 背景など全ページに共有するcssやBootstrapを使用する場合は以下のコード記述 -->
<?php $this->load->view('/common/header');?>

<link rel = "stylesheet" href="<?php echo base_url('/style/css/mypage.css');?>">
    <body class="body">
        <form>
            <div class="profile">
                <div class="profile-inline">
                    <div class="profile-img" style="background:url('<?php echo base_url('/img/89862_s.jpg');?>')no-repeat center;
                    background-size:cover;background-position:center;">
                    </div>
                    <div class="user_name text-center">
                        <p>筋太郎さん</p>
                    </div>
                <!-- Button trigger modal -->
                    <div class="text-center">
                        <button type="button" class="btn new-primary" data-toggle="modal" data-target="#exampleModal">
                        プロフィール編集>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">プロフィール編集</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label class="control-label">肉ネーム</label>
                          <input class="form-control" type="text" value="筋太郎">
                      </div>
                      <div class="form-group">
                          <label class="control-label">紹介文</label>
                          <input class="form-control" type="text" value="週にで筋トレ。目指せ細マッチョ！">
                      </div>
                      <div class="form-group">
                          <label class="control-label">マッチョ区分</label>
                          <div class="radio">
                              <label><input type="radio" name="radio" checked>細マッチョ</label>
                              <label><input type="radio" name="radio" >マッチョ</label>
                              <label><input type="radio" name="radio" >ゴリマッチョ</label>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label">ID</label>
                          <input class="form-control" type="text" value="techis@techis.com">
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn new-primary">Save</button>
                  </div>
                </div>
            </div>
            </div>
            <!-- Modal -->
            <!-- 写真一覧 -->
            <div class="mypage">
                <img class="mypage-img" src="<?php echo base_url('/img/45196_s.jpg');?>" alt="usename.1">
                <img class="mypage-img" src="<?php echo base_url('/img/45198_s.jpg');?>" alt="usename.2">
                <img class="mypage-img" src="<?php echo base_url('/img/45204_s.jpg');?>" alt="usename.3">
                <img class="mypage-img" src="<?php echo base_url('/img/45211_s.jpg');?>" alt="usename.4">
                <img class="mypage-img" src="<?php echo base_url('/img/45212_s.jpg');?>" alt="usename.5">
                <img class="mypage-img" src="<?php echo base_url('/img/45217_s.jpg');?>" alt="usename.6">
            </div>
            <!-- 写真一覧 -->
        </form>        
    </body>