@extends('backend.app')

@section('title', 'Dynamic Page')

@push('styles')
    <style>
        table.dataTable thead>tr>th.sorting:before, table.dataTable thead>tr>th.sorting:after, table.dataTable thead>tr>th.sorting_asc:before, table.dataTable thead>tr>th.sorting_asc:after, table.dataTable thead>tr>th.sorting_desc:before, table.dataTable thead>tr>th.sorting_desc:after, table.dataTable thead>tr>th.sorting_asc_disabled:before, table.dataTable thead>tr>th.sorting_asc_disabled:after, table.dataTable thead>tr>th.sorting_desc_disabled:before, table.dataTable thead>tr>th.sorting_desc_disabled:after, table.dataTable thead>tr>td.sorting:before, table.dataTable thead>tr>td.sorting:after, table.dataTable thead>tr>td.sorting_asc:before, table.dataTable thead>tr>td.sorting_asc:after, table.dataTable thead>tr>td.sorting_desc:before, table.dataTable thead>tr>td.sorting_desc:after, table.dataTable thead>tr>td.sorting_asc_disabled:before, table.dataTable thead>tr>td.sorting_asc_disabled:after, table.dataTable thead>tr>td.sorting_desc_disabled:before, table.dataTable thead>tr>td.sorting_desc_disabled:after {
            position: absolute;
            display: none;
            opacity: .125;
            right: 10px;
            line-height: 9px;
            font-size: .8em;
        }

        #data-table_wrapper {
            margin: 0px 15px !important;
        }

        .dt-length label {
            display: none !important;
        }

        .dt-search {
            margin-bottom: 20px !important;
            border: 16px;
        }

        .dt-length {
            margin-top: 20px !important;
        }

        #dt-length-1 {
            /* margin-left: 14px !important; */
        }

        #data-table {
            margin-bottom: 20px !important;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px;
            margin-left: 18px;
            border: 16px;
        }

        #data-table_filter label input {
            margin-right: 15px !important;
        }
    </style>
@endpush

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Dynamic Page Table</h4>
    <div class="card">
        <div class="card-datatable table-responsive m-3">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer ">
                <div class="card-header flex-column flex-md-row">
                    <h4 class="py-3 mb-4">
                        Dynamic Page
                    </h4>
                    <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons btn-group flex-wrap">
                            <a href="{{route('dynamic_page.create')}}" class="btn btn-secondary create-new btn-primary" tabindex="0"
                               aria-controls="DataTables_Table_0" type="button">
                                <span><i class="bx bx-plus me-sm-1"></i>
                                    <span class="d-none d-sm-inline-block">Add New Page</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="data-table"
                       aria-describedby="DataTables_Table_0_info" style="width: 1390px;">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Page Title</th>
                        <th>Page Content</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div style="width: 1%;"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- data table--}}
    <script type="text/javascript" src="{{ asset('backend/vendor/libs/DataTable/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/vendor/libs/DataTable/js/dataTables.bootstrap4.min.js') }}"></script>

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
                        url: "{{ route('dynamic_page.index') }}",
                        type: "GET"
                    },
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                        {
                            data: 'page_title',
                            name: 'page_title',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'page_content',
                            name: 'page_content',
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
            let url = '{{ route('dynamic_page.status', ':id') }}';
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
            let url = '{{ route('dynamic_page.destroy', ':id') }}';
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

