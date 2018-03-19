$(document).ready(function () {

    $(".barContRight").hide();
    //hover
    $(".barContLeft").on("mouseenter", function () {
        $(this).next().fadeToggle(120);
    });
    $(".barContLeft").on("mouseleave", function () {
        $(this).next().fadeToggle(70);
    });
    var panel = 0;
    //click
    $(".barContLeft").on("click", function () {

        $(this).prev().toggleClass("leftPanelActive");
        $(".barContAll").toggleClass("barContAllActive");
        $(".barContLeft").not(this).fadeToggle(50);

        //panel ON
        if (panel == 0) {
            $(this).append("<i class='fas fa-times iconFA ys'></i>");
            $(this).find(".nc").fadeOut(0);
            $(".barContRight").css({
                width: "0px",
                opacity: 0
            });
            $(this).css({
                borderTopRightRadius: "10px",
                borderBottomRightRadius: "10px"
            });

             $(".barContLeft").on("mouseenter", function () {
                $(this).next().children().css({
                    color: 'transparent'
                });
            });
            $(".barContLeft").on("mouseleave", function () {
                $(this).next().children().css({
                    color: 'transparent'
                });
            });
            
            panel = 1;

            //panel OFF    
        } else {
            $(this).find(".ys").hide(0);
            $(this).find(".nc").fadeIn(0);
            
            $(".barContRight").css({
                width: "100px",
                opacity: 1
            });
            
            $(this).css({
                borderTopRightRadius: "0px",
                borderBottomRightRadius: "0px"
            });
            
            $(".barContLeft").on("mouseenter", function () {
                $(this).next().children().css({
                    color: 'white'
                });
            });

            panel = 0;
        }
    });

});
