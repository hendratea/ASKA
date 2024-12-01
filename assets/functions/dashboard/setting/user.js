var table_setting_user;

function tableSettingUser() {
    var url;
    url = baseURL + "get_data_setting_user";
    table_setting_user = $('#dt_setting_user').DataTable({
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
    tableSettingUser();
});

$('#dt_golongan tbody').on('click', 'button.edit-accounts', function () {
    // var data = table_cardbase.row($(this).parents('tr')).data();
    var textval = [];
    $(this).closest('tr').find('td').each(function () {
        textval.push($(this).text());
    });

    $("#txtId").val(textval[0]);
    $("#txtStatus").val(textval[1]);
    $("#txtAptln").val(textval[2]);


    $('#modal_edit_accounts').modal('show');
});


function validationForm(inputId, boxIcon, msgError, textError)
{
    if($(inputId).val()==''){
        $(boxIcon).css({
        border: "1px solid red",
        // color: "red",
        });

        $(inputId).addClass('form-control-danger');
        $(msgError).html(textError + ' harus diisi');
        return 'noValid';
    }else {
        $(boxIcon).css({
            border: "0px solid red",
            // color: "red",
            });
    
            $(inputId).removeClass('form-control-danger');
            $(msgError).html('');
        return 'Valid';
    }
}

function validationFormRadio(radioId, msgError, textError)
{
    // $('input[name="statusAktif"]:checked').val()
    // alert($(radioId).val());
    if($(radioId).val()=='Y' || $(radioId).val()=='N'){
        $(msgError).html('');
        return 'Valid';
    }else {
        $(msgError).html(textError + ' harus diisi');
        return 'noValid';
    }
}

function confirmDeleteDataUser(rUser){

    Swal.fire({
        title: "anda yakin ingin menghapus data ini ?",
        text: "user " + rUser,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya"
      }).then((result) => {
        if (result.isConfirmed) {
            var url = baseURL + "delete_data_setting_user";
            var postData = $.param(
                { 
                    ajaxUserId: rUser,
                }
            );
            $.ajax({
                url: url,
                type: "POST",
                data: postData,
                dataType: "JSON",
                success: function (data) {
                    if (data['statusDeleteToDb'] == 1) {

                        Swal.fire({
                            title: "Success",
                            text: "user " + rUser + " berhasil dihapus",
                            icon: "success"
                        }).then(function () {
                            table_setting_user.ajax.reload();
                        });
                        

                    }else{
                        Swal.fire({
                            title: "Failed",
                            text: "data user " + rUser + " tidak berhasil dihapus",
                            icon: "error"
                        });
                        table_setting_user.ajax.reload();
                    }
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: "Failed",
                        text: "data user " + rUser + " tidak berhasil dihapus",
                        icon: "error"
                    });
                    
                    table_setting_user.ajax.reload();
                }
            });
        }
      });

}

function confirmUpdateDataUser(rUser){
    Swal.fire({
        title: "anda yakin ingin mengubah data ini ?",
        text: "user " + rUser,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya"
      }).then((result) => {
        if (result.isConfirmed) {
            $("#btnUpdate").show();
            $("#btnCancel").show();
            $("#btnSubmit").hide();
            $("#btnReset").hide();

            var url = baseURL + "get_data_for_update_user";
            var datapost = {
                ajaxUserId: rUser,
            };

            $.getJSON(url, datapost)
                .done(function (data) {
                    $('#userId').val(data.user);
                    $('#password').val(data.pass);
                    $('#email').val(data.email);
                    $("#idPegawai").val(data.IDPEG).trigger('change');
                    $('#roleUser').val(data.r_user).trigger('change');
                    if(data.aktif=='Y'){
                        $("#yes").prop("checked", true);
                    }else{
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

function confirmSaveDataUser(){
    Swal.fire({
        title: "anda yakin ingin menyimpan data ini ?",
        text: "user " + $("#userId").val(),
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya"
      }).then((result) => {
        if (result.isConfirmed) {
            var url = baseURL + "save_data_setting_user";

            var postData = $.param(
                { ajaxUserId: $("#userId").val(),
                    ajaxPassword: $("#password").val(),
                    ajaxEmail: $("#email").val(),
                    ajaxRoleUser: $("#roleUser").val(),
                    ajaxStatusAktif: $('input[name="statusAktif"]:checked').val(),
                    ajaxIdPegawai: $("#idPegawai").val(),
                }
            );
            // alert(url);
            $.ajax({
                url: url,
                type: "POST",
                data: postData,
                dataType: "JSON",
                success: function (data) {
                    if (data['statusInsertToDb'] == 1) {

                        Swal.fire({
                            title: "Success",
                            text: "user " + $("#userId").val() + " berhasil disimpan",
                            icon: "success"
                        }).then(function () {
                            table_setting_user.ajax.reload();
                            $("#userId,#password,#email").val('');
                            $('input[name="statusAktif"]').prop('checked', false);
                            $("#roleUser").val(null).trigger('change');
                            $("#idPegawai").val('-').trigger('change');
                        });
                        

                    }else if(data['statusInsertToDb'] == 2){

                        Swal.fire({
                            title: "Failed",
                            text: "data user " + $("#userId").val() + " sudah ada",
                            icon: "error"
                        });

                    }else{
                        Swal.fire({
                            title: "Failed",
                            text: "data user " + $("#userId").val() + " tidak berhasil disimpan",
                            icon: "error"
                        });
                        table_setting_user.ajax.reload();
                    }
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: "Failed",
                        text: "data user " + $("#userId").val() + " tidak berhasil disimpan",
                        icon: "error"
                    });
                    
                    table_setting_user.ajax.reload();
                }
            });
        //   Swal.fire({
        //     title: "Deleted!",
        //     text: "Your file has been deleted.",
        //     icon: "success"
        //   });
        }
      });
}

function updateDataUser(){
    Swal.fire({
        title: "anda yakin ingin update data ini ?",
        text: "user " + $("#userId").val(),
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya"
      }).then((result) => {
        if (result.isConfirmed) {
            var url = baseURL + "update_data_setting_user";

            var postData = $.param(
                { 
                    ajaxUserId: $("#userId").val(),
                    ajaxPassword: $("#password").val(),
                    ajaxEmail: $("#email").val(),
                    ajaxRoleUser: $("#roleUser").val(),
                    ajaxStatusAktif: $('input[name="statusAktif"]:checked').val(),
                    ajaxIdPegawai: $("#idPegawai").val(),
                }
            );
            // alert(url);
            $.ajax({
                url: url,
                type: "POST",
                data: postData,
                dataType: "JSON",
                success: function (data) {
                    if (data['statusUpdateToDb'] == 1) {

                        Swal.fire({
                            title: "Success",
                            text: "user " + $("#userId").val() + " berhasil diubah",
                            icon: "success"
                        }).then(function () {
                            table_setting_user.ajax.reload();
                            $("#userId,#password,#email").val('');
                            $('input[name="statusAktif"]').prop('checked', false);
                            $("#roleUser").val(null).trigger('change');
                            $("#idPegawai").val('-').trigger('change');
                        });
                    }else{
                        Swal.fire({
                            title: "Failed",
                            text: "data user " + $("#userId").val() + " tidak berhasil diubah",
                            icon: "error"
                        });
                        table_setting_user.ajax.reload();
                    }
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        title: "Failed",
                        text: "data user " + $("#userId").val() + " tidak berhasil diubah",
                        icon: "error"
                    });
                    
                    table_setting_user.ajax.reload();
                }
            });
        //   Swal.fire({
        //     title: "Deleted!",
        //     text: "Your file has been deleted.",
        //     icon: "success"
        //   });
        }
      });
}

            

$('#btnCancel').click(function(){
    $("#btnUpdate,#btnCancel").hide();
    $("#btnSubmit,#btnReset").show();
    $("#userId,#password,#email").val('');
    $('input[name="statusAktif"]').prop('checked', false);
    $("#roleUser").val(null).trigger('change');
    $("#idPegawai").val('-').trigger('change');
})      

$('#btnSubmit').click(function(){

    statusValid = validationForm('#userId','#boxIconUserId','#msgErrUserId','user'); 
    statusValid = validationForm('#password','#boxIconPassword','#msgErrPassword','password'); 
    statusValid = validationForm('#email','#boxIconEmail','#msgErrEmail','email'); 
    statusValid = validationForm('#roleUser','#boxRoleUser','#msgErrRoleUser','role user'); 
    statusValid = validationFormRadio('input[name="statusAktif"]:checked','#msgErrStatusAktif','status aktif')

    if(statusValid=='Valid')
        // showConfirmMessage();
        confirmSaveDataUser();
    // Swal.fire({
    //     icon: "error",
    //     title: "Oops...",
    //     text: "Something went wrong!",
    //     // footer: '<a href="#">Why do I have this issue?</a>'
    // });

    

    // showConfirmDelete($("#userId").val());
    // table_setting_user.ajax.reload();
    
    // alert($('input[name="statusAktif"]:checked').val())
    // return; 
    // statusValid = validationForm('#userId','#boxIconUserId','#msgErrUserId','user'); 
    // statusValid = validationForm('#password','#boxIconPassword','#msgErrPassword','password'); 
    // statusValid = validationForm('#email','#boxIconEmail','#msgErrEmail','email'); 
    // statusValid = validationForm('#roleUser','#boxRoleUser','#msgErrRoleUser','role user'); 
    // statusValid = validationFormRadio('input[name="statusAktif"]:checked','#msgErrStatusAktif','status aktif')

    // if(statusValid=='Valid')
    //     showConfirmMessage();

})


$('#btnUpdate').click(function(){
    updateDataUser();
})

