@extends('layouts.app')
@section('content')
    <div id="toolbar">
        @can('manage building')
            <a class="btn btn-primary" href="{{ route('building.create') }}" role="button"><i class="fa fa-plus"></i> Новый объект
            </a>
        @endcan
    </div>


    <table id="table" data-toolbar="#toolbar" data-toggle="table" data-show-fullscreen="true" data-cache="false"
        data-show-footer="true" data-locale="ru-RU" data-cookie="true" data-search="true" data-show-refresh="true"
        data-show-search-clear-button="true" data-url="/api/v1/building" data-data-field="items"
        data-side-pagination="server" data-pagination="true" data-page-list="[10, 25, 50 ]" class="table-information">
        <thead>
            <tr>
                <th data-field="id">#</th>
                <th data-field="name" data-formatter="nameFormatter">Наименование</th>
                <th data-field="organization">Организация </th>
                <th data-field="review_count">Отчеты</th>
                <th data-formatter="actionFormatter" data-switchable="false">Действия</th>
            </tr>
        </thead>

    </table>

    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.min.js') }}">
    </script>


    <script>
        $(function() {
            $('#table').bootstrapTable()
        })

        function nameFormatter(value, row) {

            return '<a class="" href="' + row.show_link +
                '" title="Отчеты"  >' + row.name + '</a>'
        }

        function actionFormatter(value, row) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать"   ><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-info  btn-sm" href="' + row.report_link +
                '" title="Отчеты"  ><i class="fa fa-file"></i></a>' +
                '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
                '" href="#" title="Новый отчет"  ><i class="fa fa-trash"></i></a>' + '</div>'
        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {

            $('body').on('click', '.delete_button', function(e) {
                //   $("a.delete_button").click(function(e) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-success'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Удаление ',
                    text: 'Вы действительно хотите удалить объект?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ДА!',
                    cancelButtonText: 'Нет',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                                'Удаляем!',
                                'Выполняется удаление объекта.',
                                'success'
                            ),
                            //  swalWithBootstrapButtons.close();
                            setTimeout(() => {
                                window.location.href = "/upload/clear";
                            }, 10 * 500);
                    }
                })
            });
        });
    </script>
@endsection


@section('script')
@endsection
