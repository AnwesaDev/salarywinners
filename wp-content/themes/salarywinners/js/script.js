jQuery(document).ready(function($) {   

    var body = $("body, html");
    var top = body.scrollTop()
    $(".back-to-top a").click(function() {
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

    $("#navigaition button#btn-s-nav").click( function (){
            $("#navigaition ul").addClass("show-nav");
            $("#navigaition nav ul").removeClass("hiding-nav");
            $("#navigaition nav button#hide-nav").css("display", "block");
            $("#navigaition nav a.on-mobile").css("display", "block");
            return true;
    })
    $("#navigaition nav button#hide-nav").click( function (){
            $("#navigaition ul").addClass("show-nav");
            $("#navigaition nav ul").addClass("hiding-nav");
            $("#navigaition nav ul").removeClass("show-nav");
            $("#navigaition nav button#hide-nav").css("display", "none");
            $("#navigaition nav a.on-mobile").css("display", "none");
            return true;
    })
});
