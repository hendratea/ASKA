var table_ijin_cetakdata;function table_CetakIjin(){var t;t=baseURL+"get_cetakijin",table_ijin_cetakdata=$("#dt_ijin_cetakdata").DataTable({order:[5,"asc"],destroy:!0,iDisplayLength:10,processing:!0,searching:!0,ajax:{url:t,type:"GET"},language:{processing:'<div class="loader"><div class="m-t-30"><img class="zmdi-hc-spin" src="'+baseURL+'assets/template/images/loader.svg" width="48" height="48" alt="Aero"></div><p>Processing...</p></div>'}})}function confirmSendingData(t){let e=moment($("#tglDibuat").val()).format("YYYY-MM-DD");Swal.fire({title:"Kirim pengajuan Ijin untuk tanggal",text:e,icon:"question",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya",cancelButtonText:"Tidak"}).then((t=>{t.isConfirmed&&Swal.fire({title:"BERHASIL Terkirim",text:"pengajuan Ijin untuk tanggal "+e,icon:"success",timer:3e3})}))}function confirmPrintData(t){let e=moment($("#tglDibuat").val()).format("YYYY-MM-DD");Swal.fire({title:"Cetak Form Resmi Ijin untuk tanggal",text:e,icon:"question",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya",cancelButtonText:"Tidak"}).then((t=>{t.isConfirmed&&Swal.fire({title:"BERHASIL Tercetak",text:"Form Resmi Ijin untuk tanggal "+e,icon:"success",timer:3e3})}))}$((function(){table_CetakIjin()}));