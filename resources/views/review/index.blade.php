@extends('layouts.app')
@section('content')
    <div id="toolbar">
        <a class="btn btn-primary" href="{{ route('review.create') }}" role="button"><i class="fa fa-plus"></i> Новый отчет
        </a>
    </div>


    <table id="table" data-toolbar="#toolbar" data-toggle="table" data-show-fullscreen="true" data-cache="false"
        data-show-footer="true" data-filter-control="true" data-locale="ru-RU" data-cookie="true" data-search="true"
        data-show-refresh="true" data-show-search-clear-button="true" data-url="/api/v1/review" data-data-field="items"
        data-side-pagination="server" data-pagination="true" data-page-list="[10, 25, 50 ]" class="table-information"
        data-search-highlight="true">
        <thead>
            <tr>
                <th data-field="id">#</th>
                <th data-field="building" data-formatter="buildingFormatter" data-filter-control="select">Объект</th>
                <th data-field="creator" data-filter-control="select">Автор</th>
                {{-- <th data-field="summa" data-align="right">Сумма</th> --}}
                <th data-field="created_at" data-align="right">Дата отчета</th>
                <th data-formatter="nameFormatter" data-switchable="false">Действия</th>
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
            calert('Вы действительно хотите удалить отчет ?', {
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
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-primary  btn-sm" href="' + row.edit_link +
                '" title="Редактировать" target="_blank"><i class="fa fa-edit"></i></a>' +
                '<a class="btn btn-danger  btn-sm delete_button"   data-id="' + row.id +
                '" href="#" title="Удалить"  ><i class="fa fa-trash"></i></a>' + '</div>'
        }

        function buildingFormatter(value, row) {
            return '<i class="fa fa-check-circle " style="color:' + row.check_color +'"></i>  <a href="' + row.edit_link + '" title="Редактировать" >' + row.building + '</a>'
        }
    </script>
@endsection


@section('script')
@endsection
