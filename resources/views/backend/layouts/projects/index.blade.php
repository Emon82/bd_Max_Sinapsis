@extends('backend.app')

@section('title', 'All Projects')

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
                    <h4 class="card-title">All Projects List</h4>

                    <div style="display: flex; justify-content: end; margin-bottom: 20px;">
                        <a href="{{ route('projects.create') }}" style="background-color:#666633;color:white;" class="btn">Add New</a>
                    </div>

                    <div class="table-responsive mt-4 p-4">
                        <table class="table table-hover" id="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <!-- <th>Serial Number</th> -->
                                    <th>Title</th>
                                    <!-- <th>Title (IINN)</th> -->
                                    <th>Location </th>
                                    <!-- <th>Location (IINN)</th> -->
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
        let dTable = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('projects.index') }}",
            columns: [{
                    data: 'position',
                    name: 'position'
                },
                // { data: 'serial_number', name: 'serial_number' },
                {
                    data: 'title_EESS',
                    name: 'title_EESS'
                },
                {
                    data: 'location_EESS',
                    name: 'location_EESS',
                    render: function(data, type, row) {
                        if (data && data.length > 5) {
                            return `<span title="${data}">${data.substring(0, 20)}...</span>`;
                        }
                        return data;
                    },
                },
                {
                    data: 'description_EESS',
                    name: 'description_EESS',
                    render: function(data, type, row) {
                        if (data && data.length > 5) {
                            return `<span title="${data}">${data.substring(0, 25)}...</span>`;
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
            <button onclick="editProject(${row.id})" class="btn btn-warning btn-sm">Edit</button>
            <button onclick="deleteProject(${row.id})" class="btn btn-danger btn-sm">Delete</button>
        `;
                    }
                }
            ]
        });
    });

    function editProject(id) {
        Swal.fire({
            title: 'Edit Project',
            text: 'Redirect to Edit Page',
            icon: 'info',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = `/projects/${id}/edit`;
        });
    }

    function deleteProject(id) {
        const url = '{{ route("projects.destroy", ":id") }}'.replace(':id', id);
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
                const url = `/projects/${id}/swap-serial`;

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
    // function swapSerialNumbers(id) {
    //     Swal.fire({
    //         title: 'Swap Serial Number',
    //         html: `
    //         <input id="current-position" type="number" placeholder="Current Position" min="1" class="swal2-input">
    //         <input id="new-position" type="number" placeholder="New Position" min="1" class="swal2-input">
    //     `,
    //         showCancelButton: true,
    //         confirmButtonText: 'Swap',
    //         cancelButtonText: 'Cancel',
    //         preConfirm: () => {
    //             const currentPosition = document.getElementById('current-position').value;
    //             const newPosition = document.getElementById('new-position').value;

    //             if (!currentPosition || !newPosition) {
    //                 Swal.showValidationMessage('Please enter both positions.');
    //                 return false;
    //             }
    //             if (parseInt(currentPosition) < 1 || parseInt(newPosition) < 1) {
    //                 Swal.showValidationMessage('Both positions must be positive numbers.');
    //                 return false;
    //             }
    //             return {
    //                 currentPosition: parseInt(currentPosition),
    //                 newPosition: parseInt(newPosition)
    //             };
    //         }
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             const {
    //                 currentPosition,
    //                 newPosition
    //             } = result.value;
    //             const url = `/projects/${id}/swap-serial`;

    //             $.ajax({
    //                 url: url,
    //                 type: 'POST',
    //                 contentType: 'application/json',
    //                 data: JSON.stringify({
    //                     current_serial_number: currentPosition,
    //                     new_serial_number: newPosition
    //                 }),
    //                 headers: {
    //                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //                 },
    //                 success: function(response) {
    //                     Swal.fire({
    //                         title: 'Success!',
    //                         text: response.message,
    //                         icon: 'success'
    //                     }).then(() => {
    //                         $('#data-table').DataTable().ajax.reload();
    //                     });
    //                 },
    //                 error: function(xhr) {
    //                     Swal.fire({
    //                         title: 'Error!',
    //                         text: xhr.responseJSON?.message || 'Failed to swap serial numbers.',
    //                         icon: 'error'
    //                     });
    //                 }
    //             });
    //         }
    //     });
    // }
</script>

@endpush