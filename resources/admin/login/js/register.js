/**
 * Created by agencydelta on 9/28/16.
 */

jQuery(document).ready(function ($) {

    //email validation
    $('.email').on('keyup', function (ev) {
        ev.preventDefault();
        var $this = $(this);
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        if (pattern.test($this.val()) || '' == $this.val()) {
            $this.parent().removeClass('has-error');
        } else {
            $this.parent().addClass('has-error');
        }
    });

    //password length checking
    $('.password').on('keyup', function (ev) {
        ev.preventDefault();
        var $this = $(this);
        if ($this.val().length > 5) {
            $this.parent().removeClass('has-error');
        } else {
            $this.parent().addClass('has-error');
        }
    });

    //password matching
    $('.confirm-password').on('keyup', function (ev) {
        ev.preventDefault();
        var $this = $(this);
        if ($this.val() == $('.password').val()) {
            $this.parent().removeClass('has-error');
        } else {
            $this.parent().addClass('has-error');
        }
    });




    /**
     * Validate Registration form and Submit data to Controller
     */
    $('#registration-form').validate({
        rules: {
            first_name: "required",
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: ".password"
            },
            mobile_number: 'required',
            city_name: {
                required: true
            },
            signing: {
                required: true
            }
        },
        messages: {
            first_name: 'First Name is required.',
            username: {
                required: 'Username is required.'
            },
            email: {
                required: "Email field is required.",
                email: "Please enter a valid email address."
            },
            password: {
                required: "Password field is required.",
                minlength: "Password must be at least 6 characters long."
            },
            confirm_password: {
                required: "Confirm Password field is required.",
                minlength: "Password must be at least 6 characters long.",
                equalTo: "Please enter the same password as above."
            },
            mobile_number: {
                required: 'Mobile number is required.'
            },
            city_name: {
                required: 'City field is required.'
            },
            signing: {
                required: "Please accept our policy."
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
            $( element ).parent('div').addClass( "has-error" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parent('div').removeClass( "has-error" );
        },
        submitHandler: function (form) {
            $.ajax({
                url: baseUrl + 'signup',
                method: "POST",
                data: $(form).serialize(),
                dataType: "json",
                beforeSend: function (req) {

                },
                success: function (response) {
                    $(this).find('.form-group').removeClass('has-error');
                    $(this).find('.help-block').html('');
                    if (false == response.success) {
                        $.each(response.field, function (fieldName, message) {
                            $('input[name="'+fieldName+'"], select[name="'+fieldName+'"]').parents('div.form-group').addClass('has-error')
                            $('span.help-block.'+fieldName).text(message);
                        });
                    } else {
                        var $form = $('#registration-form');
                        $form.hide();
                        $('div.user-account h2').remove();
                        $('<h4>'+response.message+'</h4>').insertBefore($form);
                    }
                    $('#scrollUp').trigger('click');
                },
                error: function (responce) {

                }
            });

        }
    });//End Form validation

});
