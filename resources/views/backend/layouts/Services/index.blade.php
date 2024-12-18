@extends('backend.app')

@section('title', 'All Services')

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/vendor/datatable/css/datatables.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Services</h4>

                    <div style="display: flex; justify-content: end;">
                        <a href="{{ route('services.create') }}" style="background-color:#666633;color:white;" class="btn">Add New</a>
                    </div>

                    <div class="table-responsive mt-4 p-4">
                        <table class="table table-hover" id="data-table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
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
    $(document).ready(function() {
        // Initialize DataTable
        let dTable = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('services.index') }}",
            columns: [{
                    data: 'position',
                    name: 'position',
                },
                {
                    data: 'title_iinn',
                    name: 'title_iinn'
                },
                {
                    data: 'description_iinn',
                    name: 'description_iinn',
                    render: function(data, type, row) {
                        if (data && data.length > 5) {
                            return `<span title="${data}">${data.substring(0, 30)}...</span>`;
                        }
                        return data;
                    },
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                          <button onclick="swapSerialNumbers(${row.id})" class="btn btn-info btn-sm ml-2">Swap Serial</button>
                                <button onclick="editService(${row.id})" class="btn btn-warning btn-sm">Edit</button>
                                <button onclick="deleteService(${row.id})" class="btn btn-danger btn-sm">Delete</button>
                            `;
                    }
                }
            ]
        });
    });

    // Edit Service Function
    function editService(id) {
        Swal.fire({
            title: 'Edit Service',
            text: 'Redirect to Edit Page',
            icon: 'info',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = `/edit/${id}`;
        });
    }


    function deleteService(id) {
        const url = '{{ route("services.destroy", ":id") }}'.replace(':id', id);
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
                            text: xhr.responseJSON?.message || 'Failed to delete project!',
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
                const url = `/services/${id}/swap-serial`;

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