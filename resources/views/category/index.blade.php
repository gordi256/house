@extends('layouts.app')
@section('content')
    <div id="toolbar">

        @can('create item')
            <a class="btn btn-primary" href="{{ route('category.create') }}" role="button"><i class="fa fa-plus"></i> Новая
                категория
            </a>
        @endcan
    </div>


    <table id="table" data-toolbar="#toolbar" data-toggle="table" data-show-fullscreen="true" data-cache="false"
        data-show-footer="true" data-locale="ru-RU" data-cookie="true" data-search="true" data-show-refresh="true"
        data-show-search-clear-button="true" data-url="/api/v1/catalog" data-data-field="items" class="table-information"
        data-search-highlight="true" data-query-params="queryParams">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">#</th>
                <th data-field="name" data-formatter="nameFormatter" data-sortable="true">Наименование</th>
                <th data-field="item_count">()</th>
                <th data-formatter="actionFormatter" data-switchable="false">Действия</th>
            </tr>
        </thead>
    </table>



    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.min.js') }}">
    </script>

    <script src="{{ asset('js/calert.unbabel.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-XSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $('body').on('click', '.delete_button', function(e) {
            var category_id = $(this).data('id');
            console.log("category_id:", category_id);
            calert('Вы действительно хотите удалить категорию расценок?', {
                    cancelButton: true,
                    icon: 'question',
                    backdrop: {
                        background: 'rgba(255,40,40,0.6)',
                    }
                })
                .then(result => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "delete_category", 
                            data: {
                                category_id: category_id,
                            }, 
                            success: function(data) {
                                console.log("Data successfully sent to server!" + data);
                                $('#table').bootstrapTable('refresh');
                                return calert('Категория удалена ', '', 'success')
                            },
                            error: function(xhr, status, error) {
                                console.error("Error status: " + status +
                                    " Error sending data to server: " + error);
                                var err = eval("(" + xhr.responseText + ")");
                                return calert('Операция не произведена', err.message, 'error');
                            }
                        });

                    } else {
                        return calert('Cancel', 'Операция отменена', 'error')
                    }
                })
        });

        $('body').on('click', '.undelete_button', function(e) {
            var category_id = $(this).data('id');
            console.log("category_id:", category_id);
            calert('Вы действительно хотите восстановить категорию расценок?', {
                    cancelButton: true,
                    icon: 'question',
                    backdrop: {
                        background: 'rgba(255,40,40,0.6)',
                    }
                })
                .then(result => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "undelete_category", 
                            data: {
                                category_id: category_id,
                            }, 
                            success: function(data) {
                                console.log("Data successfully sent to server!" + data);
                                $('#table').bootstrapTable('refresh');
                                return calert('Категория восстановлена ', '', 'success')
                            },
                            error: function(xhr, status, error) {
                                console.error("Error status: " + status +
                                    " Error sending data to server: " + error);
                                var err = eval("(" + xhr.responseText + ")");
                                return calert('Операция не произведена', err.message, 'error');
                            }
                        });

                    } else {
                        return calert('Cancel', 'Операция отменена', 'error')
                    }
                })
        });



        $(function() {
            $('#table').bootstrapTable()
        })

        function actionFormatter(value, row) {
            action_str = '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать"  ><i class="fa fa-edit"></i></a>';
            if (row.trashed) {
                action_str = action_str +'<a class="btn btn-success   btn-sm undelete_button"   data-id="' + row.id +
                    '" href="#" title="Восстановить"  ><i class="fa fa-recycle"></i></a>';
            } else {
                action_str = action_str + '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
                    '" href="#" title="Удаление"  ><i class="fa fa-trash"></i></a>';
            }
            //  return '<div class="btn-group" role="group" aria-label="Basic example">' +
            //      '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
            //      '" title="Редактировать"  ><i class="fa fa-edit"></i></a>' +
            //      '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
            //     '" href="#" title="Удаление"  ><i class="fa fa-trash"></i></a>' + '</div>'

            action_str = action_str + '</div>';
            return action_str;
        }

        function nameFormatter(value, row) {

            return '<a class="" href="' + row.show_link +
                '" title="Редактировать" > ' + row.name +
                '</a>'
        }

        function queryParams(params) {
            params.with_trashed = {{ $with_trashed }} // add param2
            return params
        }
    </script>
@endsection


@section('script')
@endsection
