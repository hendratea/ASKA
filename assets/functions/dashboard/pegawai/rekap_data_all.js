var table_rekap_all;

// function showImage(url) {
//   const modal = document.getElementById('imageModal');
//   const img = document.getElementById('modalImage');
//   img.src = url;
//   modal.style.display = 'block';
// }

function tableRekapAll() {
  var url;
  url = baseURL + "get_data_rekap_all_pegawai";
  table_rekap_all = $("#dt_rekap_all").DataTable({
    order: [[2, "asc"]],
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

function showImage(rUser)
{
  // alert(baseURL + rUser);
  $(".atest").attr("href", baseURL + rUser)
  $(".imgtest").attr("src", baseURL + rUser)

   $('.lightgallery').lightGallery({
        thumbnail: true,
        selector: 'a'
    });
  
  $(".lightgallery a:first-child > img").trigger("click");
}
