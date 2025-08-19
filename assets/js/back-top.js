$(document).ready(function() {
    $(window).scroll(function() {
        // alert('Nguyen Ngoc uy')
        // console.log( $('.list-contact-icon-box'));
        if ($(this).scrollTop()) {
            $('.list-contact-icon-box').css("transform", "translateX(0px)");
            $('.list-contact-icon-box').css("transition", "all ease-in-out 0.3s");
            $('#backTop').fadeIn();
        } else {
            $('#backTop').fadeOut();
            $('.list-contact-icon-box').css("transition", "all ease-in-out 0.3s");
            $('.list-contact-icon-box').css("transform", "translateX(-100px)");
            
        }
    });
    $('#backTop').click(function() {
        $('html , body').animate({
            scrollTop: 0
        }, 2000);
    });
});