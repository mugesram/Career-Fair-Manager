
"use strict"
const dataFormSubmitF = function (event) {
    event.preventDefault()
    // $("#formSubmit").prop('disabled', true);
    const form = document.getElementById('dataForm')
    const payload = new FormData(this)
    console.log(payload)
    // const action = $('#formUrl').data('url')
    // need to add error handilng here in production
    $("#formSubmit").prop('disabled', true);
    // $.post($('#formUrl').data('url'), payload, function (data) {
    //     $("#formSubmit").prop('disabled', false);
    //     if (data.is_ok) {


    //         if (data.warning_messages.length > 0) {
    //             for (var msg of data.warning_messages) {
    //                 Command: toastr["warning"](`${msg}`);

    //             }
    //         } else {
    //             for (var msg of data.success_messages) {
    //                 Command: toastr["success"](`${msg}`);

    //             }
    //         }

    //     }
    // })
    $.ajax({
        type: 'POST',

        url: $('#formUrl').data('url'),
        data: payload,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $("#formSubmit").prop('disabled', true);
        },
        success: function (data) {

            $("#formSubmit").prop('disabled', false);
            if (data.is_ok) {



                if (data.warning_messages.length > 0) {
                    for (var msg of data.warning_messages) {
                        Command: toastr["warning"](`${msg}`);

                    }
                } else {
                    for (var msg of data.success_messages) {
                        Command: toastr["success"](`${msg}`);

                    }
                }

            } else {

                for (var msg of data.error_messages) {
                    Command: toastr["error"](`${msg}`);

                }

            }
        }
    });

    // const res = await fetch(action, {
    //     method: 'POST',
    //     body: payload,
    // })
    // const data = await res.json()

    // if (data.is_ok) {


    //     if (data.warning_messages.length > 0) {
    //         for (var msg of data.warning_messages) {
    //             Command: toastr["warning"](`${msg}`);

    //         }
    //     } else {
    //         for (var msg of data.success_messages) {
    //             Command: toastr["success"](`${msg}`);

    //         }
    //     }



    // } else {
    //     for (var msg of data.error_messages) {
    //         Command: toastr["error"](`${msg}`);

    //     }

    // }
    // $("#formSubmit").prop('disabled', false);


}

$("body").on("submit", "#dataForm", dataFormSubmitF);


$("body").on('click', "#refresh", function () {
    window.location.href = window.location.href;
});