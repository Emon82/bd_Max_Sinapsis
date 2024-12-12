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
                            <a href="{{ route('services.create') }}" class="btn btn-primary">Add New</a>
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
        $(document).ready(function () {
            // Initialize DataTable
            let dTable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('services.index') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'title_eess', name: 'title_eess' },
                    { data: 'description_eess', name: 'description_eess',
                         render: function (data, type, row) {
        if (data && data.length > 5) {
            return `<span title="${data}">${data.substring(0, 15)}...</span>`;
        }
        return data;
             },
                     },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            return `
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


        function deleteProject(id) {
    const url = `/remove-project/${id}`;
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
                headers: { 'X-CSRF-TOKEN': csrfToken },
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





    </script>
@endpush
