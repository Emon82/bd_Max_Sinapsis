
@extends('backend.app')

@section('title', 'Process')

@push('styles')
    <style>

    </style>
    <link rel="stylesheet" href="{{ asset('backend/vendor/datatable/css/datatables.min.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Process</h4>
                        <div style="display: flex;justify-content: end;"><a href="{{ route('process.create') }}"
                                class="btn btn-primary">Create</a></div>
                        <div class="table-responsive mt-4 p-4">
                            <table class="table table-hover" id="data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Datatable --}}
    <script src="{{ asset('backend/vendor/datatable/js/datatables.min.js') }}"></script>
    {{-- sweet alart --}}
    <script src="{{ asset('backend/vendor/sweetalert/sweetalert2@11.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            if (!$.fn.DataTable.isDataTable('#data-table')) {
                let dTable = $('#data-table').DataTable({
                    // DataTable options
                    order: [],
                    lengthMenu: [
                        [25, 50, 100, 200, 500, -1],
                        [25, 50, 100, 200, 500, "All"]
                    ],
                    processing: true,
                    responsive: true,
                    serverSide: true,
                    language: {
                        processing: `Loading data...`
                    },
                    pagingType: "full_numbers",
                    dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
                    ajax: {
                        url: "{{ route('process.index') }}",
                        type: "GET"
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'title',
                            name: 'title',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'image',
                            name: 'image',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            }
        });

        // Status Change Confirm Alert
        function showStatusChangeAlert(id) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You want to update the status?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    statusChange(id);
                }
            });
        }
        // Status Change
        function statusChange(id) {
            let url = '{{ route('process.status', ':id') }}';
            $.ajax({
                type: "GET",
                url: url.replace(':id', id),
                success: function(resp) {
                    console.log(resp);
                    // Reloade DataTable
                    $('#data-table').DataTable().ajax.reload();
                    if (resp.success === true) {
                        // show toast message
                        //toastr.success(resp.message);
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Published Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else if (resp.errors) {
                        //toastr.error(resp.errors[0]);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: `${resp.errors[0]}`
                        });
                    } else {
                        //toastr.error(resp.message);
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Unpublished Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(error) {
                    // location.reload();
                }
            });
        }

        // delete Confirm
        function showDeleteConfirm(id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure you want to delete this record?',
                text: 'If you delete this, it will be gone forever.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteItem(id);
                }
            });
        }
        // Delete Button
        function deleteItem(id) {
            let url = '{{ route('process.destroy', ':id') }}';
            let csrfToken = '{{ csrf_token() }}';
            $.ajax({
                type: "DELETE",
                url: url.replace(':id', id),
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(resp) {
                    console.log(resp);
                    // Reloade DataTable
                    $('#data-table').DataTable().ajax.reload();
                    if (resp.success === true) {
                        // show toast message
                        // toastr.success(resp.message);
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Deleted Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });

                    } else if (resp.errors) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: `${resp.errors[0]}`
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: `${resp.message}`
                        });
                        // toastr.error(resp.message);
                    }
                },
                error: function(error) {
                    // location.reload();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                }
            })
        }
    </script>
@endpush
