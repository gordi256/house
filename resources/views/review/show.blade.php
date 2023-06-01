@extends('layouts.app')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Здание (сооружение)</th>
                <th scope="col">Разработал</th>
                <th scope="col">Утвердил</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $review->building->name }}</td>
                <td>{{ @$review->creator->fio }}</td>
                <td>{{ @$review->approver->fio }}</td>
            </tr>
        </tbody>
    </table>
    <div id="toolbar">
        <a class="btn btn-success" href="{{ route('review.edit', ['review' => $review->id]) }}" role="button"><i
                class="fa fa-eye"></i>Анкета</a>
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> <i class="fa fa-download"></i>
                Скачать отчет
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{ route('report.download_all', ['review' => $review->id]) }}">С пустыми
                    строками</a>
                <a class="dropdown-item" href="{{ route('report.download', ['review' => $review->id]) }}">Только
                    заполненные</a>
            </div>
        </div>
    </div>

    <table id="table" data-toolbar="#toolbar" data-show-fullscreen="true" data-toggle="table"
        data-url="/api/v1/review/report" data-locale="ru-RU" class="table-information" data-data-field="items"
        data-filter-control="true" data-show-search-clear-button="true" data-query-params="queryParams"
        data-show-refresh="true" data-show-footer="true" data-show-columns="true">
        <thead>
            <tr>
                <th data-field="index" data-sortable="true">#</th>
                <th data-width="500" data-field="name">Наименование</th>
                <th data-field="check" data-align="center">Отметка при наличии повреждений</th>
                <th data-field="unit" data-align="center">Ед.изм.</th>
                <th data-field="value" data-align="right" data-sortable="true">Ориентировочный объём работ,кол-во </th>
                <th data-field="rating" data-align="center" data-sortable="true" data-cell-style="cellStyle">Степень
                    важности исполнения, оценка рисков при эксплуатации  "Опасность&nbsp;в&nbsp;эксплуатации"  (опасно/безопасно)</th>
                <th data-field="description" data-editable="true" data-formatter="descriptionFormatter">
                    Примечание, дополнение</th>
                <th data-field="price" data-editable="true" data-sortable="true" data-align="right">Стоимость на ед., руб.
                </th>
                <th data-field="summa" data-editable="true" data-sortable="true" data-align="right">Ориентировочная стоимость работ, руб.
                </th>
            </tr>
        </thead>
    </table>


    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>


    <script>
        $(function() {
            $('#table').bootstrapTable({

            })
        })

        function cellStyle(value, row, index) {
            if (value == 10) {
                return {
                    css: {
                        background: '#fd0100'
                    }
                }
            }
            if (value == 9) {
                return {
                    css: {
                        background: '#ff7c81'
                    }
                }
            }
            if (value == 8) {
                return {
                    css: {
                        background: '#ff7c81'
                    }
                }
            }
            if (value == 7) {
                return {
                    css: {
                        background: '#c55813'
                    }
                }
            }
            if (value == 6) {
                return {
                    css: {
                        background: '#c55813'
                    }
                }
            }
            if (value == 5) {
                return {
                    css: {
                        background: '#fbc300'
                    }
                }
            }
            if (value == 4) {
                return {
                    css: {
                        background: '#ffff01'
                    }
                }
            }
            if (value == 3) {
                return {
                    css: {
                        background: '#ffff01'
                    }
                }
            }
            if (value == 2) {
                return {
                    css: {
                        background: '#538234'
                    }
                }
            }
            if (value == 1) {
                return {
                    css: {
                        background: '#94cf4e'
                    }
                }
            }
            return {
                css: {
                    color: 'black'
                }
            }
        }

        function queryParams(params) {
            params.review_id = {{ $review->id }} // add param1
            params.your_param2 = 2 // add param2
            return params
        }

        function descriptionFormatter(value, row) {
            return '<div class="container"><div class="truncate-text">' + row.description + '</div></div>'
        }
    </script>

    <style>
        .container-truncate-text {
            width: 200px;
            background: #c8ad90;
            padding: 1rem;
        }

        .w-200 {
            width: 400px;
        }

        .truncate-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            line-height: 1.1em;
            height: 2.2em;
        }
    </style>
@endsection


@section('script')
@endsection
