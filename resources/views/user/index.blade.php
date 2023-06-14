@extends('layouts.app')
@section('content')
    <div id="toolbar">
        <a class="btn btn-primary" href="{{ route('user.create') }}" role="button"><i class="fa fa-plus"></i> Новый
            пользователь
        </a>
    </div>

    <table id="table" data-toolbar="#toolbar" data-toggle="table" data-show-fullscreen="true" data-cache="false"
        data-show-footer="true" data-locale="ru-RU" data-cookie="true" data-search="true" data-show-refresh="true"
        data-show-search-clear-button="true" data-url="/api/v1/user" data-data-field="items" data-side-pagination="server"
        data-pagination="true" data-page-list="[10, 25, 50 ]" class="table-information" data-search-highlight="true">
        <thead>
            <tr>
                <th data-field="id">#</th>
                <th data-formatter="nameFormatter"data-field="name">ФИО</th>
                <th data-field="email">E-mail </th>
                <th data-field="role">Роль </th>
                <th data-formatter="actionFormatter" data-switchable="false" data-align="center">Действия</th>
            </tr>
        </thead>
    </table>

    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>


    <script src="{{ asset('js/calert.unbabel.min.js') }}"></script>
    <script>
        $('body').on('click', '.delete_button', function(e) {
            var product_id = $(this).data('id');
            console.log("product_id:", product_id);
            calert('Вы действительно хотите удалить данного пользователя ?', {
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
        function nameFormatter(value, row) {

            return '<a class=""  title="Удалить пользователя"  href="' + row.edit_link + '"   >' + row.name + '</a>'
        }

        function actionFormatter(value, row) {

            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
                '" href="#" title="Удалить пользователя"  ><i class="fa fa-trash"></i></a>' + '</div>'
        }
    </script>

 
@endsection


@section('script')
@endsection
