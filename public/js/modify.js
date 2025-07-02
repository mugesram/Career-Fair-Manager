//
$('#modifyingBy').select2();
$('#index_no').select2();


$('#availability').select2();
$('#InterviwerSelect').select2();

const formSubmitF = async function (e) {

    e.preventDefault();
    $("#formSubmit").prop('disabled', true);


    var url;
    if (availabilty == 'Available') {
        var index_no = $('#index_no').val();
        var availabilty = $('#availability').val();


        url = $('#formUrl').data('url').replace("__index_no", index_no).replace("__availability", availabilty);

    } else {
        var index_no = $('#index_no').val();
        var availabilty = $('#availability').val();
        var company = $('#InterviwerSelect').val();

        url = $('#formUrl').data('url').replace("__index_no", index_no).replace("__availability", availabilty).replace('__company', company);

    }


    const res = await fetch(url)

    const data = await res.json()
    if (data.is_ok) {


        if (data.warning_messages.length > 0) {
            for (var msg of data.warning_messages) {
                Command: toastr["warning"](`${msg}`);

            }
        } else {
            Command: toastr["success"]("Availability modified");
        }



    } else {
        for (var msg of data.error_messages) {
            Command: toastr["error"](`${msg}`);

        }

    }
    $("#formSubmit").prop('disabled', false);



}




const avlChange = function (e) {
    var availabilty = $('#availability').val();

    if (availabilty == "Busy") {
        $('.chekAvailable').show();

    } else {
        $('.chekAvailable').hide();

    }


}
$("body").on("change", "#availability", avlChange);
$("body").on("submit", "#candidateForm", formSubmitF);
$('.chekAvailable').hide();

$("body").on('click', "#refresh", function () {
    window.location.href = window.location.href;
});

