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
                <th data-field="name" data-sortable="true">Наименование</th>
                <th data-field="item_count">()</th>
                <th data-formatter="nameFormatter" data-switchable="false">Действия</th>
            </tr>
        </thead>
    </table>

    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table-locale-all.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/group-by-v2/bootstrap-table-group-by.min.js">
    </script>

    <script
        src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
    </script>

    <script>
        $(function() {
            $('#table').bootstrapTable()
        })

        function nameFormatter(value, row) {

            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-info  btn-sm" href="' + row.show_link +
                '" title="Отчеты" target="_blank"><i class="fa fa-file"></i></a>' + '</div>'
        }
    </script>

    <style>
        .mark {
            padding: 0.0em !important;
            background-color: #f75a5a !important;
        }
    </style>
@endsection


@section('script')
@endsection
