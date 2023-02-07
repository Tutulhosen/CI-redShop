var ajax_loader = '<img src="http://parisor.com/demo/images/ajax-loader.gif">';


$(function () {
    $("#search_form").submit(function (event) {
//                alert('hi');
        event.preventDefault();

        var values = $("#search_form").serialize();

        $.ajax({
            url: "search",
            type: "POST",
            data: values,
            cache: false,
            beforeSend: function () {
                $("#loader").html(ajax_loader);
            },
            success: function (data) {
                $('#loader').hide();
                $('.serach_result').html(data);
            },
            error: function (data) {
                //                            alert(data);

            }
        }); //end ajax
    });
});