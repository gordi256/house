@extends('layouts.app')
@section('content')
    <table id="table" data-toggle="table" data-url="/api/v1/test_list" class="table-information" data-data-field="items"
        data-filter-control="true" data-group-by="true" data-group-by-field="category_name"
        data-show-search-clear-button="true">
 
        <thead>
            <tr>
                <th data-field="index">#</th>
                {{-- data-formatter="selectFormatter" --}}
                <th data-field="name">Наименование</th>
                <th data-field="check" data-editable="true"  data-filter-control="select">Отметка при наличии повреждений</th>
                <th data-field="unit_type">Ед.изм.</th>
                <th data-field="2">Ориентировочный объём работ,кол-во </th>
                <th data-field="step" data-filter-control="select" data-cell-style="cellStyle" data-editable="true">
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleSelect">Отметка при наличии повреждений</label>
                        <select class="form-control bootstrap-table-filter-control-step " id="exampleSelect"
                            style="width: 100%;" dir="ltr">
                            <option value=""></option>
                            <option value="1">Да</option>
                            <option value="2">Нет</option>
                            <option value="3">Отсутствует </option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleValue">Ориентировочный объём работ,кол-во</label>
                        <input type="text" id="exampleValue" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlselect">Степень важности исполнения</label>
                        <select class="form-control bootstrap-table-filter-control-step " id="exampleFormControlselect"
                            style="width: 100%;" dir="ltr">
                            <option value=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Примечание, дополнение</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="examplePrice">Стоимость на ед., руб.</label>
                        <input type="text" id="examplePrice" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Примечание, дополнение</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
      <!-- /Modal -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/group-by-v2/bootstrap-table-group-by.css"
        rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/group-by-v2/bootstrap-table-group-by.min.js">
    </script>


    <script
        src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
    </script>

    <script>
        $(function() {
            $('#table').bootstrapTable()
        })

        $("#table").on("click-row.bs.table", function(editable, columns, row) {
            console.log("columns:", columns);

            // You can either collect the data one by one
            var params = {
                id: columns.id,
                check: columns.check,
            };
            console.log("Params:", params);

            // OR, you can remove the one that you don't want
            //   delete columns.name;
            console.log("columns:", columns);
            if (columns.check == 'Да') {
                $('#exampleModal').modal('show');
            }
        });

        function nameFormatter(value, row) {

            return '<div class="btn-group" role="group" aria-label="Basic example"><a class="btn btn-primary  btn-sm" href="' +
                row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fas fa-edit"></i> </a>     </div>'
        }



        function selectFormatter(value, row) {

            return '<div><select class="form-control  " style="width: 100%;"><option value="0"></option><option value="1">Да </option><option value="2">Нет</option><option value="3">Отсутствует</option></select></div>'
        }

        function cellStyle(value, row, index) {

            if (value > 6) {
                return {
                    css: {
                        background: 'red'
                    }
                }
            }

            if (value > 2) {
                return {
                    css: {
                        background: 'green'
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
        /*.table td,
                                .table th {
                                    padding: 0.1rem;
                                    font-size: 0.75rem;
                                }

                                .bootstrap-table .fixed-table-container .table thead th .th-inner {
                                    padding: 0.15rem;
                                    vertical-align: bottom;
                                    overflow: auto;
                                    text-overflow: clip;
                                    white-space: pre-wrap;
                                }*/

        .group-by {
            background: rgba(0, 245, 0, .8);
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

        /*
            .table-information tbody tr:nth-child(2n + 2) {
                background: rgba(245, 245, 245, .8);
            }

            .table-information tr th {
             
                padding: 0;
                font-size: 0.72rem;
                border-left-color: #dee2e6;
                border-right-color: #fff;
                background-color: #dee2e6;
            }

            .table-information td {
                padding: 0.1rem;
                font-size: .6875rem;
            }

            .table-information td:first-child {
                text-align: center;
            }

            .table-information tbody tr:hover {
                background: rgba(0, 0, 0, .075);
            }
    */
        th.table-col--vertical .th-inner {
            writing-mode: vertical-lr;
            transform: rotate(-180deg);
            letter-spacing: 0.02em;
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
