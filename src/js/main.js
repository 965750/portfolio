$(document).ready(function () {
    
    let nav = 0;
    $(".btnNav").on("click", function () {
        if (nav == 0) {

            $(".navOpt").animate({
                right: '0px'
            }, 200);

            nav = 1;
        } else {

            $(".navOpt").animate({
                right: '-200px'
            }, 400);

            nav = 0;
        }
    });
    if($(this).scrollTop() >= 200){
        $(".banerCont").css({
                opacity: '0'
            });
    }
    $(window).on("scroll", function(){
    //banerTOP
        if($(this).scrollTop() >= 200){
            $(".banerCont").css({
                opacity: '-=.18'
            });
        } else if($(this).scrollTop() == 0){
            $(".banerCont").css({
                opacity: '1'
            });
        }
        else {
            $(".banerCont").css({
                opacity: '+=.5'
            });
        }
    });
});
