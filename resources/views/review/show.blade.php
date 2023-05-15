@extends('layouts.app')
@section('content')
    <div id="toolbar">

        <a class="btn btn-success" href="{{ route('report.download', ['review' => $review->id]) }}" id="newItem"
            role="button"><i class="fa fa-download"></i>Скачать отчет
        </a>

    </div>



    <table id="table" data-toolbar="#toolbar" data-show-fullscreen="true" data-toggle="table"
        data-url="/api/v1/review/report" data-locale="ru-RU" class="table-information" data-data-field="items"
        data-filter-control="true" data-show-search-clear-button="true" data-query-params="queryParams"
        data-show-refresh="true" data-show-footer="true" data-show-columns="true">

        <thead>
            <tr>
                <th data-field="index" data-sortable="true">#</th>
                <th  data-width="500"  data-field="name">Наименование</th>
                <th data-field="check" data-align="center">Отметка при наличии</br> повреждений</th>
                <th data-field="unit" data-align="center">Ед.изм.</th>
                <th data-field="value" data-align="right" data-sortable="true">Ориентировочный объём </br>работ,кол-во </th>
                <th data-field="rating" data-align="center" data-sortable="true" data-cell-style="cellStyle"> Степень
                    важности исполнения,</br> оценка рисков при
                    эксплуатации </br>"Опасность&nbsp;в&nbsp;эксплуатации" </br>(опасно/безопасно)</th>
                <th data-field="description" data-editable="true" data-formatter="descriptionFormatter">
                    Примечание, дополнение</th>
                <th data-field="price" data-editable="true" data-sortable="true" data-align="right">Стоимость на ед., руб.
                </th>
                <th data-field="summa" data-editable="true" data-sortable="true" data-align="right">
                    Ориентировочная</br>стоимость работ, руб.
                </th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>

    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table-locale-all.min.js"></script>



    <script>
        $(function() {
            $('#table').bootstrapTable({
                //  не работает с селектом(())
                // stickyHeader: true,
                //    stickyHeaderOffsetLeft: parseInt($('body').css('padding-left'), 10),
                //   stickyHeaderOffsetRight: parseInt($('body').css('padding-right'), 10)

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
            // console.log(JSON.stringify(params));
            // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
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
