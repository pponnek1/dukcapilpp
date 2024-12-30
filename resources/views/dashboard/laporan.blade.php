@extends('dashboard.layouts.app')

@section('content')
<head>
    <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="card-header flex-column flex-md-row">
                    <div class="head-label text">
                        <h5 class="card-title mb-0">DataTable with Buttons</h5>
                    </div>
                    <div class="dt-action-buttons text-end pt-6 pt-md-0 mb-5">
                        <div class="dt-buttons btn-group flex-wrap">
                            <div class="btn-group"><button
                                    class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light border-none"
                                    tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog"
                                    aria-expanded="false"><span><i class="ti ti-file-export ti-xs me-sm-1"></i> <span
                                            class="d-none d-sm-inline-block">Export</span></span></button></div> <button
                                class="btn btn-secondary create-new btn-primary waves-effect waves-light" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button"><span><i
                                        class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New
                                        Record</span></span></button>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <table class="datatables-basic table dataTable no-footer dtr-column mt-5" id="dataTable"
                        aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" width="3%"
                                    aria-label="Name: activate to sort column ascending">No</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" width="12%"
                                    aria-label="Email: activate to sort column ascending">tanggal</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" width="15%"
                                    aria-label="Date: activate to sort column ascending">layanan</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" width="15%"
                                    aria-label="Salary: activate to sort column ascending">nama</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                    colspan="1" width="20%"
                                    aria-label="Status: activate to sort column ascending">nomor</th>
                                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 147px;"
                                    aria-label="Actions">alamat</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                Showing 0 to 0 of 0 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0"
                                            aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1"
                                            class="page-link"><i class="ti ti-chevron-left ti-sm"></i></a></li>
                                    <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a
                                            aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                            data-dt-idx="next" tabindex="-1" class="page-link"><i
                                                class="ti ti-chevron-right ti-sm"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    new DataTable('#dataTable', {
        processing: true,
        serverSide: true,
        ajax: '{{ route("dataku") }}',
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false,
            },
            { data: 'tanggal', name: 'tanggal' }, // or tanggal if it exists
            { data: 'layanan', name: 'layanan' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'nomorhp', name: 'nomorhp' },
            { data: 'alamat', name: 'alamat' }
        ],
        lengthMenu: [10, 20, 50, 100],
        order: [[1, 'desc']],
        language: {
            searchPlaceholder: 'Cari Data..',
            sSearch: '',
            lengthMenu: '_MENU_'
        }
    });
});
</script>
@endsection
