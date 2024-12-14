@extends('backend.app')

@section('title', 'Contracts')

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
                    <h4 class="card-title"> Contracts List</h4>

                    <div style="display: flex; justify-content: end; margin-bottom: 20px;">
                        <a href="{{ route('contract.create') }}" class="btn btn-primary">Add New</a>
                    </div>

                    <div class="table-responsive mt-4 p-4">
                        <table class="table table-hover" id="data-table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Email</th>
                                    <th>Address </th>
                                    <th>Mobile</th>
                                    <th>Teliphone</th>
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
      let dTable = $('#data-table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: "{{ route('contract.index') }}",
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'email', name: 'email' },
        { data: 'address', name: 'address', render: function(data) {
                return data && data.length > 5 
                    ? `<span title="${data}">${data.substring(0, 5)}...</span>` 
                    : data;
            }
        },
        { data: 'mobile', name: 'mobile' },
        { data: 'teliphone', name: 'teliphone' },
    ],
});



  function deleteProject(id) {
    const url = '{{ route('projects.destroy', ':id') }}'.replace(':id', id);
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
