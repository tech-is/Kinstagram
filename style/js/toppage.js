'use strict';
//検索
$("#keyword").on('keyup', () => {
    let input = $("#keyword").val();
    $.ajax({
            type: 'POST',
            url: '/kinsta/serch',
            data: {serchText:input},
            dataType: 'json'
            })
            .done(
            function(data) {
            $(".serchBox").empty();
            if (data.length !==0) {
                    if(!input.trim()){
                        let serchBox = document.getElementById('serchResult');
                        serchBox.classList.add('hiddenSerch');
                    }else{
                        let serchBox = document.getElementById('serchResult');
                        serchBox.classList.remove('hiddenSerch');
                    
                        var html = "";
                        for(let n = 0; n< data.message.length; n++){
                            html +="<div class=iconNameBox>";
                            html +=`<a href="/kinsta/onlyMypage?userId=${data.message[n].user_id}" class="aInner">`
                            html +="<div class='serchiconBox'><span class='innerName'><img class='serchIconProfile' src=/img/" + data.message[n].profile_image + "></span></div>";
                            html += "<div class=serchnameBox>" + data.message[n].user_name + "</div>";
                            html +="</a></div>"
                        }
                        $('#serchResult').get(0).innerHTML = html;
                    }
            }else{
                $(".list").append("無し");
            }
            }).fail(
            function () {
                    alert('検索に失敗しました');
                })
});
//メンバーチェンジ
document.getElementById('otherMemberChange').addEventListener('click',()=>{
    const onMussleMember = document.querySelectorAll('.addMassuleMember');
    let loginUserId = onMussleMember[0].getAttribute('data-myid');
    console.log(loginUserId);
        const postData = async(url='',data={}) => {
            await fetch(url,{
                method:'POST',
                headers:{
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                return response.json()
            })
            .then(data =>{
                    console.log(data.message);
                let dome = "/img/"
                for(let i = 0; i < 5; i++ ){
                   
                    document.getElementsByClassName('recommended')[i].src = dome + data.message[i].profile_image;
                    document.getElementsByClassName('a_name')[i].innerHTML = data.message[i].user_name;
                    document.getElementById(`openMember${i}`).innerHTML =  data.message[i].mussleMemberAddOrDelete;
                    document.getElementById(`openMember${i}`).dataset.value =  data.message[i].user_id;
                }
            })
            .catch(error => {
                return null
            });
        }
        postData('/kinsta/memberChange',{loginId:loginUserId});
});
//マッスルメンバー追加
const onMussleMember = document.querySelectorAll('.addMassuleMember');
for(let i = 0; i < onMussleMember.length; i++){
    onMussleMember[i].addEventListener('click',()=>{
        let userId = onMussleMember[i].getAttribute('data-value');
        let loginUserId = onMussleMember[i].getAttribute('data-myid');
        const postData = async(url='',data={}) => {
            await fetch(url,{
                method:'POST',
                headers:{
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                return response.json()
            })
            .then(data =>{
                document.getElementById(`openMember${i}`).innerHTML =  data.message;
                console.log(data.message);
            })
            .catch(error => {
                // console.log('Error:', error);
                return null
            });
            // console.log(json);
        }
        postData('/kinsta/addMember',{memberUserId:userId,loginId:loginUserId});
    });
}
//メッセージ、メニュー、トレーニングをモーダルに表示
const listImage = document.querySelectorAll('.listImage');
for(let i = 0; i < listImage.length; i++){
  listImage[i].addEventListener('click',()=>{
    const fhotoNo = listImage[i].getAttribute('data-no');
    document.getElementById('list-img').setAttribute('data-no',fhotoNo);
    document.getElementById('list-img').setAttribute('alt',fhotoNo);
    const fhotoPass = document.getElementById(`listImage${i}`).getAttribute('src');
    document.getElementById('list-img').setAttribute('src',fhotoPass);
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
        document.getElementById('postNameData').innerHTML = data.message.user_name;
        document.getElementById('topMessageData').innerHTML = data.message.post_message;
        document.getElementById('topMenuData').innerHTML = data.message.mymenu;
        document.getElementById('topTraningData').innerHTML = data.message.mytraining;
        document.getElementById('topPostUserId').setAttribute("data-userId",data.message.user_id);
        document.getElementById('list-img').setAttribute("data-postid",data.message.post_id);
      })
      .catch(error => {
        return null;
      });
    }
    sendData('/kinsta/getMessageMenuTraning',{fName:fileName})
  });
}
//キレてます表示した時
const listImage2 = document.querySelectorAll('.listImage');
for(let i = 0; i < listImage2.length; i++){
    listImage2[i].addEventListener('click',(e) => {
            document.getElementById('countBox1').innerHTML = 0;
            document.getElementById('countBox2').innerHTML = 0;
            document.getElementById('countBox3').innerHTML = 0;
            document.getElementById('countBox4').innerHTML = 0;
            document.getElementById('countBox5').innerHTML = 0;
            document.getElementById('countBox6').innerHTML = 0;
            const fhotoPass = document.getElementById(`listImage${i}`).getAttribute('src');
            const fileName = fhotoPass.replace('/img/','');
            console.log(fileName);
                const postData = async(url='',data={}) => {
                    await fetch(url,{
                        method:'POST',
                        headers:{
                            'Content-Type': 'application/json; charset=UTF-8'
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => {
                        return response.json()
                    })
                    .then(data =>{
                        for(let n = 0; n < 6; n++){
                            if(data.message[n].favorite_pattern == 1){
                                console.log(data.message[n].count+'です。');
                                document.getElementById('countBox1').innerHTML = data.message[n].count;
                            }else if(data.message[n].favorite_pattern == 2){
                                document.getElementById('countBox2').innerHTML = data.message[n].count;
                            }else if(data.message[n].favorite_pattern == 3){
                                document.getElementById('countBox3').innerHTML = data.message[n].count;
                            }else if(data.message[n].favorite_pattern == 4){
                                document.getElementById('countBox4').innerHTML = data.message[n].count;
                            }else if(data.message[n].favorite_pattern == 5){
                                document.getElementById('countBox5').innerHTML = data.message[n].count;
                            }else if(data.message[n].favorite_pattern == 6){
                                document.getElementById('countBox6').innerHTML = data.message[n].count;
                            }
                        }
                    })
                    .catch(error => {
                        return null
                    });
                }
                postData('/kinsta/kiretemasuFirst',{fileName:fileName});
            });
}
//キレてます押した時
const goodBtn = document.querySelectorAll('.good-btn-icon');
for(let i = 0; i < goodBtn.length; i++){
    goodBtn[i].addEventListener('click',()=>{
        const kireType = goodBtn[i].getAttribute('data-value');
        const loginUserId = goodBtn[i].getAttribute('data-loginUserId');
        const postId = document.getElementById('list-img').getAttribute('data-postid');
        const postData = async(url='',data={}) => {
            await fetch(url,{
                method:'POST',
                headers:{
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                return response.json()
            })
            .then(data =>{
                console.log(data.message);
                for(let n = 0; n < data.message.length; n++){
                    if(data.message[n].favorite_pattern == 1){
                        document.getElementById('countBox1').innerHTML = data.message[n].count;
                    }else if(data.message[n].favorite_pattern == 2){
                        console.log(data.message[n].count);
                        document.getElementById('countBox2').innerHTML = data.message[n].count;
                    }else if(data.message[n].favorite_pattern == 3){
                        document.getElementById('countBox3').innerHTML = data.message[n].count;
                    }else if(data.message[n].favorite_pattern == 4){
                        document.getElementById('countBox4').innerHTML = data.message[n].count;
                    }else if(data.message[n].favorite_pattern == 5){
                        document.getElementById('countBox5').innerHTML = data.message[n].count;
                    }else if(data.message[n].favorite_pattern == 6){
                        document.getElementById('countBox6').innerHTML = data.message[n].count;
                    }
                }
            })
            .catch(error => {
                return null
            });
        }
        postData('/kinsta/kiretemasuClick',{loginUserId:loginUserId,postId:postId,kireType:kireType});
    });
}
//下タブにおすすめトレーニー作成
if(innerWidth <= 500){
    console.log("ロード500");
    const underTab = document.getElementsByClassName("underTab");
    let lastList = underTab[0].lastElementChild;
    if(!lastList.classList.contains("newFollow500")){
    const followToreni = document.getElementsByClassName("followToreni");
    let followToreniText = followToreni[0].textContent;
    const underTab = document.getElementsByClassName("underTab");
    let list = document.createElement('li');
    let alist = document.createElement('a');
    alist.innerHTML = followToreniText;
    list.appendChild(alist);
    list.classList.add('newFollow500');
    alist.classList.add('aNewFollow500')
    underTab[0].appendChild(list);
    }
}
//下タブからおすすめトレーニー除去
    if(innerWidth >= 501){
        const underTab = document.getElementsByClassName("underTab");
        let lastList = underTab[0].lastElementChild;
        let lastLastList = lastList.lastElementChild;
        if(lastList.classList.contains("newFollow500")){
            lastLastList.remove();
            lastList.remove();
        }
    }
    if(innerWidth<=500){
        let divList ="";
        const followToreni500 = document.getElementsByClassName('followToreni500');
        function toggle3(){
            console.log("無し");
                if(!document.getElementsByClassName("followToreniOpen")[0]){
                const asideUl = document.getElementsByClassName('asideUl');
                const headerList = document.getElementsByTagName('header');
                divList = document.createElement('div');
                headerList[0].appendChild(divList);
                divList.appendChild(asideUl[0]);
                divList.classList.toggle("followToreniOpen");
                }else{
                    divList.classList.toggle("followToreniOpen");
                    console.log("あり");
                }
        }
    }
//メンバー解除
    window.addEventListener('load', function () {
            const onMM = document.querySelectorAll('.addMassuleMember');
                    for(let i = 0; i < onMM.length; i++){
                        let userId = onMM[i].getAttribute('data-value');
                        let loginUserId = onMM[i].getAttribute('data-myid');
                        $.ajax({
                            type: 'POST',
                            url: '/kinsta/addOrDelete',
                            data: {memberUserId:userId,loginId:loginUserId},
                            dataType: 'json'
                            })
                            .done(
                            function(data) {
                            if(data.alreadyAdd){
                                document.getElementById(`openMember${i}`).innerHTML = data.alreadyAdd;
                            }else{
                                document.getElementById(`openMember${i}`).innerHTML = data.add;
                            }
                            }).fail(
                            function () {
                                })
                    }
        // data-srcを読み込む
        let picture = document.getElementsByClassName('picture');
        for(let i = 0; i < picture.length; i++){
            let pic = picture[i].getAttribute('data-src');
            picture[i].setAttribute("src",pic);
        }
        // おすすめトレーニの位置を調節
        const asideToreni = document.getElementsByClassName("asideToreni");
        const mainP = document.getElementById("mainPicture");
        const iti = mainP.getClientRects();
        let right =iti[0].right;
        let top =iti[0].top;
        asideToreni[0].style.left = Number(right)  +"px";
        //ロード時、トレーニ10選に読込
        if(innerWidth <= 500){
            const iconUnderRoad500 = document.getElementsByClassName("icon5001");
            const nameUnderroad500 = document.getElementsByClassName("nameFollowFollower");
            const followerUnderroad500 = document.getElementsByClassName("followerNumber");
        }
    });
    // おすすめトレーニ位置調節1
    const scroll = document.querySelectorAll('.scroll')
    const clientHeight = document.documentElement.clientHeight;
    scroll.forEach(elm => {
            window.onscroll =  () => {
                const mainP = document.getElementById("mainPicture");
                const asideToreni = document.getElementsByClassName("asideToreni");
                const iti = mainP.getClientRects();
                let right =iti[0].right;
                asideToreni[0].style.left = `${Number(right) }px`;
                asideToreni[0].style.position = "fixed";
                const clientWidth = document.documentElement.clientWidth;
                if(innerWidth <= 900){
                    asideToreni[0].style.width = "22.5%";
                }else{
                asideToreni[0].style.width = "18%";
                }
            }
    });
// おすすめトレーニ位置調節2
    window.addEventListener( 'resize', function() {
        const mainP = document.getElementById("mainPicture");
        const asideToreni = document.getElementsByClassName("asideToreni");
        const iti = mainP.getClientRects();
        let right =iti[0].right;
        let mainStyle = {
            position:"fixed",
            top: "87px",
            left: right+ "px"
        }
        asideToreni[0].style.left = `${Number(right) }px`;
    // 500以下下タブにおすすめトレーニー配置。
        if(innerWidth <= 500){
            const underTab = document.getElementsByClassName("underTab");
            let lastList = underTab[0].lastElementChild;
        }
    });
    // ランキングアコーディオンメニュー1
    if(innerWidth <= 900){
        const menu = document.querySelectorAll(".menu");
        function toggle() {
            const content = document.getElementsByClassName("contents");
            content[0].classList.toggle('isOpenRankUnder');
            content[1].classList.toggle('isOpenRankUnderTwo');
            const detailContent = document.getElementsByClassName("detailContents");
            if(detailContent[0].classList.contains('isOpenRankUnderThree')){
                console.log(detailContent[0].classList.contains('isOpenRankUnderThree'));
                for(let i = 0; i<detailContent.length; i++){
                detailContent[i].classList.toggle('isOpenRankUnderThree');
                }
            }
        }
        for (let i = 0; i < menu.length; i++) {
            menu[i].addEventListener("click", toggle);
        }
        const detailMenu = document.querySelectorAll(".detailMenu");
        function toggle2(){
            const detailContent = document.getElementsByClassName("detailContents");
            for(let i = 0; i<detailContent.length; i++ ){
            detailContent[i].classList.toggle('isOpenRankUnderThree');
            }
        }
        detailMenu[0].addEventListener('click',toggle2);
    }
// ランキングアコーディオン2
    if(innerWidth >= 900){
        const menu = document.querySelectorAll(".js-menu");
        function toggle() {
            const content = document.getElementsByClassName("contents");

            this.classList.toggle("is-active");
            
            for(let i = 0; i<content.length; i++ ){
                content[i].classList.toggle('is-open');
            }
            const detailContent = document.getElementsByClassName("detailContents");
            if(detailContent[0].classList.contains('is-open')){
                for(let i = 0; i<detailContent.length; i++ )detailContent[i].classList.toggle('is-open');
            }
        }
        for (let i = 0; i < menu.length; i++) {
            menu[i].addEventListener("click", toggle);
        }

        const detailMenu = document.querySelectorAll(".detailMenu");
        function toggle2(){
            const detailContent = document.getElementsByClassName("detailContents");
            this.classList.toggle("is-active");
            for(let i = 0; i<detailContent.length; i++ )detailContent[i].classList.toggle('is-open');
            }
        detailMenu[0].addEventListener('click',toggle2);

    }

