var table_rekap_all;

function tableRekapAll() {
    var url;
    url = baseURL + "get_data_rekap_all_pegawai";
    table_rekap_all = $('#dt_rekap_all').DataTable({
        destroy: true,
        iDisplayLength: 10,
        processing: true,
        searching: true,
        ajax: {
            url: url,
            type: 'GET',
        },
        language: {
            "processing": '<div class="loader"><div class="m-t-30"><img class="zmdi-hc-spin" src="' + baseURL + 'assets/template/images/loader.svg" width="48" height="48" alt="Aero"></div><p>Processing...</p></div>'
        },
    });
}

$(function () {

    tableRekapAll();

});