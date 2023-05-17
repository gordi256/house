@extends('layouts.app')
@section('content')
    <div id="toolbar">
        <a class="btn btn-success" href="{{ route('category.index') }}" role="button">Назад</a>
        <a class="btn btn-primary" href="{{ route('item.create') }}" role="button"><i class="fa fa-plus"></i> Новый пункт</a>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#formModal">
            Новый пункт
        </button>

    </div>


    <table id="table" data-toolbar="#toolbar" data-toggle="table" data-show-fullscreen="true" data-cache="false"
        data-show-footer="false" data-locale="ru-RU" data-cookie="true" data-search="true" data-show-refresh="true"
        data-show-search-clear-button="true" data-url="/api/v1/category/{{ $category->id }}" data-data-field="items"
        class="table-information" data-search-highlight="true" data-query-params="queryParams">
        <thead>
            <tr>
                <th data-field="id" data-sortable="true">#</th>
                <th data-field="name" data-editable="true" data-sortable="true" data-formatter="nameFormatter">Наименование
                </th>
                <th data-field="unit" data-editable="true" data-align="center">Ед.изм.</th>
                <th data-field="rate" data-editable="true" data-align="right" data-editable="true">Стоимость на ед., руб.
                </th>
                <th data-formatter="actionFormatter" data-switchable="false">Действия</th>
            </tr>
        </thead>
    </table>


    <!-- Modal  -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="productForm" name="productForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Параметр</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="recordId" value="">
                        <div class="row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="recordName">Наименование</label>
                                    <input type="text" class="form-control" id="recordName" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="recordRate">Стоимость на ед., руб.</label>
                                    <input type="number" step="0.01" min="0" class="form-control text-right"
                                        id="recordRate" value="">
                                </div>
                            </div>

                            <div class="col ">
                                <div class="form-group">
                                    <label for="recordCheck">Единица измерения</label>
                                    <select class="form-control bootstrap-table-filter-control-step " id="recordCheck"
                                        style="width: 100%;" dir="ltr">
                                        <option value="">-</option>
                                        <option value="Metr">м</option>
                                        <option value="MetrSquare">м2</option>
                                        <option value="MetrCubic">м3</option>
                                        <option value="Piece">шт</option>
                                    </select>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancel" class="btn btn-secondary"
                            data-dismiss="modal">Отмена</button>
                        <button type="submit" id="btn-save" value="create" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal   -->



    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>

    <script src="{{ asset('js/calert.unbabel.min.js') }}"></script>
    <script>
        $('body').on('click', '.delete_button', function(e) {
            var product_id = $(this).data('id');
            console.log("product_id:", product_id);
            calert('Вы действительно хотите удалить расценку ?', {
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

        function queryParams(params) {
            params.category_id = {{ $category->id }} // add param1
            params.your_param2 = 2 // add param2
            // console.log(JSON.stringify(params));
            // {"limit":10,"offset":0,"order":"asc","your_param1":1,"your_param2":2}
            return params
        }

        function nameFormatter(value, row) {

            return '<a class="" href="' + row.edit_link +
                '" title="Редактировать" > ' + row.name +
                '</a>'
        }

        function actionFormatter(value, row) {

            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
                '" href="#" title="Новый отчет"  ><i class="fa fa-trash"></i></a>' + '</div>'
        }

    
    </script>

@endsection


@section('script')
@endsection
