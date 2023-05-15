@extends('layouts.app')
@section('content')
    <div id="toolbar">
        <a class="btn btn-primary" href=" " role="button"><i class="fa fa-plus"></i>Новая группа
        </a>
        <a class="btn btn-primary" href=" " role="button"><i class="fa fa-plus"></i>Новая строка
        </a>
    </div>


    <h2>Отчет № {{ $review->id }} от {{ $review->created_at }} </h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Здание (сооружение)</th>
                <th scope="col">Автор</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <td>{{ $review->building->name }}</td>
                <td>{{ $review->creator->fio }}</td>

            </tr>

        </tbody>
    </table>

    <table id="table" data-toolbar="#toolbar" data-toggle="table" data-show-fullscreen="true" data-cache="false"
        data-show-footer="true" data-locale="ru-RU" data-cookie="true" data-search="true" data-show-refresh="true"
        data-show-search-clear-button="true" data-url="/api/v1/review/list" data-data-field="items"
        data-side-pagination="server" data-pagination="false" data-query-params="queryParams" data-group-by="true"
        data-group-by-field="category_name" class="table-information">


        <thead>
            <tr>
                <th data-field="index">#</th>
                {{-- data-formatter="selectFormatter" --}}
                <th data-field="name">Наименование</th>
                <th data-field="check" data-editable="true" data-filter-control="select">Отметка при наличии повреждений
                </th>
                <th data-field="unit_type">Ед.изм.</th>
                <th data-field="value">Ориентировочный объём работ,кол-во </th>
                <th data-field="rating" data-filter-control="select" data-cell-style="cellStyle" data-editable="true">
                    Степень важности исполнения, оценка рисков при эксплуатации "Опасность в эксплуатации"
                    (опасно/безопасно)</th>
                <th data-field="3" data-editable="true">Примечание, дополнение</th>
                <th data-field="price" data-editable="true">Стоимость на ед., руб.</th>
                <th data-field="5" data-editable="true" data-filter-control="input">Оринтировочная стоимость работ, руб.
                </th>
                <th data-formatter="nameFormatter" data-switchable="false">Действия</th>

            </tr>
        </thead>

    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table-locale-all.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/group-by-v2/bootstrap-table-group-by.min.js">
    </script>

    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/group-by-v2/bootstrap-table-group-by.css"
        rel="stylesheet">


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
                '<a class="btn btn-info  btn-sm" href="' + row.report_link +
                '" title="Отчеты" target="_blank"><i class="fa fa-file"></i></a>' +
                '<a class="btn btn-success  btn-sm disabled"   href="' + row.download_link +
                '" title="Скачать отчет" target="_blank"><i class="fa fa-download"></i></a>' + '</div>'
        }


        function queryParams(params) {
            params.review_id = {{ $review->id }} // add param1
            params.your_param2 = 2 // add param2
            // console.log(JSON.stringify(params));
            // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
            return params
        }
    </script>
@endsection


@section('script')
@endsection
