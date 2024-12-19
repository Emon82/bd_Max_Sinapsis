@extends('backend.app')

@section('title', 'All Creativity')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/vendor/datatable/css/datatables.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .portfolio-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
</style>
@endpush

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Creativity List</h4>

                    <div style="display: flex; justify-content: end; margin-bottom: 20px;">
                        <a href="{{ route('creativity.create') }}" style="background-color:#666633;color:white;" class="btn">Add New</a>
                    </div>

                    <div class="table-responsive mt-4 p-4">
                        <table class="table table-hover" id="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/vendor/datatable/js/datatables.min.js') }}"></script>
<script src="{{ asset('backend/vendor/sweetalert/sweetalert2@11.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('creativity.index') }}",
        columns: [{
                data: 'position',
                name: 'position'
            },
            {
                data: 'title_EESS',
                name: 'title_EESS',
                render: function(data, type, row) {
                    if (data && data.length > 5) {
                        return `<span title="${data}">${data.substring(0, 30)}...</span>`;
                    }
                    return data;
                },
            },
            {
                data: 'content_EESS',
                name: 'content_EESS',
                render: function(data, type, row) {
                    if (data && data.length > 5) {
                        return `<span title="${data}">${data.substring(0, 30)}...</span>`;
                    }
                    return data;
                },
            },
            {
                data: 'image',
                name: 'image',
                render: function(data) {
                    if (data) {
                        return `<img src="${data}" alt="Creative Image" class="img-thumbnail" style="width: 100px; height: auto;">`;
                    }
                    return 'No Image';
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });


    function editCreativity(id) {
        Swal.fire({
            title: 'Edit Creativity',
            text: 'Redirecting to edit page...',
            icon: 'info',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = `/update-creativity/${id}`;
        });
    }

    function deleteCreativity(id) {
        const url = '{{ route("creativity.destroy", ":id") }}'.replace(':id', id);
        const csrfToken = '{{ csrf_token() }}';

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Deleted!',
                            text: response.message,
                            icon: 'success',
                            timer: 2000
                        }).then(() => {
                            $('#data-table').DataTable().ajax.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: xhr.responseJSON?.message || 'Failed to delete record!',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }

    function swapSerialNumbers(id) {
        Swal.fire({
            title: 'Swap Serial Number',
            text: "Enter the new position to swap:",
            input: 'number',
            inputAttributes: {
                min: 1
            },
            showCancelButton: true,
            confirmButtonText: 'Swap',
            cancelButtonText: 'Cancel',
            preConfirm: (newPosition) => {
                if (newPosition === '' || isNaN(newPosition) || parseInt(newPosition) < 1) {
                    Swal.showValidationMessage('Please enter a valid position.');
                    return false;
                }
                return parseInt(newPosition);
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const newPosition = result.value;
                const url = `/creativity/${id}/swap-serial`;

                $.ajax({
                    url: url,
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        new_serial_number: newPosition
                    }),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success'
                        }).then(() => {
                            $('#data-table').DataTable().ajax.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error!',
                            text: xhr.responseJSON?.message || 'Failed to swap serial numbers.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }
</script>
@endpush