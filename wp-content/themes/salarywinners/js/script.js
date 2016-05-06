jQuery(document).ready(function($) {

    var body = $("body, html");
    
    $(".back-to-top a").click(function() {
        var top = $(window).scrollTop();
            if(top!=0){
            body.animate({scrollTop :0}, '500',function(){});
    }
    return false;	
    });
    $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                            $(".back-to-top").fadeIn();
                    } else {
                            $(".back-to-top").fadeOut();
            }
    });

    $('#select-country, #select-category').select2();
    
    if(sw.notify != '' && sw.notify != 'undefined'){
        console.log(sw);
        $.notifyBar({
            cssClass: sw.notify.class,
            html: sw.notify.message,
            close: true,
            delay: 100000,
            closeOnClick: false
        });
        
    }
});
