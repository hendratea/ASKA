var table_referensi_golongan;function table_refGolongan(){var a;a=baseURL+"get_referensi_golongan",table_referensi_golongan=$("#dt_referensi_golongan").DataTable({destroy:!0,iDisplayLength:10,processing:!0,searching:!0,ajax:{url:a,type:"GET"},language:{processing:'<div class="loader"><div class="m-t-30"><img class="zmdi-hc-spin" src="'+baseURL+'assets/template/images/loader.svg" width="48" height="48" alt="Aero"></div><p>Processing...</p></div>'}})}function btnSaveData(){Swal.fire({title:"anda yakin ingin menyimpan data ini ?",text:"status "+$("#status").val(),icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya",cancelButtonText:"Tidak"}).then((a=>{if(a.isConfirmed){var t=baseURL+"save_referensi_golongan",n=$.param({ajaxID:$("#ID").val(),ajaxStatus:$("#status").val(),ajaxAptln:$("#aptln").val()});$.ajax({url:t,type:"POST",data:n,dataType:"JSON",success:function(a){1==a.statusInsertToDb?Swal.fire({title:"Success",text:"ID "+$("#ID").val()+" berhasil disimpan",icon:"success"}).then((function(){table_referensi_golongan.ajax.reload(),$("#ID,#status,#aptln").val("")})):2==a.statusInsertToDb?Swal.fire({title:"Failed",text:"data ID "+$("#ID").val()+" sudah ada",icon:"error"}):(Swal.fire({title:"Failed",text:"data ID "+$("#ID").val()+" tidak berhasil disimpan",icon:"error"}),table_referensi_golongan.ajax.reload())},error:function(a,t,n){Swal.fire({title:"Failed",text:"data ID "+$("#ID").val()+" tidak berhasil disimpan",icon:"error"}),table_referensi_golongan.ajax.reload()}})}}))}function btnUpdateData(){Swal.fire({title:"anda yakin ingin menyimpan perubahan data ini ?",text:"status "+$("#status").val(),icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya",cancelButtonText:"Tidak"}).then((a=>{if(a.isConfirmed){$("#btnUpdate").hide(),$("#btnCancel").hide(),$("#btnSubmit").show(),$("#btnReset").show();var t=baseURL+"update_referensi_golongan",n=$.param({ajaxID:$("#ID").val(),ajaxStatus:$("#status").val(),ajaxAptln:$("#aptln").val()});$.ajax({url:t,type:"POST",data:n,dataType:"JSON",success:function(a){1==a.statusUpdateToDb?Swal.fire({title:"Success",text:"ID "+$("#ID").val()+" berhasil diubah",icon:"success"}).then((function(){table_referensi_golongan.ajax.reload(),$("#ID,#status,#aptln").val("")})):(Swal.fire({title:"Failed",text:"data ID "+$("#ID").val()+" tidak berhasil diubah",icon:"error"}),table_referensi_golongan.ajax.reload())},error:function(a,t,n){Swal.fire({title:"Failed",text:"data ID "+$("#ID").val()+" tidak berhasil diubah",icon:"error"}),table_referensi_golongan.ajax.reload()}})}}))}function confirmDeleteData(a){Swal.fire({title:"anda yakin ingin menghapus data ini ?",text:"ID "+a,icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya",cancelButtonText:"Tidak"}).then((t=>{if(t.isConfirmed){var n=baseURL+"delete_referensi_golongan",e=$.param({ajaxID:a});$.ajax({url:n,type:"POST",data:e,dataType:"JSON",success:function(t){1==t.statusDeleteToDb?Swal.fire({title:"Success",text:"ID "+a+" berhasil dihapus",icon:"success"}).then((function(){table_referensi_golongan.ajax.reload()})):(Swal.fire({title:"Failed",text:"data ID "+a+" tidak berhasil dihapus",icon:"error"}),table_referensi_golongan.ajax.reload())},error:function(t,n,e){Swal.fire({title:"Failed",text:"data ID "+a+" tidak berhasil dihapus",icon:"error"}),table_referensi_golongan.ajax.reload()}})}}))}function confirmUpdateData(a){Swal.fire({title:"anda yakin ingin merubah data ini ?",text:"ID "+a,icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Ya",cancelButtonText:"Tidak"}).then((t=>{if(t.isConfirmed){$("#btnUpdate").show(),$("#btnCancel").show(),$("#btnSubmit").hide(),$("#btnReset").hide(),$("#ID").prop("disabled",!0);var n=baseURL+"get_forupdate_referensi_golongan",e={ajaxID:a};$.getJSON(n,e).done((function(a){$("#ID").val(a.ID),$("#status").val(a.status),$("#aptln").val(a.aptln)})).fail((function(a,t,n){alert("Request DataFailed : "+(t+", "+n))}))}}))}function validationForm(a,t,n,e){return""==$(a).val()?($(t).css({border:"1px solid red",color:"red"}),$(a).addClass("form-control-danger"),$(n).html(e+" harus diisi"),"noValid"):($(t).css({border:"0px solid red",color:"red"}),$(a).removeClass("form-control-danger"),$(n).html(""),"Valid")}$((function(){table_refGolongan()})),$("#btnReset").click((function(){$("#btnCancel").click()})),$("#btnCancel").click((function(){$("#btnUpdate,#btnCancel").hide(),$("#ID").prop("disabled",!1),$("#btnSubmit,#btnReset").show(),$("#ID,#status,#aptln").val("")})),$("#btnSubmit").click((function(){validationFormValid=[],statusValidStatus=validationForm("#status","#boxIconStatus","#msgErrStatus","status"),statusValidAptln=validationForm("#aptln","#boxIconAptln","#msgErrAptln","aptln"),validationFormValid.push(statusValidStatus,statusValidAptln),validationFormValid.indexOf("noValid")>-1||btnSaveData()})),$("#btnUpdate").click((function(){validationFormValid=[],statusValidStatus=validationForm("#status","#boxIconStatus","#msgErrStatus","status"),statusValidAptln=validationForm("#aptln","#boxIconAptln","#msgErrAptln","aptln"),validationFormValid.push(statusValidStatus,statusValidAptln),validationFormValid.indexOf("noValid")>-1||btnUpdateData()}));