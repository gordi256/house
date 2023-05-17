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
                <th data-field="name" data-editable="true" data-sortable="true">Наименование</th>
                <th data-field="unit" data-editable="true" data-align="center">Ед.изм.</th>
                <th data-field="rate" data-editable="true" data-align="right" data-editable="true">Стоимость на ед., руб.
                </th>
                <th data-formatter="nameFormatter" data-switchable="false">Действия</th>
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


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
   
    <link href="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.4/dist/bootstrap-table-locale-all.min.js"></script>



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

            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-info  btn-sm" href="' + row.show_link +
                '" title="Отчеты" target="_blank"><i class="fa fa-file"></i></a>' + '</div>'
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
            // if (columns.check == 'Да') {
            //  $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
            //  $("#fav-title").html($(e.relatedTarget).data('title'));
            $("#recordId").val(columns.id);
            $("#recordName").val(columns.name);
            $("#recordDescription").val(columns.description);
            $("#recordRate").val(columns.rate);
            $("#recordRating").val(columns.rating);
            $("#recordValue").val(columns.value);
            $("#recordCheck").val(columns.check);
            $('#formModal').modal('show');
            //  }
        });

        $('#formModal').on('hidden.bs.modal', function(e) {
            $("#recordId").val('0');
            $("#recordName").val('');
            $("#recordDescription").val('');
            $("#recordRate").val('');
            console.log("hidden:");
        })

        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /* When user click add product button */
            $('#create-new-product').click(function() {
                $('#btn-save').val("create-product");
                $('#product_id').val('');
                $('#productForm').trigger("reset");
                $('#formModalLabel').html("Add New Product");
                $('#formModal').modal('show');
            });

            /* When user clicks edit product button */
            $('body').on('click', '.edit-product', function() {
                var product_id = $(this).data('id');
                $.get('products/' + product_id + '/edit', function(data) {
                    $('#formModalLabel').html("Edit Product");
                    $('#btn-save').val("edit-product");
                    $('#formModal').modal('show');
                    $('#product_id').val(data.id);
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                    $('#price').val(data.price);
                })
            });

            /* When user clicks delete product button */
            $('body').on('click', '.delete-product', function() {
                var product_id = $(this).data("id");
                confirm("Are You sure want to delete !");

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('products') }}" + '/' + product_id,
                    success: function(data) {
                        $table.bootstrapTable('refresh')

                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

            /* When user clicks save button on the product form */
            $('#productForm').submit(function(e) {
                e.preventDefault();

                console.log('submit:');
                var formData = {
                    name: $('#recordName').val(),
                    description: $('#recordDescription').val(),
                    price: $('#recordPrice').val()
                };

                var state = $('#btn-save').val();
                var type = "POST";
                var product_id = $('#product_id').val();
                var ajaxurl = '{{ route('item.store') }}';
                if (state === "edit-product") {
                    type = "PUT";
                    ajaxurl = '{{ url('item') }}' + '/' + product_id;
                }

                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        $('#formModal').modal('hide');
                        $table.bootstrapTable('refresh')

                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

        });
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
