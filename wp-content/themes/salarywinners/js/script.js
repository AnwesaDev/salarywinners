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
    
    ///Save profile
    $('#form-profile').validator().on('submit',function(e){
        
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_user_profile',
                values: $('#form-profile').serializeArray(),
            };

            $.ajax({
                url:sw.ajaxurl,
                type: 'POST',
                data: data,
                success: function(response){
                    console.log(response);
                    var notifyClass = 'info';
                    if(response.success == false){
                        notifyClass = 'danger';
                    } else {
                        notifyClass = 'success';
                    }
                    
                    $.notifyBar({
                        cssClass: notifyClass,
                        html: response.data['message'],
                        close: true,
                        delay: 100000,
                        closeOnClick: false
                    });
                },
                error: function(e){

                }
            });
            e.preventDefault();
        }
        
    });
});
