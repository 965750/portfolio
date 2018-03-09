$(document).ready(function(){

var nav = 0;    
    $("#btnNav").on("click", function(){
        if(nav == 0){
            $(".triangleCont").animate({
                top: "-280px",
                right: "-280px"
            },400);
            
            $("#btnNav").animate({
                bottom: "155px",
                left: "155px"
            }, 400);
            
            nav = 1;
            
        } else if (nav == 1){
            $(".triangleCont").animate({
            top: "-350px",
            right: "-350px"
        },400);
            
            $("#btnNav").animate({
                bottom: "85px",
                left: "85px"
            }, 400);
            
            nav = 0;
        }
  
    })
});