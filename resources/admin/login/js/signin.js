/**
 * Created by sudarshan on 10/1/16.
 */

jQuery(document).ready(function ($) {
    var $loginForm = $('#login-form'),
        $loginButton = $('.login-btn');

    $loginForm.validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: {
                required: 'Username is required.'
            },
            password: {
                required: "Password field is required."
            }
        },
        errorElement: "span",
        errorPlacement: function ( error, element ) {
            if (element.prop("type") == "checkbox") {
                error.insertBefore(element);
            } else if (element[0].localName === "select") {
                error.insertBefore(element);
            } else {
                element.attr('placeholder', error[0].innerText);
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents('div.form-group').addClass( "has-error" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents('div.form-group').removeClass( "has-error" );
        },
        submitHandler: function (form) {
            $.ajax({
                url: baseUrl + 'signin',
                method: "POST",
                data: $loginForm.serialize(),
                dataType: "json",
                beforeSend: function (req) {
                },
                success: function (response) {
                    $(this).find('.form-group').removeClass('has-error');
                    $(this).find('.help-block').html('');
                    if (false == response.success) {
                        $.each(response.field, function (fieldName, message) {
                            $('input[name="'+fieldName+'"]').parents('div.form-group').addClass('has-error')
                            $('span.help-block.'+fieldName).text(message);
                        });
                        $('<h4>'+response.message+'</h4>').insertBefore($loginForm);
                    } else {
//                        window.location.href = "http://localhost/techno/khojj/test";
//                        window.location.href = baseUrl+'test';
                        $loginForm.hide();
                        $('div.user-account h2').remove();
                        $('<h4>'+response.message+'</h4>').insertBefore($loginForm);
                    }
//                    $('#scrollUp').trigger('click');
                },
                error: function (responce) {

                }
            });

        }
    });//End Form validation
});
