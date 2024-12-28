var table_rekap_all;
var dRow;
// var srcPhoto;
// function showImage(url) {
//   const modal = document.getElementById('imageModal');
//   const img = document.getElementById('modalImage');
//   img.src = url;
//   modal.style.display = 'block';
// }

function setLocalStorage(rPhoto)
{
  $('#dt_rekap_all tbody').on( 'click', 'tr', function () {
    // alert( table_rekap_all.row( this ).data() );
    dRow = table_rekap_all.row( this ).data();
    console.log( table_rekap_all.row( this ).data() );
    // alert(dRow[2]+"-"+dRow[3]+"-"+dRow[4]);

    localStorage.clear();
    localStorage.setItem('id', dRow[2]);
    localStorage.setItem('nama', dRow[3]);
    localStorage.setItem('tempat_lahir', dRow[4]);
    localStorage.setItem('tanggal_lahir', dRow[5]);
    localStorage.setItem('status', dRow[6]);
    localStorage.setItem('pendidikan', dRow[7]);
    localStorage.setItem('pns', dRow[8]);
    localStorage.setItem('wni', dRow[9]);
    localStorage.setItem('jenis_kelamin', dRow[10]);
    localStorage.setItem('alamat', dRow[11]);
    localStorage.setItem('telepon', dRow[12]);

    localStorage.setItem('jenis_paspor', dRow[13]);
    localStorage.setItem('no_paspor', dRow[14]);
    localStorage.setItem('berlaku_paspor', dRow[15]);
    localStorage.setItem('ijin_paspor', dRow[16]);

    localStorage.setItem('jabatan', dRow[17]);
    localStorage.setItem('nip', dRow[18]);
    localStorage.setItem('tmt', dRow[19]);
    localStorage.setItem('gelar_diplomatik', dRow[20]);


    localStorage.setItem('status_kerja', dRow[21]);
    localStorage.setItem('tugas_kerja', dRow[22]);
    localStorage.setItem('fungsi_kerja', dRow[23]);
    localStorage.setItem('tgl_masuk_kontrak', dRow[24]);
    localStorage.setItem('tgl_awal_kontrak', dRow[25]);
    localStorage.setItem('tgl_akhir_kontrak', dRow[26]);
    localStorage.setItem('no_kontrak', dRow[27]);
    localStorage.setItem('no_rekening', dRow[28]);
    localStorage.setItem('no_epf', dRow[29]);

    localStorage.setItem('photo', rPhoto);

    // alert(localStorage.getItem('nama'));

    $("#detIdPegawai").html(localStorage.getItem('id'));
    $("#detNama,#labelNamaPegawai").html(localStorage.getItem('nama'));
    $("#detTempatLahir").html(localStorage.getItem('tempat_lahir'));
    $("#detTanggalLahir").html(localStorage.getItem('tanggal_lahir'));
    $("#detStatus").html(localStorage.getItem('status'));
    $("#detPendidikan").html(localStorage.getItem('pendidikan'));
    $("#detPns").html(localStorage.getItem('pns'));
    $("#detWni").html(localStorage.getItem('wni'));
    $("#detJenisKelamin").html(localStorage.getItem('jenis_kelamin'));
    $("#detAlamat").html(localStorage.getItem('alamat'));
    $("#detTelepon").html(localStorage.getItem('telepon'));
    $("#detJenisPaspor").html(localStorage.getItem('jenis_paspor'));
    $("#detNoPaspor").html(localStorage.getItem('no_paspor'));
    $("#detBerlakuPaspor").html(localStorage.getItem('berlaku_paspor'));
    $("#detIjinPaspor").html(localStorage.getItem('ijin_paspor'));

    $("#detJabatan").html(localStorage.getItem('jabatan'));
    $("#detNip").html(localStorage.getItem('nip'));
    $("#detTmt").html(localStorage.getItem('tmt'));
    $("#detGelarDiplomatik").html(localStorage.getItem('gelar_diplomatik'));

    $("#detStatusKerja").html(localStorage.getItem('status_kerja'));
    $("#detTugasKerja").html(localStorage.getItem('tugas_kerja'));
    $("#detFungsiKerja").html(localStorage.getItem('fungsi_kerja'));
    $("#detTglMasukKontrak").html(localStorage.getItem('tgl_masuk_kontrak'));
    $("#detTglAwalKontrak").html(localStorage.getItem('tgl_awal_kontrak'));
    $("#detAkhirKontrak").html(localStorage.getItem('tgl_akhir_kontrak'));
    $("#detNoKontrak").html(localStorage.getItem('no_kontrak'));
    $("#detNoRekening").html(localStorage.getItem('no_rekening'));
    $("#detNoEpf").html(localStorage.getItem('no_epf'));

    $('#detPhoto').attr('src', baseURL+localStorage.getItem('photo'));

    if(localStorage.getItem('pns')=='Y'){
      $('#boxPns').show();
      $('#boxNonPns').hide();
    }else{
      $('#boxPns').hide();
      $('#boxNonPns').show();
    }

    // srcPhoto = localStorage.getItem('photo');
    

  });
}

function showDetailPegawai(rPhoto)
{
  setLocalStorage(rPhoto);
  $('#detailPegawaiModal').modal('show');
  // showImage(rPhoto); 
}

function tableRekapAll() {
  var url;
  url = baseURL + "get_data_rekap_all_pegawai";
  table_rekap_all = $("#dt_rekap_all").DataTable({
    order: [[3, "asc"]],
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
    // columns: [
    //   {
    //     data: 'image',
    //     render: function (data) {
    //         return `<a href="#" onclick="showImage('${data}')">Preview Image</a>`;
    //         // return `<a href="${data}" target="_blank">Preview Image</a>`;
    //     }
    // }
    // ],
    'columnDefs': [
        {
            "targets": 1, // your case first column
            "className": "text-center",
            // "width": "4%"
      },
      // {
      //       "targets": 2,
      //       "className": "text-right",
      // }
    ]
  });
}

// $('#lightgallery').click(function(){
//   // alert();
// })

// lightGallery(document.getElementById('lightgallery'));
$(function () {

  tableRekapAll();

  // $(".atest").attr("href", "http://localhost/aska/./assets/picture_profiles/upload_avatar1.jpg")
  // $(".imgtest").attr("src", "http://localhost/aska/./assets/picture_profiles/upload_avatar1.jpg")

  //  $('.lightgallery').lightGallery({
  //       thumbnail: true,
  //       selector: 'a'
  //   });
  
  // $(".lightgallery a:first-child > img").trigger("click");
  
});

function confirmDeleteData(rUser) {
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
      var url = baseURL + "delete_data_pegawai";
      var postData = $.param({
        ajaxIdPegawai: rUser,
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
              table_rekap_all.ajax.reload();
            });
          } else {
            Swal.fire({
              title: "Failed",
              text: "data user " + rUser + " tidak berhasil dihapus",
              icon: "error",
            });
            table_rekap_all.ajax.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          Swal.fire({
            title: "Failed",
            text: "data user " + rUser + " tidak berhasil dihapus",
            icon: "error",
          });
          table_rekap_all.ajax.reload();
        },
      });
    }
  });
}

function showImage1()
{
  
  $(".atest").attr("href", imagePath)
  $(".imgtest").attr("src", imagePath)

   $('.lightgallery').lightGallery({
        thumbnail: true,
        selector: 'a'
    });
  
  $(".lightgallery a:first-child > img").trigger("click");
}

function showImage(rPhoto)
{
  // alert(baseURL + rUser);
  $(".atest").attr("href", baseURL + rPhoto)
  $(".imgtest").attr("src", baseURL + rPhoto)

   $('.lightgallery').lightGallery({
        thumbnail: true,
        selector: 'a'
    });
  
  $(".lightgallery a:first-child > img").trigger("click");
}

function confirmUpdateDataPegawai(rPegawai,rPhoto) {

  setLocalStorage(rPhoto);

  Swal.fire({
    title: "anda yakin ingin merubah data pegawai ini ?",
    text: "user " + rPegawai,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
  }).then((result) => {
    if (result.isConfirmed) {
      // alert('test');
      // window.location.href = baseURL + 'pegawai_input_data/' + '?id='+rPegawai;
      // window.open(baseURL + 'pegawai_input_data/' + '?id='+rPegawai, '_blank');

      // set the item in localStorage
      
      
      // alert the value to check if we got it
      // alert(localStorage.getItem('id'));
      
      window.open(baseURL + 'pegawai_input_data/', '_blank');
    }
  });
}
