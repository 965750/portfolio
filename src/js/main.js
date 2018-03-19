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
    if ($(this).scrollTop() >= 200) {
        $(".banerCont").css({
            opacity: '0'
        });
    }
    $(window).on("scroll", function () {
        //banerTOP
        if ($(this).scrollTop() >= 200) {
            $(".banerCont").css({
                opacity: '-=.18'
            });
        } else if ($(this).scrollTop() == 0) {
            $(".banerCont").css({
                opacity: '1'
            });
        } else {
            $(".banerCont").css({
                opacity: '+=.5'
            });
        }
    });

    //contact me - validation

    var name = 0;
    var email = 0;

    $("#name").on("blur", function () {

        var nameVal = $("#name").val().length;

        if (nameVal <= 1) {
            $(".alertCont").text("Please provide Your Name");
        } else {
            name = 1;
            $(".alertCont").text("");
        }
    });
    $("#email").on("blur", function () {

        var emailVal = $("#email").val().length;
        if (emailVal <= 1) {
            $(".alertCont").text("Please provide valid email");
        } else if (name == 0) {
            $(".alertCont").text("Please provide Your Name");
        } else {
            $(".alertCont").text("");
            email = 1;
        }
    });
    $("#textA").on("blur", function () {

        var msgVal = $("#textA").val().length;
        if (msgVal <= 3) {
            $(".alertCont").text("Please give me some message");
        } else if (name == 0) {
            $(".alertCont").text("Please provide Your Name");
        } else if (email == 0) {
            $(".alertCont").text("Please provide valid email");
        } else {

            $("#contactSubmit").removeAttr("disabled");
            $(".alertCont").text("");
        }
    });
    // nav
    $("#home").on("click", function () {
        $("html ,body").animate({
            scrollTop: $("header").offset().top
        }, 1000, "swing");
    });
    $("#about").on("click", function () {
        $("html ,body").animate({
            scrollTop: $("#aboutCont").offset().top
        }, 1000, "swing");
    });
    $("#projects").on("click", function () {
        $("html ,body").animate({
            scrollTop: $(".projects").offset().top
        }, 1000, "swing");
    });
    $("#contact").on("click", function () {
        $("#menuBtn").trigger("click");
        setTimeout( function(){
            $("#mailBtn").trigger("click");    
        },400)
    });
});
