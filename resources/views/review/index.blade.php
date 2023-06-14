@extends('layouts.app')
@section('content')
    <div id="toolbar">
        <a class="btn btn-primary" href="{{ route('review.create') }}" role="button"><i class="fa fa-plus"></i> Новый отчет
        </a>
    </div>


    <table id="table" data-toolbar="#toolbar" data-toggle="table" data-show-fullscreen="true" data-cache="false"
        data-show-footer="true" data-filter-control="true" data-locale="ru-RU" data-cookie="true" data-search="true"
        data-show-refresh="true" data-show-search-clear-button="true" data-url="/api/v1/review" data-data-field="items"
        data-side-pagination="server" data-pagination="true" data-page-list="[10, 25, 50 ]" class="table-information"
        data-search-highlight="true" data-query-params="queryParams">
        <thead>
            <tr>
                <th data-field="id">#</th>
                <th data-field="building" data-formatter="buildingFormatter" data-filter-control="select">Объект</th>
                <th data-field="creator" data-filter-control="select">Автор</th>
                {{-- <th data-field="summa" data-align="right">Сумма</th> --}}
                <th data-field="created_at" data-align="right">Дата отчета</th>
                <th data-formatter="actionFormatter" data-switchable="false" data-align="center">Действия</th>
            </tr>
        </thead>
    </table>

    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>

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
            calert('Вы действительно хотите удалить отчет?', {
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
                            url: "delete_review",
                            data: {
                                category_id: category_id,
                            },
                            success: function(data) {
                                console.log("Data successfully sent to server!" + data);
                                $('#table').bootstrapTable('refresh');
                                return calert('Очет  удален', '', 'success')
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
            calert('Вы действительно хотите восстановить отчет?', {
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
                            url: "undelete_review",
                            data: {
                                category_id: category_id,
                            },
                            success: function(data) {
                                console.log("Data successfully sent to server!" + data);
                                $('#table').bootstrapTable('refresh');
                                return calert('Отчет восстановлен', '', 'success')
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


        function queryParams(params) {
            params.with_trashed = {{ @$with_trashed }} // add param2

            return params
        }

        function nameFormatter(value, row) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
                '" href="#" title="Удалить"  ><i class="fa fa-trash"></i></a>' + '</div>'
        }

        function buildingFormatter(value, row) {
            return '<i class="fa fa-check-circle " style="color:' + row.check_color + '"></i>  <a href="' + row.edit_link +
                '" title="Редактировать" >' + row.building + '</a>'
        }

        function actionFormatter(value, row) {
            action_str = '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать"  ><i class="fa fa-edit"></i></a>' ;
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
@endsection


@section('script')
@endsection
