@extends('layouts.app')
@section('content')
    <div id="toolbar">
        <a class="btn btn-primary" href="#" id="newGroup" role="button"><i class="fa fa-plus"></i> Новая группа
        </a>
        <a class="btn btn-primary" href="#" id="newItem" role="button"><i class="fa fa-plus"></i> Новая строка
        </a>
        <a class="btn btn-success" href="{{ route('report.download', ['review' => $review->id]) }}" id="newItem"
            role="button"><i class="fa fa-download"></i> Скачать отчет
        </a>
        <a class="btn btn-success" href="{{ route('review.show', ['review' => $review->id]) }}" id="newItem"
            role="button"><i class="fa fa-eye"></i> Отчет
        </a>
        <button type="button" id="info" data-toggle="modal" data-target="#infoModal" class="btn btn-info">
            Помощь</button>
    </div>



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


    <table id="table" data-toolbar="#toolbar" data-show-fullscreen="true" data-toggle="table"
        data-url="/api/v1/review/list" data-locale="ru-RU" class="table-information" data-data-field="items"
        data-filter-control="true" data-group-by="true" data-group-by-field="category_order"
        data-show-search-clear-button="true" data-query-params="queryParams" data-show-refresh="true"
        data-show-footer="true" data-show-columns="true">

        <thead>
            <tr>
                <th data-field="index" data-sortable="true">#</th>
                {{-- data-formatter="selectFormatter" --}}
                <th data-field="name">Наименование</th>
                <th data-field="check" data-editable="true" data-filter-control="select">Отметка при наличии повреждений
                </th>
                <th data-field="unit" data-align="center">Ед.изм.</th>
                <th data-field="value" data-align="right" data-sortable="true">Ориентировочный объём работ,кол-во </th>
                <th data-field="rating" data-align="center" data-filter-control="select" data-cell-style="cellStyle"
                    data-editable="true">&nbsp;Степень важности исполнения, оценка рисков при эксплуатации
                    "Опасность&nbsp;в&nbsp;эксплуатации" (опасно/безопасно)</th>
                <th data-field="description" data-editable="true" class="cellStyle1" data-formatter="descriptionFormatter">
                    Примечание, дополнение</th>
                <th data-field="price" data-editable="true" data-sortable="true" data-align="right">Стоимость на ед., руб.
                </th>
                <th data-field="summa" data-editable="true" data-sortable="true" data-filter-control="input"
                    data-align="right" data-footer-formatter="priceFormatter">Ориентировочная
                    стоимость работ, руб.
                </th>
                <th data-formatter="nameFormatter" data-switchable="false">Действия</th>

            </tr>
        </thead>



    </table>

    <!-- Modal info-->

    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Помощь (Степени риска)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">

                            <table class="table ">
                                <thead>
                                    <tr style="background:#fed966">
                                        <th scope="col">Вероятность разрушения</th>
                                        <th colspan="2">Ущерб, получение травм</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> </td>
                                        <td style="background:#98c3e6">Незначительный</td>
                                        <td style="background:#98c3e6">Высокий </td>
                                    </tr>
                                    <tr>
                                        <td style="background:#98c3e6">Низкая</td>
                                        <td style="background:#94cf4e">1</td>
                                        <td style="background:#c55813">6</td>
                                    </tr>
                                    <tr>
                                        <td style="background:#98c3e6">Ниже среднего</td>
                                        <td style="background:#538234">2</td>
                                        <td style="background:#c55813">7</td>
                                    </tr>
                                    <tr>
                                        <td style="background:#98c3e6">Средняя</td>
                                        <td style="background:#ffff01">3</td>
                                        <td style="background:#ff7c81">8</td>
                                    </tr>
                                    <tr>
                                        <td style="background:#98c3e6">Выше среднего</td>
                                        <td style="background:#ffff01">4</td>
                                        <td style="background:#ff7c81">9</td>
                                    </tr>
                                    <tr>
                                        <td style="background:#98c3e6">Высокая</td>
                                        <td style="background:#fbc300">5</td>
                                        <td style="background:#fd0100">10</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>где 1 - риски отсутствуют (безопасно)</p>
                            <p>где 5 - средний показатель (требуется плановый ремонт, риск наступления ущерба незначителен)
                            </p>
                            <p>где 10 - крайне высокий (требуется срочный ремонт, риск наступления ущерба, риск опасности
                                для жизни)</p>
                        </div>
                        <div class="col">
                            <table class="table  table-sm">
                                <thead>
                                    <tr>
                                        <th colspan="2" scope="col">Оценка риска</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>риски отсутствуют (безопасно)</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>риск минимальный (требуется незначительный ремонт, безопасно для проживания,
                                            ущерба не придвидится)</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>риск минимальный (требуется ремонт менее 50%, безопасно для проживания, возможен
                                            незначительный ущерб)</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>риск ниже среднего (требуется ремонт более 85% конструкции, безопасно для
                                            проживания,возможен значительный ущерб)</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>риск ниже среднего (требуется ремонт более 85% конструкции, безопасно для
                                            проживания,возможен значительный ущерб)</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Риск выше среднего (требуется плановый ремонт, риск наступления ущерба
                                            незначителен)</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>риски</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Риск выше среднего (требуется плановый ремонт, риск наступления ущерба
                                            незначителен)</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>высокий (требуется срочный ремонт, риск наступления ущерба, риск получения
                                            травм)</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>высокий (требуется срочный ремонт, риск наступления ущерба, риск получения
                                            травм)</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть </button>
                </div>
            </div>
        </div>
    </div>

    <!-- /Modal info-->

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Редактирование пункта</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="recordId" value="">
                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordCheck">Отметка при наличии повреждений</label>
                                <select class="form-control bootstrap-table-filter-control-step " id="recordCheck"
                                    style="width: 100%;" dir="ltr">
                                    <option value=""></option>
                                    <option value="1">Да</option>
                                    <option value="2">Нет</option>
                                    <option value="3">Отсутствует </option>

                                </select>
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordRating">Степень важности исполнения</label>
                                <select class="form-control bootstrap-table-filter-control-step " id="recordRating"
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordValue">Ориентировочный объём работ,кол-во</label>
                                <input type="number" step="0.01" min="0" id="recordValue"
                                    class="form-control" value="">
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordPrice">Стоимость на ед., руб.</label>
                                <input type="number" step="0.01" min="0" class="form-control"
                                    id="recordPrice" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordDescription">Примечание, дополнение</label>
                                <textarea class="form-control" id="recordDescription" rows="3"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Фото</label>
                                <!-- 2. Initialize -->
                                <div id="uppy"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="button" id="saveRecord" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal -->

    <!-- Modal Images-->
    <div class="modal fade" id="formModalImages" tabindex="-1" role="dialog" aria-labelledby="formModalImagesLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Загрузка фото</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="recordIdImages" value="">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="button" id="saveImages" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Images -->



    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/group-by-v2/bootstrap-table-group-by.css"
        rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/group-by-v2/bootstrap-table-group-by.min.js">
    </script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table-locale-all.min.js"></script>
    <script
        src="https://unpkg.com/bootstrap-table@1.21.4/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
    </script>


    <script>
        $(function() {
            $('#table').bootstrapTable({

            })
        })



        function priceFormatter(data) {
            var field = this.field
            return 'Итого :' + data.map(function(row) {
                return +row[field]
            }).reduce(function(sum, i) {
                return sum + i
            }, 0).toFixed(2)
        }

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
                //  $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
                //  $("#fav-title").html($(e.relatedTarget).data('title'));
                $("#recordId").val(columns.id);
                $("#formModalLabel").html("Редактирование пункта </br>" + columns.name);


                $("#recordPrice").val(columns.price);
                $("#recordDescription").val(columns.description);
                $("#recordPrice").val(columns.price);
                $("#recordRating").val(columns.rating);
                $("#recordValue").val(columns.value);
                $("#recordCheck").val(columns.check);
                $('#formModal').modal('show');
            }
        });

        function queryParams(params) {
            params.review_id = {{ $review->id }} // add param1
            params.your_param2 = 2 // add param2
            // console.log(JSON.stringify(params));
            // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
            return params
        }

        function nameFormatter(value, row) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm edit-button"  data-row-id="' + row.id +
                '" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fas fa-edit"></i> </a> ' +
                '<a class="btn btn-primary  btn-sm" href="#" title="Фото" target="_blank"><i class="fas fa-camera"></i> </a> ' +
                '</div>'
        }

        function descriptionFormatter(value, row) {
            return '<div class="container"><div class="truncate-text">' + row.description + '</div></div>'
        }

        function selectFormatter(value, row) {
            return '<div><select class="form-control  " style="width: 100%;"><option value="0"></option><option value="1">Да </option><option value="2">Нет</option><option value="3">Отсутствует</option></select></div>'
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

        }

        */ th.table-col--vertical .th-inner {
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

@section('script')
@endsection
