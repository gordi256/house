@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Укажите здание</label>
                        <select class="form-control " name="building_id" id="building_id" style="width: 100%;">
                            <option>Выберите значение</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Создать</button>
            <a href="{{ route('review.index') }}" class="btn btn-secondary">Отмена</a>

        </div>
    </form>

    <link rel="stylesheet" href="{{ asset('js/select2/css/select2.min.css') }}">
    <script src="{{ asset('js/select2/js/select2.full.min.js') }}" type="text/javascript"></script>

    <script>
        $(function() {

            //Initialize Select2 Elements
            $('#building_id').select2({
                theme: "classic",
                language: "ru",
                minimumInputLength: 2,
                placeholder: "Начните вводить наименование здания",

                ajax: {
                    delay: 250,
                    url: '/api/v1/building',
                    dataType: 'json',
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }
                        return query;
                    },
                    processResults: function(data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: $.map(data.items, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                }
            })
        })
    </script>
@endsection


@section('script')
@endsection
