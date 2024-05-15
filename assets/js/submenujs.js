$(document).ready(function() {
    tableSubMenu();
    $('.select2').select2() 
    $('#id').val('');
    $('#menuForm').trigger("reset");

    // tambah data
    $('#save-data').click(function (e) { 
        e.preventDefault();

        Swal.fire({
            icon: 'info',
            title: 'Data Sedang diproses',
            showConfirmButton: false,
            // timer: 3000
        })

        $.ajax({
            data: $('#menuForm').serialize(),
            url: BASE_URL + "menu/store",
            type: "POST",
            datatype: 'json',
            success: function(data) {
                $('#menuForm').trigger("reset");
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                tableMenu();
            },
            error: function(data) {
                console.log(data);
                console.log('Error:', data);
                $('$save-data').html('Save changes');
            }
        });
     })

    //  hapus data
    // delete function
    $('body').on('click', '.delete', function(e) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data('id');
                $.ajax({
                    url: BASE_URL + "Modul/delete/" + id,
                    // data: { id: id },
                    // type: 'DELETE'
                    method: 'POST'
                });                   
                Swal.fire(
                    'Deleted!',
                    'Data berhasil dihapus.',
                    'success'
                )
                tableMenu();
            }
        })
    });

    $('body').on('click','.edit',function (e) {
        var id = $(this).data('id');
        $.ajax({
            url: BASE_URL + "Menu/vedit/" + id,
            type: 'GET',
            dataType : 'json',            
            success: function (data) {
                console.log(data);
                $('#id').val(id);
                $('#nama_menu').val(data.nama_menu);
                $('#url_menu').val(data.url_menu);
                $('#modul').val(data.modul_id).trigger('change');
                
            }
        })
    })

    // select chain
    $('#modul').change(function () { 
        $.ajax({
            type: "POST",
            url: BASE_URL + "Submenu/getMenu",
            data: {modul_id : $("#modul").val()},
            dataType: "json",
            beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                  e.overrideMimeType("application/json;charset=UTF-8");
                }
            },
            success: function(response){ // Ketika proses pengiriman berhasil
                $("#loading").hide(); // Sembunyikan loadingnya
                // set isi dari combobox kota
                // lalu munculkan kembali combobox kotanya
                $("#menu").html(response.list_menu).show();
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
        });

        // var modul_id = $(this).data('modul_id');
        // if (modul_id != '') {
        //     $.ajax({
        //         url: BASE_URL + "Submenu/getMenu",
        //         method: "POST",
        //         data: {modul_id:modul_id},
        //         dataType: 'json',
        //         success: function (data) { 
        //             // console.log(modul_id);
        //             $('#menu').html('<option selected="selected">Choose One</option>')
        //             $.each(data, function (key,value) { 
        //                 $('#menu').append('<option value="'+ value.id_menu +'">'+ value.nama_menu +'</option>');
        //              });
        //          }
        //     });
        // }else{
        //     $('#menu').html('<option selected="selected">Choose One</option>');
        // }
     })
     
});

function tableSubMenu() {
    $.ajax({
        url: BASE_URL + "Submenu/tableSubMenu",
        type: "POST",
        success: function (data) {
            $('#div-table-submenu').html(data);
            $('#submenuTable').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
