$(function(){
    $('a[href^="#"]').click(function(){
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });
    $window = $(window);
    $header = $('header');
    headerHeight = $header.height();
    $window.scroll(function(){
        scrollTop = $window.scrollTop();
        if(scrollTop > headerHeight){
            $header.addClass('fixed');
        } else {
            $header.removeClass('fixed');
        }
    });
    // if($(window).width() > 640) {
    //     $('.parent_nav').hover(function(){
    //         $(this).children('ul').slideDown(200);
    //     },function(){
    //         $(this).children('ul').slideUp(200);
    //     });
    // }
    $('.toggle_list > li h3').click(function(){
        $(this).toggleClass('open');
        $(this).next('.data').slideToggle(500);
    });
    $('#nav_button').append('<div>').append('<div>').append('<div>');
    $('#nav_button').click(function(){
        $('header').toggleClass('open');
        $('header nav').slideToggle();
    });
    
});