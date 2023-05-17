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
        data-search-highlight="true">
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
        $('body').on('click', '.delete_button', function(e) {
            var product_id = $(this).data('id');
            console.log("product_id:", product_id);
            calert('Вы действительно хотите удалить категорию расценок ?', {
                    cancelButton: true,
                    icon: 'question'
                })
                .then(result => {
                    if (result.isConfirmed) {

                        return calert('Operation Success', '', 'success')
                    } else {
                        return calert('Cancel', 'Операция отменена', 'error')
                    }
                })
        });
    </script>

    <script>
        $(function() {
            $('#table').bootstrapTable()
        })

        function actionFormatter(value, row) {

            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
                '" href="#" title="Новый отчет"  ><i class="fa fa-trash"></i></a>' + '</div>'
        }

        function nameFormatter(value, row) {

            return '<a class="" href="' + row.show_link +
                '" title="Редактировать" > ' + row.name +
                '</a>'
        }
    </script>

 
@endsection


@section('script')
@endsection
