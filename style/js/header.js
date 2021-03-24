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