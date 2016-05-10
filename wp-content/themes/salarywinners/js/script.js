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
    
    ///Save profile customer
    $('#form-profile').validator().on('submit',function(e){
        
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_customer_profile',
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
    
    ///Save profile provider
    $('#form-provider-profile').validator().on('submit',function(e){       
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_provider_profile',
                values: $('#form-provider-profile').serializeArray(),
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
    
    ///Save social profile customer
    $('#form-customer-social-profile').validator().on('submit',function(e){       
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_customer_social_profile',
                values: $('#form-customer-social-profile').serializeArray(),
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
    
    ///Save social profile customer
    $('#form-provider-social-profile').validator().on('submit',function(e){       
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_provider_social_profile',
                values: $('#form-provider-social-profile').serializeArray(),
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
    
    ///Save customer location
    $('#form-customer-location').validator().on('submit',function(e){       
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_customer_location',
                values: $('#form-customer-location').serializeArray(),
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
    ///Save provider location
    $('#form-provider-location').validator().on('submit',function(e){       
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_provider_location',
                values: $('#form-provider-location').serializeArray(),
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
    
    $(':file').change(function(){
    var file = this.files[0];
    var name = file.name;
    var size = file.size;
    var type = file.type;
    //Your validation
});

    ///Save customer about myself
    $('#form-customer-about').validator().on('submit',function(e){       
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_customer_about',
                values: $('#form-customer-about').serializeArray(),
            };
            
            var formData = new FormData($('#form-customer-about')[0]);

            $.ajax({
                url:sw.ajaxurl + '?action=update_customer_about',
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    var notifyClass = 'info';
                    if(response.success == false){
                        notifyClass = 'danger';
                        
                    } else {
                        $('#profile-picture').attr("src", response.data.picture);
                        
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
    
    ///Save provider about myself
    $('#form-provider-about').validator().on('submit',function(e){       
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
            console.log('something is wrong');
        } else {
            // everything looks good!
            var data = {
                action: 'update_provider_about',
                values: $('#form-provider-about').serializeArray(),
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
