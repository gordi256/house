@extends('layouts.app')
@section('content')
    <div id="toolbar">
        <a class="btn btn-success" href="{{ route('review.show', ['review' => $review->id]) }}" role="button"><i
                class="fa fa-eye"></i> Отчет</a>
        <a class="btn btn-danger confirm_button" data-id="{{ $review->id }}" href="#" role="button"> Подтвердить
            анкету</a>
        <a class="btn btn-primary approve_button" data-id="{{ $review->id }}" href="#" role="button"><i
                class="fa fa-plus"></i>Утвердить анкету </a>

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



        <a class="btn btn-danger" href="{{ route('report.download_photo', ['review' => $review->id]) }}" role="button"><i
                class="fa  fa-camera"></i> Скачать фото</a>
        <button type="button" id="info" data-toggle="modal" data-target="#infoModal" class="btn btn-info">
            Помощь</button>
    </div>
    <div id="checkFilter">

        <table>

            <thead>
                <tr>
                    <th>Отметка при наличии повреждений</th>
                    <th>Степень важности</th>
                </tr>
                <td>
                    <select class="form-control bootstrap-table-filter-control-check" dir="ltr">
                        <option value="" selected="selected"></option>
                        <option value="Да">Да</option>
                        <option value="Нет">Нет</option>
                        <option value="Отсутствует">Отсутствует</option>
                    </select>
                </td>

                <td>


                    </tr>
            </thead>



    </div>

    <table id="table" data-toolbar="#toolbar" data-show-fullscreen="true" data-toggle="table"
        data-url="/api/v1/review/list" data-editable="true" data-editable-source="/api/v1/review/select_list"
        data-locale="ru-RU" class="table-information" data-data-field="items" data-filter-control="true"
        data-group-by="true" data-group-by-toggle="true" data-group-by-show-toggle-icon="true"
        data-group-by-field="category_order" data-show-search-clear-button="true" data-query-params="queryParams"
        data-show-refresh="true" data-show-footer="true" data-show-columns="true" data-editable-url="/api/v1/review/update" >
        {{-- data-filter-control-container="#checkFilter"  --}}
        <thead>
            <tr>
                {{-- data-editable-emptytext="---" --}}{{-- data-formatter="checkFormatter"data-filter-custom-search="check" data-editable-value="check"data-editable-pk="check_text" data-filter-data-collector="tableFilterStripHtml"   data-editable-emptytext="Custom empty text." data-editable="true"
                 data-editable-source='[{value: 1, text: "text1"}, {value: 2, text: "text2"} ]' data-filter-control-placeholder ="check" --}}
                <th data-field="index" data-sortable="true">#</th>
                <th data-field="name">Наименование</th>

                <th data-field="check" data-visible="false" data-width="150">
                    Отметка </th>
                <th data-field="check_text" data-editable="true" data-filter-control="select" data-editable-type="select">
                    Отметка при наличии повреждений</th>
                <th data-field="unit" data-align="center">Ед.изм.</th>
                <th data-field="value" data-align="right" data-sortable="true">Ориентировочный объём работ,кол-во </th>
                <th data-field="rating" data-align="center" data-filter-control="select" data-sortable="true"
                    data-cell-style="cellStyle">&nbsp;Степень важности исполнения, оценка рисков при
                    эксплуатации "Опасность&nbsp;в&nbsp;эксплуатации" (опасно/безопасно)</th>
                <th data-field="description" class="cellStyle1" data-formatter="descriptionFormatter">
                    Примечание, дополнение</th>
                <th data-field="price" data-sortable="true" data-align="right">Стоимость на ед., руб.
                </th>
                <th data-field="summa" data-sortable="true" data-filter-control="input" data-align="right"
                    data-footer-formatter="priceFormatter">Ориентировочная
                    стоимость работ, руб.
                </th>
                <th data-formatter="actionFormatter" data-width="120" data-switchable="false">Действия</th>

            </tr>
        </thead>
                        <tbody>
                    <tr><td>1</td><td>John</td><td>Smith</td><td>john.smith@example.com</td><td>US</td></tr>
                    <tr><td>2</td><td>Jane</td><td>Doe</td><td>jane.doe@example.com</td><td>ES</td></tr>
                    <tr><td>3</td><td>Alice</td><td></td><td>alice@example.com</td><td>FR</td></tr>
                    <tr><td>4</td><td>Bob</td><td>Jones</td><td>bjonesss@example.com</td><td>UK</td></tr>
                </tbody>
    </table>





    <link href="{{ asset('js/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.css') }}" rel="stylesheet">
    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-table/extensions/editable/bootstrap-table-editable.min.js') }}"></script>

    <link href="{{ asset('js/x-editable-develop/dist/bootstrap4-editable/css/bootstrap-editable.css') }}"
        rel="stylesheet" />
    <script src="{{ asset('js/x-editable-develop/dist/bootstrap4-editable/js/bootstrap-editable.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.min.js') }}">
    </script>



 

    <script>
        $(function() {
            $('#table').bootstrapTable()
        })
        $('#table').bootstrapTable({
            onEditableSave: function(field, row, oldValue, $el) {

                var data = {
                    '_token': window.Laravel.csrfToken,
                    'Field': field,
                    'PK': row['_' + field + '_data'].pk,
                    'oldValue': oldValue,
                    'newValue': row[field]
                };

                console.log(data);

            }
        })

        $.fn.editable.defaults.mode = 'inline';

        $(function() {
            $("#table").on("editable-save.bs.table", function(event, field, row, rowIndex, oldValue, el) {
                alert("New value = " + row[field] + ", old value = " + oldValue);
            });
        });



        $("#table").on("dbl-click-cell.bs.table", function(field, value, row, $element) {

            console.log("field:", field);

            console.log("element:", $element);
            alert("New field = " + field + ",   value = " + value + ", row value = " + row.id);

        });



        $("#table").on("editable-save.bs.table", function(event, field, row, rowIndex, oldValue, el) {
            alert("New value = " + row[field] + ", old value = " + oldValue + ", rowIndex value = " + row.id);
        });










        function priceFormatter(data) {
            var field = this.field
            return 'Итого :' + data.map(function(row) {
                return +row[field]
            }).reduce(function(sum, i) {
                return sum + i
            }, 0).toFixed(2)
        }


        function queryParams(params) {
            params.review_id = {{ $review->id }} // add param1
            params.your_param2 = 2 // add param2
            return params
        }

        function actionFormatter(value, row) {
            return '<div class="btn-group  mr-2" role="group" aria-label="Basic example">' +
                '<button  class="btn btn-primary  btn-sm edit-button"  data-id="' + row.id +
                '"><i class="fas fa-edit"></i></button>' +
                '<button class="btn btn-primary   btn-sm photo-button"   data-id="' + row.id +
                '"><i class="fas fa-camera"></i> <span class="badge badge-pill badge-success">' + row
                .photo_count +
                '</span></button>' + '</div>'
        }



        function descriptionFormatter(value, row) {
            return '<div class="container"><div class="truncate-text">' + row.description + '</div></div>'
        }



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
    </script>

    <style>
        .container-truncate-text {
            width: 200px;
            background: #c8ad90;
            padding: 1rem;
        }

        .truncate-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            line-height: 1.1em;
            height: 2.2em;
        }


        .cellStyle {
            display: block;
            width: 300px;
            height: 10px;
            /*  border: 1px solid black; */
            padding: 5px;
            margin-top: 5px;
            outline: none;
            overflow: hidden;
        }

        .cellStyle:focus,
        button:focus~.cellStyle {
            height: auto;
        }


        .group-by {
            background: #3d9970;
            font-size: 1.32rem;
        }

        .bootstrap-table .fixed-table-container .table thead th {
            vertical-align: top;
            padding: 0;
            margin: 0;
        }

        .bootstrap-table .fixed-table-container .table thead th .th-inner {
            margin: auto;
            padding: 0.2rem;
            /*0.5*/
            /*vertical-align: bottom;*/
            overflow: auto;
            text-overflow: clip;
            white-space: pre-wrap;
            text-align: center;
        }


        .bootstrap-table .fixed-table-container .table thead th {
            vertical-align: middle;
            padding: 0;
            margin: auto;
        }




        th.table-col--notes {
            min-width: 200px;
        }

        th.table-col--phones {
            min-width: 100px;
        }

        th.test-th {
            position: relative;
            min-width: 22px;
        }
    </style>
@endsection

@section('script')
@endsection
