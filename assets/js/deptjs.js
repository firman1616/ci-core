$(document).ready(function() {
    tableDepartement();
    $('#id').val('');
    $('#DeptForm').trigger("reset");

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
            data: $('#deptForm').serialize(),
            url: BASE_URL + "Master/tambahDept",
            type: "POST",
            datatype: 'json',
            success: function(data) {
                $('#deptForm').trigger("reset");
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Berhasil ditambahkan',
                    showConfirmButton: false,
                    timer: 1500
                })
                tableDepartement();
            },
            error: function(data) {
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
                    url: BASE_URL + "Master/hapusDept/" + id,
                    // data: { id: id },
                    // type: 'DELETE'
                    method: 'POST'
                });                   
                Swal.fire(
                    'Deleted!',
                    'Data berhasil dihapus.',
                    'success'
                )
                tableDepartement();
            }
        })
    });

    $('body').on('click','.edit',function (e) {
        var id = $(this).data('id');
        var kode = $(this).data('kode_dept');
        var name = $(this).data('nama_dept');
        $.ajax({
            url: BASE_URL + "Master/vedit/" + id,
            type: 'GET',            
            success: function (res) {
                console.log(kode);
                $('#id').val(id);
                $('#kode_dept').val(kode);
                $('#nama_dept').val(name);
            }
        })
    })
});

function tableDepartement() {
    $.ajax({
        url: BASE_URL + "Master/tableDept",
        type: "POST",
        success: function (data) {
            $('#div-table-departement').html(data);
            $('#deptTable').DataTable({
                "processing": true,
                "responsive": true,
            });
        }
    });
}
