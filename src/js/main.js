$(document).ready(function(){

let nav = 0;    
    $(".btnNav").on("click", function(){
        if(nav == 0){
            
            $(".navOpt").animate({
                right: '0px'
            },200);
        
            nav = 1;
        } 
        else 
        {
            
            $(".navOpt").animate({
                right: '-200px'
            },400);
            
            nav = 0;
        }
    });
});