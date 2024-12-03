var table_setting_user;

function tableSettingUser() {
  var url;
  url = baseURL + "get_setting_user";
  table_setting_user = $("#dt_setting_user").DataTable({
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
  tableSettingUser();
});

// $("#dt_golongan tbody").on("click", "button.edit-accounts", function () {
//   // var data = table_cardbase.row($(this).parents('tr')).data();
//   var textval = [];
//   $(this)
//     .closest("tr")
//     .find("td")
//     .each(function () {
//       textval.push($(this).text());
//     });

//   $("#txtId").val(textval[0]);
//   $("#txtStatus").val(textval[1]);
//   $("#txtAptln").val(textval[2]);

//   $("#modal_edit_accounts").modal("show");
// });

function btnSaveDataUser() {
  Swal.fire({
    title: "anda yakin ingin menyimpan data ini ?",
    text: "user " + $("#userId").val(),
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
  }).then((result) => {
    if (result.isConfirmed) {
      var url = baseURL + "save_setting_user";

      var postData = $.param({
        ajaxUserId: $("#userId").val(),
        ajaxPassword: $("#password").val(),
        ajaxEmail: $("#email").val(),
        ajaxRoleUser: $("#roleUser").val(),
        ajaxStatusAktif: $('input[name="statusAktif"]:checked').val(),
        ajaxIdPegawai: $("#idPegawai").val(),
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
              text: "user " + $("#userId").val() + " berhasil disimpan",
              icon: "success",
            }).then(function () {
              table_setting_user.ajax.reload();
              $("#userId,#password,#email").val("");
              $('input[name="statusAktif"]').prop("checked", false);
              $("#roleUser").val(null).trigger("change");
              $("#idPegawai").val("-").trigger("change");
            });
          } else if (data["statusInsertToDb"] == 2) {
            Swal.fire({
              title: "Failed",
              text: "data user " + $("#userId").val() + " sudah ada",
              icon: "error",
            });
          } else {
            Swal.fire({
              title: "Failed",
              text:
                "data user " + $("#userId").val() + " tidak berhasil disimpan",
              icon: "error",
            });
            table_setting_user.ajax.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Failed",
            text:
              "data user " + $("#userId").val() + " tidak berhasil disimpan",
            icon: "error",
          });

          table_setting_user.ajax.reload();
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

function btnUpdateDataUser() {
  Swal.fire({
    title: "anda yakin ingin menyimpan perubahan data ini ?",
    text: "user " + $("#userId").val(),
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

      var url = baseURL + "update_setting_user";
      var postData = $.param({
        ajaxUserId: $("#userId").val(),
        ajaxPassword: $("#password").val(),
        ajaxEmail: $("#email").val(),
        ajaxRoleUser: $("#roleUser").val(),
        ajaxStatusAktif: $('input[name="statusAktif"]:checked').val(),
        ajaxIdPegawai: $("#idPegawai").val(),
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
              text: "user " + $("#userId").val() + " berhasil diubah",
              icon: "success",
            }).then(function () {
              table_setting_user.ajax.reload();
              $("#userId,#password,#email").val("");
              $('input[name="statusAktif"]').prop("checked", false);
              $("#roleUser").val(null).trigger("change");
              $("#idPegawai").val("-").trigger("change");
            });
          } else {
            Swal.fire({
              title: "Failed",
              text:
                "data user " + $("#userId").val() + " tidak berhasil diubah",
              icon: "error",
            });
            table_setting_user.ajax.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Failed",
            text: "data user " + $("#userId").val() + " tidak berhasil diubah",
            icon: "error",
          });

          table_setting_user.ajax.reload();
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

function confirmDeleteDataUser(rUser) {
  Swal.fire({
    title: "anda yakin ingin menghapus data ini ?",
    text: "user " + rUser,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
  }).then((result) => {
    if (result.isConfirmed) {
      var url = baseURL + "delete_setting_user";
      var postData = $.param({
        ajaxUserId: rUser,
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
              text: "user " + rUser + " berhasil dihapus",
              icon: "success",
            }).then(function () {
              table_setting_user.ajax.reload();
            });
          } else {
            Swal.fire({
              title: "Failed",
              text: "data user " + rUser + " tidak berhasil dihapus",
              icon: "error",
            });
            table_setting_user.ajax.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Failed",
            text: "data user " + rUser + " tidak berhasil dihapus",
            icon: "error",
          });
          table_setting_user.ajax.reload();
        },
      });
    }
  });
}

function confirmUpdateDataUser(rUser) {
  Swal.fire({
    title: "anda yakin ingin merubah data ini ?",
    text: "user " + rUser,
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
      $("#userId").prop("disabled", true);

      var url = baseURL + "get_forupdate_setting_user";
      var datapost = {
        ajaxUserId: rUser,
      };

      $.getJSON(url, datapost)
        .done(function (data) {
          $("#userId").val(data.user);
          $("#password").val(data.pass);
          $("#email").val(data.email);
          $("#idPegawai").val(data.IDPEG).trigger("change");
          $("#roleUser").val(data.r_user).trigger("change");
          if (data.aktif == "Y") {
            $("#yes").prop("checked", true);
          } else {
            $("#no").prop("checked", true);
          }
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
  $("#userId").prop("disabled", false);
  $("#btnSubmit,#btnReset").show();
  $("#userId,#password,#email").val("");
  $('input[name="statusAktif"]').prop("checked", false);
  $("#roleUser").val(null).trigger("change");
  $("#idPegawai").val("-").trigger("change");
});

$("#btnSubmit").click(function () {
  validationFormValid = [];

  statusValidUser = validationForm(
    "#userId",
    "#boxIconUserId",
    "#msgErrUserId",
    "user"
  );
  statusValidPass = validationForm(
    "#password",
    "#boxIconPassword",
    "#msgErrPassword",
    "password"
  );
  statusValidEmail = validationForm(
    "#email",
    "#boxIconEmail",
    "#msgErrEmail",
    "email"
  );
  statusValidRole = validationForm(
    "#roleUser",
    "#boxRoleUser",
    "#msgErrRoleUser",
    "role user"
  );
  statusValidStatus = validationFormRadio(
    'input[name="statusAktif"]:checked',
    "#msgErrStatusAktif",
    "status aktif"
  );

  validationFormValid.push(
    statusValidUser,
    statusValidPass,
    statusValidEmail,
    statusValidRole,
    statusValidStatus
  );

  if (validationFormValid.indexOf("noValid") > -1) {
    // alert("in the array")
  } else {
    // alert("not in the array")
    btnSaveDataUser();
  }
});

$("#btnUpdate").click(function () {
  validationFormValid = [];

  statusValidUser = validationForm(
    "#userId",
    "#boxIconUserId",
    "#msgErrUserId",
    "user"
  );
  statusValidPass = validationForm(
    "#password",
    "#boxIconPassword",
    "#msgErrPassword",
    "password"
  );
  statusValidEmail = validationForm(
    "#email",
    "#boxIconEmail",
    "#msgErrEmail",
    "email"
  );
  statusValidRole = validationForm(
    "#roleUser",
    "#boxRoleUser",
    "#msgErrRoleUser",
    "role user"
  );
  statusValidStatus = validationFormRadio(
    'input[name="statusAktif"]:checked',
    "#msgErrStatusAktif",
    "status aktif"
  );

  validationFormValid.push(
    statusValidUser,
    statusValidPass,
    statusValidEmail,
    statusValidRole,
    statusValidStatus
  );

  if (validationFormValid.indexOf("noValid") > -1) {
    // alert("in the array")
  } else {
    // alert("not in the array")
    btnUpdateDataUser();
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

function validationFormRadio(radioId, msgError, textError) {
  // $('input[name="statusAktif"]:checked').val()
  // alert($(radioId).val());
  if ($(radioId).val() == "Y" || $(radioId).val() == "N") {
    $(msgError).html("");
    return "Valid";
  } else {
    $(msgError).html(textError + " harus diisi");
    return "noValid";
  }
}
