var table_cuti_inputdata;

function table_Cuti() {
  var url;
  url = baseURL + "get_cuti";
  table_cuti_inputdata = $("#dt_cuti_inputdata").DataTable({
    destroy: true,
    iDisplayLength: 10,
    processing: true,
    searching: true,
    ajax: {
      url: url,
      type: "GET",
    },
    language: {
      processing:
        '<div class="loader"><div class="m-t-30"><img class="zmdi-hc-spin" src="' +
        baseURL +
        'assets/template/images/loader.svg" width="48" height="48" alt="Aero"></div><p>Processing...</p></div>',
    },
  });
}

$(function () {
  table_Cuti();
});
