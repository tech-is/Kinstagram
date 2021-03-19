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
                            // html +=`<form method='post' action='/kinsta/onlyMypage' name='iconNameButton'><input type='hidden' name='userId' value="${data.message[n].user_id}
                            
                            // html += "<div class='serchnameBox'><input type='submit' class='innerName' value='" + data.message[n].user_name + "'></div></form>";
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
                    document.getElementById(`openMember${i}`).dataset.value =  data.message[i].mussleMemberAddOrDelete;

                }
            })
            .catch(error => {
                // console.log('Error:', error);
                return null
            });
            // console.log(json);
        }
        postData('/kinsta/memberChange',{loginId:loginUserId});
});





    // fetch("/kinsta/memberChange",{
    //         method:'POST',
    //         headers:{
    //             'Content-Type': 'application/json',
    //         },
    //         body:JSON.stringify(data),
    //     })
    // .then(function (res){
    //     return res.json();
    // })
    // .then(function(users){
    //     let dome = "/img/"
    //     for(let i = 0; i < 5; i++ ){
    //         document.getElementsByClassName('recommended')[i].src = dome + users.message[i].profile_image;
    //         document.getElementsByClassName('a_name')[i].innerHTML = users.message[i].user_name;
    //     }
    // });





//マッスルメンバ追加
// const onMussleMember = document.querySelectorAll('.addMassuleMember');
// for(let i = 0; i < onMussleMember.length; i++){
//         onMussleMember[i].addEventListener('click',()=>{
//             let userId = onMussleMember[i].getAttribute('data-value');
//             let loginUserId = onMussleMember[i].getAttribute('data-myid');
//             // console.log(loginUserId);
//             $.ajax({
//                 type: 'POST',
//                 url: '/kinsta/addMember',
//                 data: {
//                     uI:userId,
//                     mU:loginUserId
//                 },
//                 dataType: 'json'
//                 })
//             .done(
//             function(data) {
//                 alert(data.message);
//         }).fail(
//         function() {
//             alert('検索に失敗しました');
//         });
//     });
// }
    


// const onMussleMember = document.querySelectorAll('.addMassuleMember');
// for(let i = 0; i < onMussleMember.length; i++){
    // onMussleMember[0].addEventListener('click',()=>{
    //     let s = onMussleMember[0].getAttribute('data-value');
    //     var formData = new FormData();
    //     formData.append('key', 2);
    // fetch('/kinsta/addMember',{
    //     method:'POST',
    //     body:formData,
    //     headers: {
            // 'Content-Type': 'application/json',
    
            // "Content-Type": "application/x-www-form-urlencoded"
    //       },
        
    // })
    // .then(response => response.json())
    // .then(data => {
    //     // console.log(data.message);
    //     alert(data.message);
    //   })
    //   .catch((error) => {
    //     alert('Error:', error);
    //   });
    
    
    // });
// }
//マッスルメンバ追加
const onMussleMember = document.querySelectorAll('.addMassuleMember');
for(let i = 0; i < onMussleMember.length; i++){
        onMussleMember[i].addEventListener('click',()=>{
            let userId = onMussleMember[i].getAttribute('data-value');
            let loginUserId = onMussleMember[i].getAttribute('data-myid');
            // console.log(loginUserId);
            $.ajax({
                type: 'POST',
                url: '/kinsta/addMember',
                data: {
                    uI:userId,
                    mU:loginUserId
                },
                dataType: 'json'
                })
            .done(
            function(data) {
                alert(data.message);
        }).fail(
        function() {
            alert('検索に失敗しました');
        });
    });
}

//fetchマッスルメンバー追加
// const onMussleMember = document.querySelectorAll('.addMassuleMember');
// for(let i = 0; i < onMussleMember.length; i++){
//     onMussleMember[i].addEventListener('click',()=>{
        
//         let userId = onMussleMember[i].getAttribute('data-value');
//         let loginUserId = onMussleMember[i].getAttribute('data-myid');

        // const data = {memberUserId:11};
        // fetch('/kinsta/addMember',{
        //     method:'POST',
        //     headers:{
        //         'Content-Type': 'application/json',
        //     },
        //     body:JSON.stringify(data),
        // })
        // .then(response => response.json())
        // .then(data => {
        // console.log('Success:', data.m);
        // })
        // .catch((error) => {
        // console.error('Error:', error);
        // })
//  });
// }

  



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
        
// promiseマッスルメンバー追加
// const onMussleMember = document.querySelectorAll('.addMassuleMember');
// for(let i = 0; i < onMussleMember.length; i++){
//     onMussleMember[i].addEventListener('click',()=>{
//         let userId = onMussleMember[i].getAttribute('data-value');
//         let loginUserId = onMussleMember[i].getAttribute('data-myid');

//         const getData = (url='',data={}) => {
//             return new Promise((resolve,reject)=>{
//                 fetch(url,{
//                     method:'POST',
//                             headers:{
//                                 'Content-Type': 'application/json'
//                             },
//                             body: JSON.stringify(data)
//                 }).then(response =>{
//                     // console.log(response);
//                     return response.json();
//                 }).then(data => {
//                     // console.log(data.message);
//                     return resolve(data.message);
//                 }).catch((error) => {
//                     console.log('Error:', error);
//                     return reject(null);
//                 });
//             });
//         }

//         getData('/kinsta/addMember',{memberUserId:userId,loginId:loginUserId}).then(data=>{
//             console.log(data);
//         })
//     });
// }






//６００以上の時モーダル
// {
//     const openMember1 = document.getElementById('openMember1');
//     const modalMember1 = document.getElementById('modalMember1');
//     const memberPostFollowPicture = document.getElementsByClassName('memberPostFollowPicture');
    
    
    

//     openMember1.addEventListener('mouseenter',()=>{
//         modalMember1.classList.remove('hidden');
//             for(let i = 0; i < 5 ; i++){
//                 let listi = document.createElement('li');
//                 memberPostFollowPicture[0].appendChild(listi);
//                 switch(i){
//                     case 0:
//                         listi.innerHTML = toreni.list.toreni[0].post;
//                         break;
//                     case 1:
//                         listi.innerHTML = toreni.list.toreni[0].follower;
//                         break;
//                     case 2:
//                         listi.innerHTML = toreni.list.toreni[0].follow;
//                         break;
//                     case 3:
//                         let imgi = document.createElement('img');
//                         imgi.classList.add('followMemberPicture21');
//                         imgi.src = toreni.list.toreni[0].images[0].image;
//                         listi.appendChild(imgi);
//                         break;
//                     case 4:
//                         listi.innerHTML = toreni.list.toreni[0].images[1].image2;
//                         break;
//                 }
//             }

//     });

//     openMember1.addEventListener('mouseleave',()=>{
//         modalMember1.classList.add('hidden');
//     });
// }

// {
//     const openMember2 = document.getElementById('openMember1');
//     const modalMember2 = document.getElementById('modalMember1 ');

//     openMember2.addEventListener('mouseenter',()=>{
//         modalMember2.classList.remove('hidden');
//     });

//     openMember2.addEventListener('mouseleave',()=>{
//         // modalMember2.classList.add('hidden');
//     });
// }
// {
//     const openMember3 = document.getElementById('openMember1');
//     const modalMember3 = document.getElementById('modalMember1');

//     openMember3.addEventListener('mouseenter',()=>{
//         modalMember3.classList.remove('hidden');
//     });

//     openMember3.addEventListener('mouseleave',()=>{
//         modalMember3.classList.add('hidden');
//     });
// }
// {
//     const openMember4 = document.getElementById('openMember1');
//     const modalMember4 = document.getElementById('modalMember1');

//     openMember4.addEventListener('mouseenter',()=>{
//         modalMember4.classList.remove('hidden');
//     });

//     openMember4.addEventListener('mouseleave',()=>{
//         modalMember4.classList.add('hidden');
//     });
// }
// {
//     const openMember5 = document.getElementById('openMember1');
//     const modalMember5 = document.getElementById('modalMember1');

//     openMember5.addEventListener('mouseenter',()=>{
//         modalMember5.classList.remove('hidden');
//     });

//     openMember5.addEventListener('mouseleave',()=>{
//         modalMember5.classList.add('hidden');
//     });
// }










   


    //おすすめトレーニー入れ替え
    // let otherMemberChange = document.getElementById("otherMemberChange");
    // otherMemberChange.addEventListener('click',() => {

       
    //     const iconNew1 = document.getElementById('icon1');
    //     iconNew1.src = toreni.list.toreni[0].images[0].image;
    //     const openMember1 = document.getElementById('openMember1');
    //     openMember1.textContent = toreni.list.toreni[0].name;
        
    //     const iconNew2 = document.getElementById('icon2');
    //     iconNew2.src = images[1];
    //     const openMember2 = document.getElementById('openMember2');
    //     openMember2.textContent = names[1];
        
    //     const iconNew3 = document.getElementById('icon3');
    //     iconNew3.src = images[2];
    //     const openMember3 = document.getElementById('openMember3');
    //     openMember3.textContent = names[2];

    //     const iconNew4 = document.getElementById('icon4');
    //     iconNew4.src = images[3];
    //     const openMember4 = document.getElementById('openMember4');
    //     openMember4.textContent = names[3];

    //     const iconNew5 = document.getElementById('icon5');
    //     iconNew5.src = images[4];
    //     const openMember5 = document.getElementById('openMember5');
    //     openMember5.textContent = names[4];
    // });



  



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
            console.log(lastList);
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


  

    



    
    window.addEventListener('load', function () {
        
        
        
        
        //メンバー解除
            const onMM = document.querySelectorAll('.addMassuleMember');
        
                    
                    for(let i = 0; i < onMM.length; i++){
                        let userId = onMM[i].getAttribute('data-value');
                        let loginUserId = onMM[i].getAttribute('data-myid');
                        // console.log(userId);
                       
                        $.ajax({
                            type: 'POST',
                            url: '/kinsta/addOrDelete',
                            data: {memberUserId:userId,loginId:loginUserId},
                            dataType: 'json'
                            })
                            .done(
                            function(data) {
                            if(data.alreadyAdd){
                                console.log(data.alreadyAdd);
                                document.getElementById(`openMember${i}`).innerHTML = data.alreadyAdd;
                            }else{
                                document.getElementById(`openMember${i}`).innerHTML = data.add;
                            }
                            }).fail(
                            function () {
                                    // alert('検索に失敗しました');
                                })
                    
                    
                    }
           
        
                    // const postData = async(url='',data={}) => {
                    //     await fetch(url,{
                    //         method:'POST',
                    //         headers:{
                    //             'Content-Type': 'application/json; charset=UTF-8'
                    //         },
                    //         body: JSON.stringify(data)
                    //     })
                    //     .then(response => {
                    //         return response.json()
                    //     })
                    //     .then(data =>{
                    //         console.log(data);
                    //         if(data.alreadyAdd){
                    //             document.getElementById(`openMember${i}`).innerHTML = "メンバー解除";
                    //         }else{
                    //             console.log(data);
                    //         }
                    //     })
                    //     .catch(error => {
                    //         // console.log('Error:', error);
                    //         return null
                    //     });
                    //     // console.log(json);
                    // }
                    // console.log(userId);
                    // postData('/kinsta/addOrDelete',{memberUserId:userId,loginId:loginUserId});     
                




        
        

        
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
     
        if(innerWidth <= 900){
            // asideToreni[0].style.width = "none";
            // console.log("リロードwidth");
            // asideToreni[0].style.position = "fixed";
            // let top =iti[0].top;
            // asideToreni[0].style.top = `${Number(top) }px`;

        }

        
        //ロード時、トレーニ10選に読込
        if(innerWidth <= 500){
            const iconUnderRoad500 = document.getElementsByClassName("icon5001");
            const nameUnderroad500 = document.getElementsByClassName("nameFollowFollower");
            const followerUnderroad500 = document.getElementsByClassName("followerNumber");
            for(let i = 0; i < 10 ; i++){
                // iconUnderRoad500[i].src = toreni.list.toreni[i].images[0].image;
                // nameUnderroad500[i].innerHTML = toreni.list.toreni[i].name;
                // followerUnderroad500[i].innerHTML = toreni.list.toreni[i].follower; 
            }
        }
        //     if(innerWidth > 500){
        //         下タブ除去
        //         const underTab = document.getElementsByClassName("underTab");
        //         let lastList = underTab[0].lastElementChild;
        //         let lastLastList = lastList.lastElementChild;
        //     if(lastList.classList.contains("newFollow500")){
        //         lastLastList.remove();
        //         lastList.remove();
        //         console.log(lastList);
        //     }

        // }
        
    });



//     const scroll = document.querySelectorAll('.scroll')
//     const clientHeight = document.documentElement.clientHeight;

    
//     scroll.forEach(elm => {
       
        // console.log(bodyScroll.scrollTop);
        // console.log(bodyScroll.clientHeight);
        // console.log(bodyScroll.scrollHeight);
        
        
            // if (imgArray[slideNo].src == '') { //未ロード画像はロードする
            //     imgArray[slideNo].src = imgArray[slideNo].dataset.src;
            // }
            window.onscroll = function () {
                
                // readSlide('.scroll img');

                // function readSlide(className,slideNo = 0 )
                // {
                    // let imgArray = document.getElementsByClassName('scroll')[0].getElementsByTagName('li');
                
                    
                
                    // slideNo++;
                    
//                     if (bodyScroll.scrollTop + bodyScroll.clientHeight >= bodyScroll.scrollHeight*0.8) {
                        // スクロールが末尾に達した
//                         ;
                        // console.log(slides);
                        // if (parseInt(elm.dataset.lastnum) < parseInt(elm.dataset.max)) {
                            // 未ロードの画像がある場合
                            
                        //     if (imgArray[slideNo].src == '') { //未ロード画像はロードする
                        //     imgArray[slideNo].src = imgArray[slideNo].dataset.src;
                        // }
                            
                        //  }
//                     elm.dataset.lastnum = parseInt(elm.dataset.lastnum) + 1;
//                     let img = document.createElement('img');
                    // console.log(img);

//                     img.src = "/assets/kinsta_img/" + [elm.dataset.lastnum] +'.jpg';
                    // console.log(img.src);
//                     elm.appendChild(img);
                

                    
//                     }
                // };
                const mainP = document.getElementById("mainPicture");
                const asideToreni = document.getElementsByClassName("asideToreni");
                const iti = mainP.getClientRects();
                let right =iti[0].right;
                
                if(innerWidth<=500){
                  
                }
                asideToreni[0].style.left = `${Number(right) }px`;
                asideToreni[0].style.position = "fixed";
                const clientWidth = document.documentElement.clientWidth;
                
               
                
                if(innerWidth <= 900){
                    asideToreni[0].style.width = "22.5%";
                }else{
                asideToreni[0].style.width = "18%";
                }
                // console.log("スクロール");
            }
    });


    window.addEventListener( 'resize', function() {
        // const aside = document.getElementsByClassName("asideToreni")[0];
        // if(aside){
            
        //     aside.classList.remove("asideToreni");
        // }
        const mainP = document.getElementById("mainPicture");
        const asideToreni = document.getElementsByClassName("asideToreni");
        const iti = mainP.getClientRects();
        let right =iti[0].right;
        // let top = iti[0].top;

        let mainStyle = {
            position:"fixed",
            top: "87px",
            left: right+ "px"
        }

        asideToreni[0].style.left = `${Number(right) }px`;
        // asideToreni[0].style.top = `${Number(top) }px`;
        // asideToreni.classList.add(mainStyle)
        
        // for(let prop in mainStyle){
        //     mainP[prop] = mainStyle[prop];
            
        // }
        if(innerWidth >= 499){
            // const followToreni = document.getElementsByClassName("followToreni");
            // const len= followToreni.length;
            // for(let i = 0; i < len; i++){
            //     followToreni[0].parentNode.removeChild(followToreni[0]);
            // }
            // console.log(followToreni[0]);
        }
        if(innerWidth <= 900){
            // asideToreni[0].style.width = "";
            // asideToreni[0].style.position = "fixed";
            // let top =iti[0].top;
            // asideToreni[0].style.top = `${Number(top) }px`;
            // console.log("リサイズ22");
        }else{
        // asideToreni[0].style.width = "";
        console.log("リサイズ18");
        

        }

    // 500以下下タブにおすすめトレーニー配置。
        if(innerWidth <= 500){
            console.log("リサイズ500");
            const underTab = document.getElementsByClassName("underTab");
            let lastList = underTab[0].lastElementChild;
            // console.log(lastList.classList.contains("last"));

            // if(!lastList.classList.contains("newFollow500")){
            
        
            
            // const followToreni = document.getElementsByClassName("followToreni");

            
            
            
            // let alist = document.createElement('a');
            // let inputList = document.createElement('input');
            
            // let navList = document.createElement('nav');
            // let ulList = document.createElement('ul');
            // navList.classList.add('followUnderNav');
            // ulList.classList.add('ul500');
            // navList.appendChild(ulList);
            // let a = 0;
            // for(let i=1;i<11;i++){
            //     let listi = document.createElement('li');
                
            //     listi.classList.add(`followMember${i}`)
            //     ulList.appendChild(listi);
            //     console.log(i);
                
            //     for(let j=1; j<5;j++){
                    
            //         switch(j){
            //             case 1:
            //                 let divListj = document.createElement('div');
            //                 listi.appendChild(divListj);
            //                 divListj.classList.add(`iconDiv500${j}`);
            //                 let imgList1 = document.createElement('img');
            //                 imgList1.classList.add(`icon500${j}`);
            //                 imgList1.src = toreni.list.toreni[a].images[0].image;
            //                 divListj.appendChild(imgList1);
            //                 let ulList1 = document.createElement('ul');
            //                 divListj.appendChild(ulList1);
            //                 ulList1.classList.add('followerFollowUl');
            //             for(let p=0;p<2;p++){
            //                     let listp = document.createElement('li');
            //                     ulList1.appendChild(listp);
            //                     switch(p){
            //                         case 0:
            //                             listp.classList.add('nameFollowFollower');
            //                             break;
            //                         case 1:
            //                             listp.classList.add('followerNumber');
            //                             break;
            //                     }
            //                 }
            //                 break;
            //             case 2:
            //                 // divListj.classList.add('followerFollow500');
            //                 // divListj.appendChild(ulList1);
                            
            //                 break;
            //             case 3:
            //                 // divListj.classList.add('myPicture1');
            //                 break;
            //             case 4:
            //                 // divListj.classList.add('myPicture2');
            //                 break;
            //         }
            //     }
            //     a++;
            // }
            
            
            
            
            
            // inputList.type = 'checkbox';
            // inputList.id = 'followUnder';
            // let labelList = document.createElement('label');
            // // let labelList2 = document.createElement('label');
            // let labelList3 = document.createElement('label');
            // labelList.htmlFor = "followUnder";
            // // labelList2.htmlFor = "followUnder";
            // labelList3.htmlFor = "followUnder";
            // labelList.classList.add('openUnderFollow');
            // // labelList.classList.add('openUnderFollow');
            // labelList3.classList.add('closeUnderFollow');
            
            
            
            
            // console.log(inputList);
            // labelList.innerHTML = "おすすめトレーニー";
            
            
            
            
            // alist.classList.add('aNewFollow500');
            // alist.appendChild(inputList);
            // alist.appendChild(labelList);
            // alist.appendChild(labelList3);
            // alist.appendChild(navList);
            // let list2 = document.createElement('li');
            // list2.appendChild(alist);
            // list2.classList.add('newFollow500');
            // console.log(list2);
            // underTab[0].appendChild(list2);
            
            // let nameFollowFollower = document.getElementsByClassName("nameFollowFollower");
            // // let followNumber = document.getElementsByClassName("followNumber");
            // let followerNumber = document.getElementsByClassName("followerNumber");
            // for(let o =0; o < nameFollowFollower.length; o++){
            //     nameFollowFollower[o].innerHTML = toreni.list.toreni[o].name;
            //     followerNumber[o].innerHTML = "マッスルメンバー数:"+toreni.list.toreni[o].follower;
                

            // }
            

            
            // }
        }
            
            // if(innerWidth >= 501){

            //     const underTab = document.getElementsByClassName("underTab");
            //     let lastList = underTab[0].lastElementChild;
            //     let lastLastList = lastList.lastElementChild;
            // if(lastList.classList.contains("newFollow500")){
            //     lastLastList.remove();
            //     lastList.remove();
            //     console.log(lastList);
            // }
                
            

            // }

    });

    
    

    





    // navアコーディオン
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
            
            console.log(this);
            for(let i = 0; i<detailContent.length; i++ ){
            detailContent[i].classList.toggle('isOpenRankUnderThree');
            }

            console.log("toggle2");
        }
        detailMenu[0].addEventListener('click',toggle2);
    }

    




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

