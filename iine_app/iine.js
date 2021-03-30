// マイページのモーダル内メッセージ、トレーニング、メニュー表示
onst myImageClass = document.querySelectorAll('.myImageClass');
for(let i = 0; i < myImageClass.length; i++){
  myImageClass[i].addEventListener('click',()=>{
    const fhotoNo = myImageClass[i].getAttribute('data-no');
    document.getElementById('post-img').setAttribute('data-no',fhotoNo);
    document.getElementById('post-img').setAttribute('alt',fhotoNo);
    const fhotoPass = document.getElementById(`myImage${i}`).getAttribute('src',);
    document.getElementById('post-img').setAttribute('src',fhotoPass);
    const fileName = fhotoPass.replace('/img/','');
    const sendData = async(url='',data={}) => {
      await fetch(url,{
        method:'POST',
        headers:{
          'Content-Type': 'application/json; charset=UTF-8'
        },
        body:JSON.stringify(data)
      })
      .then(response => {
        return response.json()
      })
      .then(data => {
        document.getElementById('messageData').innerHTML = data.message.post_message;
        document.getElementById('menuData').setAttribute("value",data.message.mymenu);
        document.getElementById('traningData').setAttribute("value",data.message.mytraining);
      })
      .catch(error => {
        return null;
      });
    }
    sendData('/kinsta/getMessageMenuTraning',{fName:fileName})
  });
}


$(function () {
  'use strict';

  var thanks = false; // お礼メッセージを出す場合はtrue、出さない場合はfalse
  var folderpath = '/';
  // iine_appフォルダが入っているパスを、ドメイン名以下から記入してください。
  // 下記の例に従ってください。
  // var folderpath = '/'; --- http://example.com/iine_app/の場合
  // var folderpath = '/site/'; --- http://example.com/site/iine_app/の場合
  // var folderpath = 'site/folder/' --- http://example.com/site/folder/iine_app/の場合

  ////// ここから下のエリアには変更を加えないでください ///////

  var count = document.getElementById('countnum');
  var iine = document.getElementById('iine');
  var iineWrap = document.getElementById('iine_wrap');
  var iineThanks = document.getElementById('iine_thanks');
  // var countNum = count.textContent;
  var pathname = location.href;

  var ajaxPath = `${location.protocol}//${location.host}${folderpath}iine_app/_ajax.php`;

  var fadeout = function () {
    setTimeout(function () {
      iineThanks.classList.add('fadeout');
    }, 6000);
    setTimeout(function () {
      iineThanks.style.display = "none";
      iineThanks.classList.remove('fadeout');
    }, 7000);
  }

  $(document).ready(function () {
    if (localStorage.getItem(pathname) == 'checked') {
      iineWrap.className = 'alreadychecked';
    }

    $.ajax({
      type: 'GET',
      url: ajaxPath,
      data: { path: pathname, mode: 'show' }
    }).fail(function () {
      alert('iine.jsのfolderpathの値を確認して下さい。');
    }).done(function (res) {
      // count.innerHTML = res;
    });
  });


  // update
  $(document).on('click', '#iine', function (e) {
    e.preventDefault();
    if (localStorage.getItem(pathname) == 'checked') {
      iineWrap.className = '';
      localStorage.removeItem(pathname);
      // ajax処理
      $.post(ajaxPath, {
        path: pathname,
        mode: 'uncheck'
      }).fail(function () {
        alert('iine.jsのfolderpathの値を確認して下さい。');
      }).done(function (res) {
        count.innerHTML = res;
      });
    } else {
      iineWrap.className = 'checked';
      if (thanks === true) {
        iineThanks.style.display = "block";
        fadeout();
      }
      localStorage.setItem(pathname, 'checked');
      // ajax処理
      $.post(ajaxPath, {
        path: pathname,
        mode: 'check'
      }).fail(function () {
        alert('iine.jsのfolderpathの値を確認して下さい。');
      }).done(function (res) {
        count.innerHTML = res;
      });
    }
  });
});
