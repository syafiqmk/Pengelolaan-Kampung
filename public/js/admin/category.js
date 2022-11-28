function getData() {
    $('#table-body').empty();
    $.ajax({
        url: '/admin/get-category',
        type: 'GET',
        cache: false,
        success: function(data) {
            if(data.count == 0) {
                $('#table-body').append(`
                    <tr>
                        <td colspan="3" class="text-center">No entries found.</td>
                    </tr>
                `);
            } else {
                $.each(data.categories, function(index, category) {
                    $('#table-body').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${category.category}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-primary" onClick="update(${category.id})">Update</a>
                                    <a href="javascript:void(0)" class="btn btn-danger" onClick="hapus(${category.id})">Delete</a>
                                </div>
                            </td>
                        </tr>
                    `);
                });
            }
        }
    });
}

$(document).ready(function() {
    getData();
});


// Tambah
$('#tambah').click(function(e) {
    e.preventDefault();
    
    $('#modal-title').text('Tambah Kategori Pengaduan');
    $('#category-input').val('');
    $('#btn-submit').attr('onclick', 'storeProcess()');
    $('#btn-submit').text('Tambah');
});

function storeProcess() {    
    let token = $("meta[name='csrf-token']").attr('content');
    let category = $('#category-input').val();

    if(category == '') {
        Swal.fire({
            icon: 'warning',
            text: 'Input tidak boleh kosong!',
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        $.ajax({
            url: "/admin/category",
            type: "POST",
            cache: false,
            data: {
                'category': category,
                '_token': token
            },
            success: function(data) {
                Swal.fire({
                    icon: data.icon,
                    text: data.message,
                    showConfirmButton: false,
                    timer: 2000
                });
                $('#modal').modal('hide');
                getData();
            },
            error: function(data) {
                Swal.fire({
                    icon: data.icon,
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }
}

// Hapus
function hapus(id) {
    let token = $("meta[name='csrf-token']").attr('content');

    Swal.fire({
        icon: "warning",
        text: "Hapus Data?",
        showCancelButton: true,
        cancelButtonText: "Cancel",
        confirmButtonText: "Hapus"
    }).then((result) => {
        if(result.isConfirmed) {
            $.ajax({
                url: '/admin/category/'+id,
                type: "DELETE",
                cache: false,
                data: {
                    '_token': token
                }, 
                success: function(data) {
                    Swal.fire({
                        icon: data.icon,
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    getData();
                },
                error : function(data) {
                    Swal.fire({
                        icon: data.icon,
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }
    });
}

// Update
function update(id) {
    
    $('#modal-title').text('');
    $('#category-input').val('');

    $.ajax({
        url: '/admin/category/'+id,
        type: 'GET',
        cache: false,
        success: function(data) {
            $('#modal-title').text('Update');
            $('#category-input').val(data.category.category);
            $('#modal').modal('show');
            $('#btn-submit').attr('onclick', `updateProcess(${id})`);
            $('#btn-submit').text('Update');
        }
    });
}

function updateProcess(id) {
    let token = $("meta[name='csrf-token']").attr('content');
    let input = $('#category-input').val();

    if (input == '') {
        Swal.fire({
            icon: 'warning',
            text: 'Input tidak boleh kosong!',
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        $.ajax({
            url: '/admin/category/' + id,
            type: 'PUT',
            cache: false,
            data: {
                'category': input,
                '_token': token
            },
            success: function (data) {
                Swal.fire({
                    icon: data.icon,
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
                $('#modal').modal('hide');
                getData();
            },
            error: function (data) {
                Swal.fire({
                    icon: data.icon,
                    text: data.message,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }
}