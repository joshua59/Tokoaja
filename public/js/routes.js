function main_content(cont) {
    $('#content_list').hide();
    $('#content_input').hide();
    $('#' + cont).show();
}
$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            load_list(page);
        }
    }
});
$(document).ready(function()
{
    $(document).on('click', '.paginasi',function(event)
    {
        event.preventDefault();

        $('a').removeClass('active');
        $(this).parent('a').addClass('active');
        // var myurl = $(this).attr('href');
        var page= $(this).attr('halaman').split('page=')[1];
        load_list(page);
    });

});
function load_list(page){
    $.get('?page=' + page,$('#form_filter').serialize(), function(result) {
        $('#list_result').html(result);
        main_content('content_list');
    }, "html");
}
function load_content_input(url,id) {
    // show_progress('input');
    $.post(url, {id:id}, function(result) {
        $('#content_input').html(result);
        main_content('content_input');
        // hide_progress();
    }, "html");
}
function open_modal(id)
{
    $(id).modal('show');
}
function handle_save(tombol,form,url,method)
{
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Harap tunggu");
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                success_message(response.message);
                $(form)[0].reset();
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html("Kirim");
                    load_list(1)
                }, 2000);
            } else {
                error_message(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html("Kirim");
                }, 2000);
            }
        },
    });
    
}
function save_form_modal(tombol,form,url,modal)
{
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Harap tunggu");
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                success_message(response.message);
                $(form)[0].reset();
                $(modal).modal('toggle');
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html("Kirim");
                }, 2000);
            } else {
                error_message(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html("Kirim");
                }, 2000);
            }
        },
    });
    
}
function upload_form_modal(tombol,form,url,modal)
{
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append('_method', 'POST');
        $(tombol).prop("disabled", true);
        $(tombol).html("Harap tunggu");
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.alert=="success") {
                    success_message(response.message);
                    $(form)[0].reset();
                    $(modal).modal('hide');
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html("Kirim");
                    }, 2000);
                } else {
                    error_message(response.message);
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html("Kirim");
                    }, 2000);
                }
            },
        });
        return false;
    });

}
function handle_confirm(id,url,table)
{
    Swal.fire({
        title: "Are you sure?",
        text: "You can't revert this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, sure!",
        cancelButtonText: "No, Cancel it!",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
                    if (response.alert=="success") {
                        Swal.fire(
                            "Confirm success!",
                            response.message,
                            "success"
                        );
                        location.reload();
                        // $(table).DataTable().ajax.reload();
                    }
                },
            });
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Canceled",
                "You have canceled data confirmation",
                "error"
            )
        }
    });
}

function handle_delete(id,url)
{
    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, tentu",
        cancelButtonText: "Tidak",
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (response) {
                    if (response.alert=="success") {
                        Swal.fire(
                            "Penghapusan sukses!",
                            response.message,
                            "success"
                        );
                        load_list(1);
                    }
                },
            });
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Dibatalkan",
                "Penghapusan data dibatalkan",
                "error"
            )
        }
    });
}







function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
       h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
 }
 function checkTime(i) {
    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
    return i;
 }