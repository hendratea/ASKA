var table_golongan;

function tableGolongan() {
  var url;
  url = baseURL + "get_data_golongan";
  table_golongan = $("#dt_golongan").DataTable({
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
    aoColumns: [
      { sWidth: "05%" }, // 1st column width
      { sWidth: "45%" }, // 2nd column width
      { sWidth: "25%" }, // 3rd column width and so on
      { sWidth: "25%" }, // 4th column width and so on
    ],
  });
}

$(function () {
  tableGolongan();
});

//--- Method dari Dialog Modal pada saat edit
$("#dt_golongan tbody").on("click", "button.edit-accounts", function () {
  // var data = table_cardbase.row($(this).parents('tr')).data();
  var textval = [];
  $(this)
    .closest("tr")
    .find("td")
    .each(function () {
      textval.push($(this).text());
    });

  $("#txtId").val(textval[0]);
  $("#txtStatus").val(textval[1]);
  $("#txtAptln").val(textval[2]);

  $("#modal_edit_accounts").modal("show");
});

function validationForm(inputId, boxIcon, msgError, textError) {
  if ($(inputId).val() == "") {
    $(boxIcon).css({
      border: "1px solid red",
      // color: "red",
    });

    $(inputId).addClass("form-control-danger");
    $(msgError).html(textError + " harus diisi");
    return "noValid";
  } else {
    $(boxIcon).css({
      border: "0px solid red",
      // color: "red",
    });

    $(inputId).removeClass("form-control-danger");
    $(msgError).html("");
    return "Valid";
  }
}

$("#btnSubmit").click(function () {
  // statusValid = validationForm('#idGolongan','#boxIconIdGolongan','#msgErrIdGolongan','id golongan');
  statusValid = validationForm(
    "#status",
    "#boxIconStatus",
    "#msgErrStatus",
    "status"
  );
  statusValid = validationForm(
    "#aptln",
    "#boxIconAptln",
    "#msgErrAptln",
    "aptln"
  );

  if (statusValid == "Valid") $("#modalConfSaveDataGolongan").modal("show");
});

function save_data_golongan() {
  $("#loader_process").show();
  var url = baseURL + "save_data_golongan";

  var postData = $.param({
    //ajaxIdGolongan: $("#idGolongan").val(),
    ajaxStatus: $("#status").val(),
    ajaxAptln: $("#aptln").val(),
  });

  $.ajax({
    url: url,
    type: "POST",
    data: postData,
    async: true,
    dataType: "JSON",
    success: function (data) {
      $("#loader_process").hide();
      if (data["status_field"] == "success") {
        $("#modalConfSaveDataGolongan").modal("hide");
        showSuccessMessageX();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("Error adding / update data");
      $("#loader_process").hide();
    },
  });
}
