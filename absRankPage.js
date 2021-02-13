// navアコーディオン
if(innerWidth <= 900){
    const menu = document.querySelectorAll(".menu");
    
    function toggle() {
        const content = document.getElementsByClassName("contents");
        console.log("toggle1");
        
        content[0].classList.toggle('isOpenRankUnder');
        content[1].classList.toggle('isOpenRankUnderTwo');

        const detailContent = document.getElementsByClassName("detailContents");
        // console.log(detailContent[0]);
        if(detailContent[0].classList.contains('isOpenRankUnderThree')){
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
        // this.classList.toggle("isOpenRankUnderThree");
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