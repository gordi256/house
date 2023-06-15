@extends('layouts.app')
@section('content')
    <!-- row -->
    <div class="row">
        <!-- left column  -->
        <div class="col-md-12">
            @if ($building->has_info)
                <table id="table" data-toggle="table" data-show-fullscreen="true" data-cache="false" data-locale="ru-RU"
                    data-cookie="true" data-search="true" data-show-refresh="true" data-show-search-clear-button="true"
                    data-url="/api/v1/building/info" data-data-field="items" class="table-information"
                    data-query-params="queryParams" data-group-by="true" data-group-by-toggle="true"
                    data-group-by-show-toggle-icon="true" data-group-by-field="category_order">
                    <thead>
                        <tr>
                            <th data-field="index" data-sortable="true" data-sort-name="index" data-sort-order="asc">#</th>
                            <th data-field="name">Параметр</th>
                            <th data-field="value" data-editable="true" data-editable-mode="inline">Значение </th>
                            <th data-formatter="actionFormatter" data-switchable="false" data-align="center">Действия</th>
                        </tr>
                    </thead>
                </table>
            @else
                @can('manage building')
                    <div class="alert alert-danger" role="alert">
                        У здания еще не создана информация, <a class="btn btn-primary"
                            href="{{ route('building.info_create', ['building' => $building->id]) }}" role="button"> Cоздать?
                        </a>
                    </div>
                @endcan
            @endif
        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
@endsection

@section('script')
    <link href="{{ asset('js/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.css') }}" rel="stylesheet">

    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.min.js') }}">
    </script>

    <script src="{{ asset('js/bootstrap-table/extensions/editable/bootstrap-table-editable.min.js') }}"></script>

    <link href="{{ asset('js/x-editable-develop/dist/bootstrap4-editable/css/bootstrap-editable.css') }}"
        rel="stylesheet" />
    <script src="{{ asset('js/x-editable-develop/dist/bootstrap4-editable/js/bootstrap-editable.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-XSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $(function() {
            $('#table').bootstrapTable()
        })
        $("#table").on("editable-save.bs.table", function(event, field, row, rowIndex, oldValue, el) {
            // alert(field + "  New value = " + row[field] + ", old value = " + oldValue + ", rowIndex value = " + ro.id);

            $.ajax({
                type: "POST",
                url: "insert_info_data", // This is the URL of your PHP script which will handle inserting data into the database
                data: {
                    field: field,
                    id: row.id,
                    value: row[field]
                }, // The data to be sent to the server. Replace with your own data.
                success: function(data) {
                    console.log("Data successfully sent to server!");

               
                    

                },
                error: function(xhr, status, error) {
                    console.error("Error sending data to server: " + error);
                    alert("Error sending data to server: " + error);
                }
            });

        });
        function queryParams(params) {
            params.building_id = {{ $building->id }}

            return params
        }

        function actionFormatter(value, row) {
            action_str = '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать"  ><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-info  btn-sm" href="' + row.report_link +
                '" title="Отчеты"  ><i class="fa fa-file"></i></a>';
            if (row.trashed) {
                action_str = action_str + '<a class="btn btn-success   btn-sm undelete_button"   data-id="' + row.id +
                    '" href="#" title="Восстановить"  ><i class="fa fa-recycle"></i></a>';
            } else {
                action_str = action_str + '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
                    '" href="#" title="Удаление"  ><i class="fa fa-trash"></i></a>';
            }

            action_str = action_str + '</div>';
            return action_str;
        }
    </script>
    <style>
        .group-by {
            background: #3d9970;
            font-size: 1.32rem;
        }
    </style>
@endsection
