var table_referensi_ijin;

function table_refIjin() {
  var url;
  url = baseURL + "get_referensi_ijin";
  table_referensi_ijin = $("#dt_referensi_ijin").DataTable({
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
  table_refIjin();
});

function btnSaveData() {
  Swal.fire({
    title: "anda yakin ingin menyimpan data ini ?",
    text: "status " + $("#status").val(),
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
  }).then((result) => {
    if (result.isConfirmed) {
      var url = baseURL + "save_referensi_ijin";

      var postData = $.param({
        ajaxID: $("#ID").val(),
        ajaxStatus: $("#status").val(),
      });
      // alert(url);
      $.ajax({
        url: url,
        type: "POST",
        data: postData,
        dataType: "JSON",
        success: function (data) {
          if (data["statusInsertToDb"] == 1) {
            Swal.fire({
              title: "Success",
              text: "ID " + $("#ID").val() + " berhasil disimpan",
              icon: "success",
            }).then(function () {
              table_referensi_ijin.ajax.reload();
              $("#ID,#status").val("");
            });
          } else if (data["statusInsertToDb"] == 2) {
            Swal.fire({
              title: "Failed",
              text: "data ID " + $("#ID").val() + " sudah ada",
              icon: "error",
            });
          } else {
            Swal.fire({
              title: "Failed",
              text: "data ID " + $("#ID").val() + " tidak berhasil disimpan",
              icon: "error",
            });
            table_referensi_ijin.ajax.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Failed",
            text: "data ID " + $("#ID").val() + " tidak berhasil disimpan",
            icon: "error",
          });

          table_referensi_ijin.ajax.reload();
        },
      });
      //   Swal.fire({
      //     title: "Deleted!",
      //     text: "Your file has been deleted.",
      //     icon: "success"
      //   });
    }
  });
}

function btnUpdateData() {
  Swal.fire({
    title: "anda yakin ingin menyimpan perubahan data ini ?",
    text: "status " + $("#status").val(),
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
  }).then((result) => {
    if (result.isConfirmed) {
      $("#btnUpdate").hide();
      $("#btnCancel").hide();
      $("#btnSubmit").show();
      $("#btnReset").show();

      var url = baseURL + "update_referensi_ijin";
      var postData = $.param({
        ajaxID: $("#ID").val(),
        ajaxStatus: $("#status").val(),
      });
      // alert(url);
      $.ajax({
        url: url,
        type: "POST",
        data: postData,
        dataType: "JSON",
        success: function (data) {
          if (data["statusUpdateToDb"] == 1) {
            Swal.fire({
              title: "Success",
              text: "ID " + $("#ID").val() + " berhasil diubah",
              icon: "success",
            }).then(function () {
              table_referensi_ijin.ajax.reload();
              $("#ID,#status").val("");
            });
          } else {
            Swal.fire({
              title: "Failed",
              text: "data ID " + $("#ID").val() + " tidak berhasil diubah",
              icon: "error",
            });
            table_referensi_ijin.ajax.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Failed",
            text: "data ID " + $("#ID").val() + " tidak berhasil diubah",
            icon: "error",
          });

          table_referensi_ijin.ajax.reload();
        },
      });
      //   Swal.fire({
      //     title: "Deleted!",
      //     text: "Your file has been deleted.",
      //     icon: "success"
      //   });
    }
  });
}

function confirmDeleteData(rID) {
  Swal.fire({
    title: "anda yakin ingin menghapus data ini ?",
    text: "ID " + rID,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
  }).then((result) => {
    if (result.isConfirmed) {
      var url = baseURL + "delete_referensi_ijin";
      var postData = $.param({
        ajaxID: rID,
      });
      $.ajax({
        url: url,
        type: "POST",
        data: postData,
        dataType: "JSON",
        success: function (data) {
          if (data["statusDeleteToDb"] == 1) {
            Swal.fire({
              title: "Success",
              text: "ID " + rID + " berhasil dihapus",
              icon: "success",
            }).then(function () {
              table_referensi_ijin.ajax.reload();
            });
          } else {
            Swal.fire({
              title: "Failed",
              text: "data ID " + rID + " tidak berhasil dihapus",
              icon: "error",
            });
            table_referensi_ijin.ajax.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Failed",
            text: "data ID " + rID + " tidak berhasil dihapus",
            icon: "error",
          });
          table_referensi_ijin.ajax.reload();
        },
      });
    }
  });
}

function confirmUpdateData(rID) {
  Swal.fire({
    title: "anda yakin ingin merubah data ini ?",
    text: "ID " + rID,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
  }).then((result) => {
    if (result.isConfirmed) {
      $("#btnUpdate").show();
      $("#btnCancel").show();
      $("#btnSubmit").hide();
      $("#btnReset").hide();
      $("#ID").prop("disabled", true);

      var url = baseURL + "get_forupdate_referensi_ijin";
      var datapost = {
        ajaxID: rID,
      };

      $.getJSON(url, datapost)
        .done(function (data) {
          $("#ID").val(data.ID);
          $("#status").val(data.status);
        })
        .fail(function (jqxhr, textStatus, error) {
          var err = textStatus + ", " + error;
          alert("Request DataFailed : " + err);
        });
    }
  });
}

$("#btnReset").click(function () {
  $("#btnCancel").click();
});

$("#btnCancel").click(function () {
  $("#btnUpdate,#btnCancel").hide();
  $("#ID").prop("disabled", false);
  $("#btnSubmit,#btnReset").show();
  $("#ID,#status,#aptln").val("");
});

$("#btnSubmit").click(function () {
  validationFormValid = [];
  statusValidStatus = validationForm("#status", "#boxIconStatus", "#msgErrStatus", "status");

  validationFormValid.push(statusValidStatus);

  if (validationFormValid.indexOf("noValid") > -1) {
  } else {
    btnSaveData();
  }
});

$("#btnUpdate").click(function () {
  validationFormValid = [];
  statusValidStatus = validationForm("#status", "#boxIconStatus", "#msgErrStatus", "status");

  validationFormValid.push(statusValidStatus);

  if (validationFormValid.indexOf("noValid") > -1) {
  } else {
    btnUpdateData();
  }
});

function validationForm(inputId, boxIcon, msgError, textError) {
  if ($(inputId).val() == "") {
    $(boxIcon).css({
      border: "1px solid red",
      color: "red",
    });

    $(inputId).addClass("form-control-danger");
    $(msgError).html(textError + " harus diisi");
    return "noValid";
  } else {
    $(boxIcon).css({
      border: "0px solid red",
      color: "red",
    });

    $(inputId).removeClass("form-control-danger");
    $(msgError).html("");
    return "Valid";
  }
}
