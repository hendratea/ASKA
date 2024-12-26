$(function () {
    $('.js-sweetalert button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'basic') {
            showBasicMessage();
        }
        else if (type === 'with-title') {
            showWithTitleMessage();
        }
        else if (type === 'success') {
            showSuccessMessage();
        }
        else if (type === 'confirm') {
            showConfirmMessage();
        }
        else if (type === 'html-message') {
            showHtmlMessage();
        }
        else if (type === 'autoclose-timer') {
            showAutoCloseTimerMessage();
        }
        else if (type === 'we-set-buttons') {
            showWeSet3Buttons();
        }
        else if (type === 'AJAX-requests') {
            showAJAXrequests();
        }
        else if (type === 'DOM-content') {
            showDOMContent();
        }
    });
});

//These codes takes from http://t4t5.github.io/sweetalert/

function showBasicMessage() {
    swal("Hello world!");
}
function showWithTitleMessage() {
    swal("Here's a message!", "It's pretty, isn't it?");
}
function showSuccessMessage() {
    swal("Good job!", "You clicked the button!", "success");    
}
// function showConfirmMessage() {
//     swal({
//         title: "Are you sure?",
//         text: "Once deleted, you will not be able to recover this imaginary file!",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//       })
//       .then((willDelete) => {
//         if (willDelete) {
//           swal("Poof! Your imaginary file has been deleted!", {
//             icon: "success",
//           });
//         } else {
//           swal("Your imaginary file is safe!");
//         }
//     });
// }

function showConfirmMessage() {
    swal({
        title: "Apakah anda ingin menyimpan data ?",
        text: "user " + $("#userId").val(),
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                
                var url = baseURL + "save_data_setting_user";

                var postData = $.param(
                    { ajaxUserId: $("#userId").val(),
                        ajaxPassword: $("#password").val(),
                        ajaxEmail: $("#email").val(),
                        ajaxRoleUser: $("#roleUser").val(),
                        ajaxStatusAktif: $('input[name="statusAktif"]:checked').val(),
                    }
                );
                $.ajax({
                    url: url,
                    type: "POST",
                    data: postData,
                    dataType: "JSON",
                    success: function (data) {
                        if (data['statusInsertToDb'] == 1) {
                            swal("Success! user " + $("#userId").val() + ' berhasil disimpan', {
                                icon: "success",
                            }).then(function () {
                                table_setting_user.ajax.reload();
                                $("#userId,#password,#email").val('');
                                $('input[name="statusAktif"]').prop('checked', false);
                                $("#roleUser").val(null).trigger('change');
                            });
                        }else if(data['statusInsertToDb'] == 2){

                            swal({
                                title: "<small>Title</small>!",
                                text: "failed user "+$("#userId").val()+" sudah ada",
                                html: true,
                                icon: "question"
                            });

                            swal("failed user "+$("#userId").val()+" sudah ada");
                        }else{
                            swal("Error adding data");
                            table_setting_user.ajax.reload();
                        }
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Error adding  data");
                        table_setting_user.ajax.reload();
                    }
                });

            } else {
                swal("your cancel this change"); 
            }
        });
}

function showConfirmDelete(rUser) {
    swal({
        title: "Apakah anda ingin hapus data ?",
        text: "user " + rUser,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                
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
                            swal("Success! user " + $("#userId").val() + ' berhasil dihapus', {
                                icon: "success",
                            }).then(function () {
                                table_setting_user.ajax.reload();
                            });
                        }else{
                            swal("Error hapus data");
                            table_setting_user.ajax.reload();
                        }
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Error hapus data");
                        table_setting_user.ajax.reload();
                    }
                });

            } else {
                swal("your cancel this change"); 
            }
        });
}

function showConfirmUpdate(rUser) {
    swal({
        title: "Apakah anda ingin update data ?",
        text: "user " + rUser,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $("#btnUpdate").show();
                $("#btnSubmit").hide();
                swal.close();
            } else {
                swal("your cancel this change"); 
                $("#btnUpdate").hide();
                $("#btnSubmit").show();
            }
        });
}

function showConfirmMessageUpdate(rUser){
    swal({
        title: "Apakah anda ingin update data ?",
        text: "user " + rUser,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                
                var url = baseURL + "update_data_setting_user";

                var postData = $.param(
                    { ajaxUserId: $("#userId").val(),
                        ajaxPassword: $("#password").val(),
                        ajaxEmail: $("#email").val(),
                        ajaxRoleUser: $("#roleUser").val(),
                        ajaxStatusAktif: $('input[name="statusAktif"]:checked').val(),
                    }
                );
                $.ajax({
                    url: url,
                    type: "POST",
                    data: postData,
                    dataType: "JSON",
                    success: function (data) {
                        // alert(data['statusInsertToDb']);
                        if (data['statusInsertToDb'] == 1) {
                            swal("Success! user " + $("#userId").val() + ' berhasil disimpan', {
                                icon: "success",
                            }).then(function () {
                                table_setting_user.ajax.reload();
                                $("#userId,#password,#email").val('');
                                $('input[name="statusAktif"]').prop('checked', false);
                                $("#roleUser").val(null).trigger('change');
                            });
                        }else{
                            swal("Error update data");
                            table_setting_user.ajax.reload();
                        }
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        swal("Error update data");
                        table_setting_user.ajax.reload();
                    }
                });

            } else {
                swal("your cancel this change"); 
            }
        });
}

function showHtmlMessage() {
    swal({
        title: "HTML <small>Title</small>!",
        text: "A custom <span style=\"color: #CC0000\">html<span> message.",
        html: true
    });
}
function showAutoCloseTimerMessage() {
    swal({
        title: "Auto close alert!",
        text: "I will close in 2 seconds.",
        timer: 2000,
        showConfirmButton: false
    });
}
function showWeSet3Buttons() {
    swal("A wild Pikachu appeared! What do you want to do?", {
        buttons: {
        cancel: "Run away!",
        catch: {
            text: "Throw Pokéball!",
            value: "catch",
        },
        defeat: true,
        },
    })
    .then((value) => {
        switch (value) {
    
        case "defeat":
            swal("Pikachu fainted! You gained 500 XP!");
            break;
    
        case "catch":
            swal("Gotcha!", "Pikachu was caught!", "success");
            break;
    
        default:
            swal("Got away safely!");
        }
    });
}
function showAJAXrequests() {
    swal({
        text: 'Search for a movie. e.g. "La La Land".',
        content: "input",
        button: {
        text: "Search!",
        closeModal: false,
        },
    })
    .then(name => {
        if (!name) throw null;
    
        return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
    })
    .then(results => {
        return results.json();
    })
    .then(json => {
        const movie = json.results[0];
    
        if (!movie) {
        return swal("No movie was found!");
        }
    
        const name = movie.trackName;
        const imageURL = movie.artworkUrl100;
    
        swal({
        title: "Top result:",
        text: name,
        icon: imageURL,
        });
    })
    .catch(err => {
        if (err) {
        swal("Oh noes!", "The AJAX request failed!", "error");
        } else {
        swal.stopLoading();
        swal.close();
        }
    });
}
function showDOMContent() {
    swal("Write something here:", {
        content: "input",
    })
    .then((value) => {
        swal(`You typed: ${value}`);
    });
}
