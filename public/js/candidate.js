

// Initialize DataTable
let table = $('#dataTable').DataTable();
$('#indexSelect').select2();

const loadTable = async function (e) {

    e.preventDefault();
    $("#searchBtn").prop('disabled', true);
    $("#loadAllButton").prop('disabled', true);
    var selectValue = $('#indexSelect').val();
    const url = $('#formUrl').data('url').replace("__index_no", selectValue)

    const res = await fetch(url)

    const data = await res.json()
    if (data.is_ok) {

        table.destroy();
        $('#tBody').html(data.data);
        table = $('#dataTable').DataTable();

    }
    $("#searchBtn").prop('disabled', false);
    $("#loadAllButton").prop('disabled', false);


}
const availabiltySF = async function (e) {
    const url = e.target.dataset.url
    const res = await fetch(url)

    const data = await res.json()
    if (data.is_ok) {

        table.destroy();
        $('#tBody').html(data.data);
        table = $('#dataTable').DataTable();

    }

}
const loadAllTable = async function (e) {

    e.preventDefault();
    $("#searchBtn").prop('disabled', true);
    $("#loadAllButton").prop('disabled', true);

    const url = $('#loadAllButton').data('url')
    const res = await fetch(url)

    const data = await res.json()
    if (data.is_ok) {

        table.destroy();
        $('#tBody').html(data.data);
        table = $('#dataTable').DataTable();

    }
    $("#searchBtn").prop('disabled', false);
    $("#loadAllButton").prop('disabled', false);


}

$("#loadAllButton").click(loadAllTable);



$("body").on("submit", "#searchForm", loadTable);
$("body").on("click", "#avlButton", availabiltySF);
$("body").on("click", "#busyButton", availabiltySF);


