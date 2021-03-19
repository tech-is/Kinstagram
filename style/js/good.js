//いいね実装
const onMussleMember = document.querySelectorAll('.addMassuleMember');
for (let i = 0; i < onMussleMember.length; i++) {
    onMussleMember[i].addEventListener('click', () => {
        let userId = onMussleMember[i].getAttribute('data-value');
        let loginUserId = onMussleMember[i].getAttribute('data-myid');
        // console.log(loginUserId);
        $.ajax({
            type: 'POST',
            url: '/kinsta/iine',
            data: {
                uI: userId,
                mU: loginUserId
            },
            dataType: 'json'
        })
            .done(
                function (data) {
                    alert(data.message);
                }).fail(
                    function () {
                        alert('検索に失敗しました');
                    });
    });
}
