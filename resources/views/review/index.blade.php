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
        data-search-highlight="true">
        <thead>
            <tr>
                <th data-field="id">#</th>
                <th data-field="building" data-formatter="buildingFormatter" data-filter-control="select">Объект</th>
                <th data-field="creator" data-filter-control="select">Автор</th>
                {{-- <th data-field="summa" data-align="right">Сумма</th> --}}
                <th data-field="created_at" data-align="right">Дата отчета</th>
                <th data-formatter="nameFormatter" data-switchable="false">Действия</th>
            </tr>
        </thead>
    </table>

    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table-locale-all.min.js"></script>


    <script>
        $(function() {
            $('#table').bootstrapTable()
        })

        function nameFormatter(value, row) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-info  btn-sm" href="' + row.report_link +
                '" title="Отчеты" target="_blank"><i class="fa fa-file"></i></a>' + '</div>'
        }

        function buildingFormatter(value, row) {
            return '<a href="' + row.edit_link + '" title="Редактировать" >' + row.building + '</a>'
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
