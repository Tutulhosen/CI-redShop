//admin/superadmin login------------------------------
(function ($) {
    "use strict";

//    var ajax_loader = '<img src="http://localhost/misba-edu/resources/img/ajax-loader.gif">';


    $("#login__phone").submit(function (event) {
//        alert('hi');
        event.preventDefault();
        var values = $("#login__phone").serialize();
        $.ajax({
            url: base_url + "login/login_check",
            type: "POST",
            data: values,
            cache: false,
            beforeSend: function () {
                $('.ajax_loader').html(ajax_loader);
            },
            success: function (data) {
                //console.log(data);
                $('.ajax_loader').hide();
                if(data == 'new'){
                    $('.nameInputBox').html('<div class="login__box"><label for="UserName">Name</label><input id="UserName" type="text" name="name" placeholder="Type Name" required=""></div>');
                }else if(data =='old'){
                    window.location.reload();
                }
//                $('#registration')[0].reset();
            },
            error: function (data) {
                alert('Something wrong! Try again!');
            }
        }); //end ajax
    }); //end login
    
    var buttonpressed;
    $('.clickButton').click(function() {
        buttonpressed = $(this).attr('name')
    });

    $("#add-to-cart").submit(function (event) {
//        alert('hi');
        event.preventDefault();
        var values = $("#add-to-cart").serialize();
        values = values + "&button=" + buttonpressed;
        console.log(values);
        $.ajax({
            url: base_url + "cart/add_to_cart",
            type: "POST",
            data: values,
            cache: false,
            beforeSend: function () {
                $('.ajax_loader').html(ajax_loader);
            },
            success: function (data) {
                if(buttonpressed == 'buyNow'){
                    window.location.href = base_url + "products/cart_details";
                }
                $('.ajax_loader').hide();
                $('.cart-count').html(data);
                $(".cartDiv").load(location.href + " #cartDiv");
                $(".cartSubTotal").load(location.href + " #cartSubTotal");
//                $('#registration')[0].reset();

            },
            error: function (data) {
                alert('Something wrong! Try again!');
            }
        }); //end ajax
    }); //end login
    
    $("#applied_status").submit(function (event) {
        //alert('hi');
        event.preventDefault();
        var values = $("#registration").serialize();
        $.ajax({
            url: "",
            type: "POST",
            data: values,
            cache: false,
            beforeSend: function () {
                $('.ajax_loader').html(ajax_loader);
            },
            success: function (data) {
                $('.ajax_loader').hide();
                $('.registration_result').html(data);
                $('#registration')[0].reset();
            },
            error: function (data) {
                $('.login_result').html(data);
            }
        }); //end ajax
    }); //end login

    $("#admin_login").submit(function (event) {
//        alert('hello');
        event.preventDefault();
        var values = $("#admin_login").serialize();
        $.ajax({
            url: "auth-login-check",
            type: "POST",
            data: values,
            cache: false,
            beforeSend: function () {
                $('.ajax_loader').html(ajax_loader);
            },
            success: function (data) {
                $('.ajax_loader').hide();
//                $('.login_result').html(data);
                if(data=='admin'){
                    window.location.href = base_url + "admin/dashboard";
                }else if(data=='superadmin'){
                    window.location.href = base_url + "superadmin/dashboard";    
                }else if(data=='false'){
                    $('.login_result').html('Your email or password is invalid!');    
                }else if(data=='deactive'){
                    $('.login_result').html('For login, please contact with website admin.');    
                }
            },
            error: function (data) {
                $('.login_result').html(data);
            }
        }); //end ajax
    }); //end login
    
    //user login------------------------------
    $("#login").submit(function (event) {
        event.preventDefault();
        var values = $("#login").serialize();
        $.ajax({
            url: "authenticate",
            type: "POST",
            data: values,
            cache: false,
            beforeSend: function () {
                $('.ajax_loader').html(ajax_loader);
            },
            success: function (data) {
                $('.ajax_loader').hide();
                if(data=='admin'){
                    window.location.href = base_url + "admin/dashboard";
                }else if(data=='superadmin'){
                    window.location.href = base_url + "superadmin/dashboard";    
                }else if(data=='user'){
                    window.location.href = base_url + "users-dashboard";    
                }else if(data=='false'){
                    $('.login_result').html('Your email or password is invalid!');    
                }else if(data=='deactive'){
                    $('.login_result').html('For login, please contact with website admin.');    
                }
            },
            error: function (data) {
                $('.login_result').html(data);
            }
        }); //end ajax
    }); //end login
    
    $("#registration").submit(function (event) {
        event.preventDefault();
        var values = $("#registration").serialize();
        $.ajax({
            url: "user-registration",
            type: "POST",
            data: values,
            cache: false,
            beforeSend: function () {
                $('.ajax_loader').html(ajax_loader);
            },
            success: function (data) {
                $('.ajax_loader').hide();
                $('.registration_result').html(data);
                $('#registration')[0].reset();
            },
            error: function (data) {
                $('.login_result').html(data);
            }
        }); //end ajax
    }); //end login
    
    
    $("#registrationBySuperadmin").submit(function (event) {
//        alert('HI');
        event.preventDefault();
        var values = $("#registrationBySuperadmin").serialize();
        $.ajax({
            url: "superadmin/save-users",
            type: "POST",
            data: values,
            cache: false,
            beforeSend: function () {
                $('.ajax_loader').html(ajax_loader);
            },
            success: function (data) {
                $('.ajax_loader').hide();
                $('.registration_result').html(data);
                $('#registrationBySuperadmin')[0].reset();
            },
            error: function (data) {
                $('.registration_result').html(data);
            }
        }); //end ajax
    }); //end login
    
    



}(jQuery));