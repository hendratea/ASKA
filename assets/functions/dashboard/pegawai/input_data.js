var validationFormInput = [];

function clearForm(boxIcon,msgError)
{
  $('#btnCancelPhoto').trigger('click');

  $("#imagePath,#idPegawai,#tglMasukKerja,#tglAwalKontrak,#tglAkhirKontrak,#noKontrak,#noRekening,#noEpf,#nip,#tglTerimaJabatan,#tglGelarDiplomatik,#namaPegawai,#tempatLahir,#tanggalLahir,#alamat,#telepon,#jnsPaspor,#noPasspor,#tglLakuPaspor,#tglIzinPaspor").val("");
  $('input[name="statusKaryawan"],input[name="statusWni"],input[name="jenisKelamin"]').prop("checked", false);
  $("#rStatusKerja,#rTugasKerja,#rFungsiKerja,#aktifKerja,#pendidikan,#rGolongan").val("-").trigger("change");

  $('#boxIconNamaPegawai,#boxIconTempatLahir,#boxIconTanggalLahir,#boxIconTelepon,#boxIconAktifKerja,#boxIconPendidikan,#boxIconAlamat').css({
    border: "0px solid red",
    color: "red",
  });

  $("#pendidikan,#aktifKerja,#tglMasukKerja,#tglAwalKontrak,#tglAkhirKontrak,#noKontrak,#noRekening,#noEpf,#nip,#tglTerimaJabatan,#tglGelarDiplomatik,#namaPegawai,#tempatLahir,#tanggalLahir,#alamat,#telepon,#jnsPaspor,#noPasspor,#tglLakuPaspor,#tglIzinPaspor").removeClass("form-control-danger");
  $('#msgStatusPns,#msgErrStatusWni,#msgErrJenisKelamin,#msgErrNamaPegawai,#msgErrTempatLahir,#msgErrTanggalLahir,#msgErrTelepon,#msgErrAktifKerja,#msgErrPendidikan,#msgErrAlamat').html("");
}

function btnSaveDataPegawai() {
  // alert('test');

  if($('#btnReset').html()=="Cancel Update"){
    vConfirmAlert = "anda yakin ingin merubah data ini ?"
    vUrl = "pegawai_update_data";
  }else{
    vConfirmAlert = "anda yakin ingin menyimpan data ini ?"
    vUrl = "pegawai_save_data";
  }

  Swal.fire({
    title: vConfirmAlert,
    text: "user " + $("#namaPegawai").val(),
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
  }).then((result) => {
    if (result.isConfirmed) {
      var url = baseURL + vUrl;
      var postData = $.param(
            { 
              ajaxIdPegawai: $("#idPegawai").val(),
              ajaxAktifKerja: $("#aktifKerja").val(),
              ajaxPendidikan: $("#pendidikan").val(),
              ajaxPns: $('input[name="statusKaryawan"]:checked').val(),
              ajaxStatusWni: $('input[name="statusWni"]:checked').val(),
              ajaxJenisKelamin: $('input[name="jenisKelamin"]:checked').val(),
              ajaxNamaPegawai: $("#namaPegawai").val(),
              ajaxTempatLahir: $("#tempatLahir").val(),
              ajaxTanggalLahir: $("#tanggalLahir").val(),
              ajaxAlamat: $("#alamat").val(),
              ajaxTelpon: $("#telepon").val(),
              ajaxJenisPaspor: $("#jnsPaspor").val(),
              ajaxNoPaspor: $("#noPasspor").val(),
              ajaxTglLakuPaspor: $("#tglLakuPaspor").val(),
              ajaxTglIzinPaspor: $("#tglIzinPaspor").val(),
            }
        );

        if($('input[name="statusKaryawan"]:checked').val()=='Y'){
          postData = postData + '&' + $.param(
              {   ajaxGolongan: $("#rGolongan").val(),
                  ajaxNip: $("#nip").val(),
                  ajaxTglTerimaJabatan: $("#tglTerimaJabatan").val(),
                  ajaxGelarDiplomatik: $("#tglGelarDiplomatik").val(),
              }
          );
      }else{
          postData = postData + '&' + $.param(
              {   ajaxStatusKerja: $("#rStatusKerja").val(),
                  ajaxTugasKerja:  $("#rTugasKerja").val(),
                  ajaxFungsiKerja:  $("#rFungsiKerja").val(),
                  ajaxTglMasukKerja:  $("#tglMasukKerja").val(),
                  ajaxTglAwalKontrak:  $("#tglAwalKontrak").val(),
                  ajaxTglAkhirKontrak:  $("#tglAkhirKontrak").val(),
                  ajaxNoKontrak:  $("#noKontrak").val(),
                  ajaxNoRekening:  $("#noRekening").val(),
                  ajaxNoEpf:  $("#noEpf").val()
              }
          );
      }
      // alert(url);
      $.ajax({
        url: url,
        type: "POST",
        data: postData,
        dataType: "JSON",
        success: function (data) {
          // alert(data["statusInsertToDb"]);
          if (data["statusInsertToDb"] == 1 || data["statusInsertToDb"] == 0) {

            if($('#btnReset').html()=="Cancel Update" && $("#imagePath").val() != "" ){
              
            }else{
              updatePhotoProfile(data["idPegawai"]);
            }

            
            Swal.fire({
              title: "Success",
              text: "user " + $("#namaPegawai").val() + " berhasil disimpan",
              icon: "success",
            }).then(function () {
              // table_setting_user.ajax.reload();
              if($('#btnReset').html()=="Cancel Update"){
                window.open(baseURL + 'pegawai_rekap_all/',"_self");
              }else{
                clearForm();
                location.reload();
              }

              
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
              text: "data user " + $("#namaPegawai").val() + " tidak berhasil disimpan",
              icon: "error",
            });
            // table_setting_user.ajax.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Failed",
            text: "data user " + $("#namaPegawai").val() + " tidak berhasil disimpan ke database",
            icon: "error",
          });

          // table_setting_user.ajax.reload();
        },
      });
    }
  });
}

// function save_data_pegawai() {
//     $('#loader_process').show();
//     var url = baseURL + "pegawai_save_data";

//     var postData = $.param(
//             { ajaxNamaPegawai: $("#namaPegawai").val(),
//                 ajaxJenisKelamin: $('input[name="jenisKelamin"]:checked').val(),
//                 ajaxTempatLahir: $("#tempatLahir").val(),
//                 ajaxTanggalLahir: $("#tanggalLahir").val(),
//                 ajaxTelepon: $("#telepon").val(),
//                 ajaxAktifKerja: $("#aktifKerja").val(),
//                 ajaxPendidikan: $("#pendidikan").val(),
//                 ajaxAlamat: $("#alamat").val(),
//                 ajaxStatusWni: $('input[name="statusWni"]:checked').val(),
//                 ajaxStatusKaryawan: $('input[name="statusKaryawan"]:checked').val(),
//                 ajaxNoPassport: $("#noPasspor").val(),
//                 ajaxJnsPaspor: $("#jnsPaspor").val(),
//                 ajaxLakuPaspor: $("#tglLakuPaspor").val(),
//                 ajaxIzinPaspor: $("#tglIzinPaspor").val(),
//             }
//         );


//     if($('input[name="statusKaryawan"]:checked').val()=='PNS'){
//         postData = postData + '&' + $.param(
//             {   ajaxGolongan: $("#rGolongan").val(),
//                 ajaxNip: $("#nip").val(),
//                 ajaxNip: $("#tglTerimaJabatan").val(),
//                 ajaxNip: $("#tglGelarDiplomatik").val(),
//             }
//         );
//     }else{
//         postData = postData + '&' + $.param(
//             {   ajaxStatusKerja: $("#rStatusKerja").val(),
//                 ajaxTugasKerja:  $("#rTugasKerja").val(),
//                 ajaxFungsiKerja:  $("#rFungsiKerja").val(),
//                 ajaxTglMasukKerja:  $("#tglMasukKerja").val(),
//                 ajaxTglAwalKontran:  $("#tglAwalKontrak").val(),
//                 ajaxTglAkhirKontran:  $("#tglAkhirKontrak").val(),
//                 ajaxNoKontrak:  $("#noKontrak").val(),
//                 ajaxNoRekening:  $("#noRekening").val(),
//                 ajaxNoEpf:  $("#noEpf").val()
//             }
//         );
//     }

//     $.ajax({
//         url: url,
//         type: "POST",
//         data: postData,
//         async: true,
//         dataType: "JSON",
//         success: function (data) {
//             $('#loader_process').hide();
//             updatePhotoProfile();
//             alert(data['statusInsertToDb']);
//             if (data['status_field'] == "success") {
//                 $('#modalConfSaveDataPegawai').modal('hide');
//                 showSuccessMessageX();
//             }
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             alert('Error adding / update data');
//             $('#loader_process').hide();
//         }
//     });
// }

function updatePhotoProfile(idPegawai){
    var url = baseURL + "update_profile_picture";
    // var $form = $('form');

    // sImage = $('#change_img').prop('files')[0];

    var data = new FormData();
    // alert(url+"/"+idPegawai);
    data.append('ajaxPhotoProfile', $('#change_img').prop('files')[0]);
    data.append('ajaxIdPegawai', idPegawai);

    // alert(data);

    // formData.append({ "file": file, 
    //   "id": $("#ID").val()), 
    //   "Name": $("#nameOne").val(), 
    //   "Name2": $("#nameTwo").val(), 
    //   "Name3": $("#nameThree").val()
    // });
    // data.append(
    //   { 
    //     ajaxIdPegawai: idPegawai,
    //     ajaxPhotoProfile: $('#change_img').prop('files')[0],
    //   }
    // );
    

    $.ajax({
        url: url,
        type: "POST",
        processData: false, // important
        contentType: false, // important
        data: data,
        dataType: "JSON",
        success: function (data) {
            // alert('Success update photo profile');
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

$('#btnReset').click(function(){

  if($('#btnReset').html()=="Cancel Update"){
    window.close();
  }
  
  clearForm();
})

$('#showDetailPns').click(function(){
    $("#collapseNonPns").collapse('hide');
})

$('#showDetailNonPns').click(function(){
    $("#collapsePns").collapse('hide');
})

function validationForm(inputId, boxIcon, msgError, textError) {

  if ($(inputId).val() == "" || $(inputId).val() == "-") {
    $(boxIcon).css({
      border: "1px solid red",
      color: "red",
    });

    $(inputId).addClass("form-control-danger");
    $(msgError).html(textError + " harus diisi");
    validationFormInput.push("noValid");
    // return "noValid";
  } else {
    $(boxIcon).css({
      border: "0px solid red",
      color: "red",
    });

    $(inputId).removeClass("form-control-danger");
    $(msgError).html("");
    validationFormInput.push("valid");
    // return "Valid";
  }
}

function validationFormRadio(radioId, msgError, textError) {


  // if($(radioId).attr('checked')===true) { 
    // do something
    // }
  // if ($(radioId).is(":not(:checked)")) {
  if(!$(radioId).val()) {
    $(msgError).html(textError + " harus dipilih");
    validationFormInput.push("noValid");
  }else{
    $(msgError).html("");
    validationFormInput.push("valid");
  }
  // alert($('input[name="jenisKelamin"]:checked').val());
  // if ($(radioId).val() == "Laki-laki" || $(radioId).val() == "Perempuan") {
  // if ($(radioId).val() == "" || $(radioId).val() == "") {
  //   // alert($(radioId).val());
  //   $(msgError).html("");
  //   validationFormInput.push("valid");
  //   // return "Valid";
  // } else {
  //   // alert($(radioId).val());
  //   $(msgError).html(textError + " harus dipilih");
  //   validationFormInput.push("noValid");
  //   // return "noValid";
  // }
}

$('#btnCancelPhoto').click(function(){
  $("#imagePath").val('');
  $("input[name='file_avatar']").val(null);
  $("#modify_img").attr("src", baseURL + "assets/picture_profiles/default_avatar.png");
})

$('#btnSubmit').click(function(){

    //   if($("input[name='jenisKelamin']:checked").val()) {
    //     alert('checked')
    // } else {
    //     alert('not checked.')
    // }

    // alert($('#aktifKerja').val());
    
    validationFormInput = [];

    validationForm('#namaPegawai','#boxIconNamaPegawai','#msgErrNamaPegawai','nama pegawai'); 
    validationForm('#tempatLahir','#boxIconTempatLahir','#msgErrTempatLahir','tempat lahir'); 
    validationForm('#tanggalLahir','#boxIconTanggalLahir','#msgErrTanggalLahir','tanggal lahir'); 
    validationForm('#telepon','#boxIconTelepon','#msgErrTelepon','telepon'); 
    validationForm('#aktifKerja','#boxIconAktifKerja','#msgErrAktifKerja','aktif kerja'); 
    validationForm('#pendidikan','#boxIconPendidikan','#msgErrPendidikan','pendidikan'); 
    validationForm('#alamat','#boxIconAlamat','#msgErrAlamat','alamat'); 

    validationFormRadio('input[name="jenisKelamin"]:checked', "#msgErrJenisKelamin", "jenis kelamin");
    validationFormRadio('input[name="statusWni"]:checked', "#msgErrStatusWni", "status wni");
    validationFormRadio('input[name="statusKaryawan"]:checked', "#msgStatusPns", "status pns");


    // alert(validationFormInput);
    if (validationFormInput.indexOf("noValid") > -1) {
    } else {
      btnSaveDataPegawai();
      // if($('#btnReset').html()=="Cancel Update"){
      //   btnUpdateDataPegawai();
      // }else{
      //   btnSaveDataPegawai();
      // }
      
    }

})

// document.getElementById('telepon').addEventListener('input', function (e) {
//   var x = e.target.value.replace(/\D/g, '').match(/(\d{0,4})(\d{0,4})(\d{0,7})/);
//   e.target.value = !x[2] ? x[1] : '' + x[1] + '-' + x[2] + (x[3] ? '-' + x[3] : '');
// });

$(function () {
  

  // $('#modify_img').attr('src', baseURL+'assets/picture_profiles/upload_avatar1.jpg');
  // $("#collapsePns").collapse();
  // alert(localStorage.getItem('status'));

  // $('#aktifKerja option').filter(function() {
  //   return $(this).text() === localStorage.getItem('status');
  // }).prop('selected', true);

  // alert(localStorage.getItem('id'));
    // $("#boxIconIdPegawai").css({
    //     border: "1px solid red",
    //     // color: "red",
    // });

    // $('#idPegawai').addClass('form-control-danger');
    // save_data_pegawai();

    if(localStorage.getItem('id')!=""){

      
      $('#pendidikan option').filter(function() {
          return $(this).text() === localStorage.getItem('pendidikan');
      }).prop('selected', true);

      $('#aktifKerja option').filter(function() {
        return $(this).text() === localStorage.getItem('status');
      }).prop('selected', true);

      $('#headerTitle').html("Edit Data Pegawai - " + localStorage.getItem('id'));

      $('#modify_img').attr('src', baseURL+localStorage.getItem('photo'));
      $('#imagePath').val(localStorage.getItem('photo'));
      
      $('#idPegawai').val(localStorage.getItem('id'));
      $('#namaPegawai').val(localStorage.getItem('nama'));
      $('#tempatLahir').val(localStorage.getItem('tempat_lahir'));
      $('#tanggalLahir').val(localStorage.getItem('tanggal_lahir'));
      $('#telepon').val(localStorage.getItem('telepon'));
      $('#pendidikan').trigger('change'); 
      $('#aktifKerja').trigger('change'); 
      $('#alamat').val(localStorage.getItem('alamat'));
      $("#laki-laki").attr("checked", (localStorage.getItem('jenis_kelamin')=='Laki-Laki' ? true : false));
      $("#perempuan").attr("checked", (localStorage.getItem('jenis_kelamin')=='Perempuan' ? true : false));
      $("#ya").attr("checked", (localStorage.getItem('wni')=='Y' ? true : false));
      $("#tidak").attr("checked", (localStorage.getItem('wni')=='N' ? true : false));
      // $("#pns").attr("checked", (localStorage.getItem('pns')=='Y' ? true : false));
      // $("#nonPns").attr("checked", (localStorage.getItem('pns')=='N' ? true : false));

      if(localStorage.getItem('pns')=='Y'){

        $('#rGolongan option').filter(function() {
          return $(this).text() === localStorage.getItem('jabatan');
        }).prop('selected', true);

        $("#pns").attr("checked", true);
        $("#collapsePns").collapse();
        $('#rGolongan').trigger('change'); 
        $('#nip').val(localStorage.getItem('nip'));
        $('#tglTerimaJabatan').val(localStorage.getItem('tmt'));
        $('#tglGelarDiplomatik').val(localStorage.getItem('gelar_diplomatik'));
      }else{

        $('#rStatusKerja option').filter(function() {
          return $(this).text() === localStorage.getItem('status_kerja');
        }).prop('selected', true);

        $('#rTugasKerja option').filter(function() {
          return $(this).text() === localStorage.getItem('tugas_kerja');
        }).prop('selected', true);

        $('#rFungsiKerja option').filter(function() {
          return $(this).text() === localStorage.getItem('fungsi_kerja');
        }).prop('selected', true);

        $("#nonPns").attr("checked", true);
        $("#collapseNonPns").collapse();

        $('#rStatusKerja').trigger('change'); 
        $('#rTugasKerja').trigger('change'); 
        $('#rFungsiKerja').trigger('change'); 

        $('#tglMasukKerja').val(localStorage.getItem('tgl_masuk_kontrak'));
        $('#tglAwalKontrak').val(localStorage.getItem('tgl_awal_kontrak'));
        $('#tglAkhirKontrak').val(localStorage.getItem('tgl_akhir_kontrak'));
        $('#noKontrak').val(localStorage.getItem('no_kontrak'));
        $('#noRekening').val(localStorage.getItem('no_rekening'));
        $('#noEpf').val(localStorage.getItem('no_epf'));

      }

      $('#noPasspor').val(localStorage.getItem('no_paspor'));
      $('#jnsPaspor').val(localStorage.getItem('jenis_paspor'));
      $('#tglLakuPaspor').val(localStorage.getItem('berlaku_paspor'));
      $('#tglIzinPaspor').val(localStorage.getItem('ijin_paspor'));
      // $('#idPegawai').val(localStorage.getItem('id'));
      
      

      $('#btnSubmit').html("Update Data");
      $('#btnReset').html("Cancel Update");

      localStorage.setItem('id', "");
    }else{
      $('#headerTitle').html("Input Data Pegawai")
    }
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

            $("#imagePath").val('');
        }
    });
});
