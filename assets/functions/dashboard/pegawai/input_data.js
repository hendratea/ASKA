function save_data_pegawai() {
    $('#loader_process').show();
    var url = baseURL + "pegawai_save_data";

    var postData = $.param(
            { ajaxNamaPegawai: $("#namaPegawai").val(),
                ajaxJenisKelamin: $('input[name="jenisKelamin"]:checked').val(),
                ajaxTempatLahir: $("#tempatLahir").val(),
                ajaxTanggalLahir: $("#tanggalLahir").val(),
                ajaxTelpon: $("#telepon").val(),
                ajaxPassport: $("#passport").val(),
                ajaxStatusKerja: $("#statusKerja").val(),
                ajaxAlamat: $("#alamat").val(),
                ajaxStatusKaryawan: $('input[name="statusKaryawan"]:checked').val(),
            }
        );


    if($('input[name="statusKaryawan"]:checked').val()=='PNS'){
        postData = postData + '&' + $.param(
            {   ajaxGolongan: $("#golongan").val(),
                ajaxNip: $("#nip").val(),
                ajaxNip: $("#tglTerimaJabatan").val(),
                ajaxNip: $("#tglDiplomatik").val(),
            }
        );
    }else{
        postData = postData + '&' + $.param(
            {   ajaxStatusKerja: $("#statusKerja").val(),
                ajaxTugasKerja:  $("#tugasKerja").val(),
                ajaxTugasKerja:  $("#tglMasukKerja").val(),
                ajaxTugasKerja:  $("#awalKontrak").val(),
                ajaxTugasKerja:  $("#akhirKontrak").val(),
                ajaxTugasKerja:  $("#noKontrak").val(),
                ajaxTugasKerja:  $("#noRekening").val(),
                ajaxTugasKerja:  $("#noEpf").val()
            }
        );
    }

    $.ajax({
        url: url,
        type: "POST",
        data: postData,
        async: true,
        dataType: "JSON",
        success: function (data) {
            $('#loader_process').hide();
            updatePhotoProfile();
            alert(data['statusInsertToDb']);
            if (data['status_field'] == "success") {
                $('#modalConfSaveDataPegawai').modal('hide');
                showSuccessMessageX();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#loader_process').hide();
        }
    });
}

function updatePhotoProfile(){
    var url = baseURL + "update_profile_picture";
    var $form = $('form');

    sImage = $('#change_img').prop('files')[0];

    var data = new FormData();
    data.append('ajaxPhotoProfile', $('#change_img').prop('files')[0]);

    $.ajax({
        url: url,
        type: "POST",
        processData: false, // important
        contentType: false, // important
        data: data,
        dataType: "JSON",
        success: function (data) {

            alert('Success update photo profile');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal("Error update image profile");
        }
    });
}

function get_list_pegawai() {
    var url;
    url = baseURL + "get_list_pegawai";
    table_cardbase = $('#dt_list_pegawai').DataTable({
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'print'
        // ],
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
        "columns": [
            { "data": "user_id" },
            { "data": "id_pegawai" },
            { "data": "full_name" },
            { "data": "gender" },
            { "data": "email" },
            { "data": "status_active" },
            { "data": "last_login" },
            { "data": "attempt_login" },
            { "data": "status_lock" },
            { "data": "email_verification" },
            { "data": "date_insert" },
            { "data": "expired_password" },
            { "data": "user_role" },
            // { "data": "cell_actions" },
        ]
    });
}

$('#showDetailPns').click(function(){
    $("#collapseNonPns").collapse('hide');
})

$('#showDetailNonPns').click(function(){
    $("#collapsePns").collapse('hide');
})

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

$('#btnSubmit').click(function(){

    statusValid = validationForm('#idPegawai','#boxIconIdPegawai','#msgErrIdPegawai','id pegawai'); 
    statusValid = validationForm('#namaPegawai','#boxIconNamaPegawai','#msgErrNamaPegawai','nama pegawai'); 
    statusValid = validationForm('#tempatLahir','#boxIconTempatLahir','#msgErrTempatLahir','tempat lahir'); 
    statusValid = validationForm('#tanggalLahir','#boxIconTanggalLahir','#msgErrTanggalLahir','tanggal lahir'); 
    // alert(statusValid);
    if(statusValid=='Valid')
        $('#modalConfSaveDataPegawai').modal('show');

    // statusValid = '';
    // if($("#idPegawai").val()==''){
    //     validationForm('#idPegawai','#boxIconIdPegawai','#msgErrIdPegawai','id pegawai'); 
    //     statusValid='noValid';
    // }
        
    // if($("#namaPegawai").val()=='')
    //     validationForm('#namaPegawai','#boxIconNamaPegawai','#msgErrNamaPegawai','nama pegawai');
    // if($("#tempatLahir").val()=='')
    //     validationForm('#tempatLahir','#boxIconTempatLahir','#msgErrTempatLahir','tempat lahir');
    // if($("#tanggalLahir").val()=='')
    //     validationForm('#tanggalLahir','#boxIconTanggalLahir','#msgErrTanggalLahir','tanggal lahir');

    // alert(statusValid);
    // $('#modalConfSaveDataPegawai').modal('show');


})


$(function () {

    // $("#boxIconIdPegawai").css({
    //     border: "1px solid red",
    //     // color: "red",
    // });

    // $('#idPegawai').addClass('form-control-danger');
    // save_data_pegawai();
    get_list_pegawai();
    // $("#collapsePns").collapse();
    $("#change_img").change(function (e) {

        for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

            var file = e.originalEvent.srcElement.files[i];

            var img = document.getElementById("modify_img");
            var reader = new FileReader();
            reader.onloadend = function () {
                img.src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
});
