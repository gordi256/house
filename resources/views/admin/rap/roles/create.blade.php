@extends('layouts.app')

{{-- @section('breadcrumbs')
    {!! Breadcrumbs::render($breadcrumb, @$item) !!}
@endsection --}}
@section('content')
    {{-- <h1>{{ __('admin.roles.create') }} </h1> --}}

    <form action="{{ route('rap.roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h5 class="card-title">Основная информация </h5>
        <div class="form-row">
            <div class=" col-12  ">
                <label for="name">Наименование</label>
                <input type="text" class="form-control {!! @$item->name ? ' is-valid ' : ' is-invalid ' !!}" name="name" id="name" required
                    autofocus value="@if (old('name')) {{ old('name') }}@else{{ @$item->name }} @endif">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="guard_name">Guard Name</label>
            <input type="text" name="guard_name" value="admin" class='form-control' placeholder='Guard Name'>
        </div>

        <div class=" py-3 form-row justify-content-center">
            <button type="submit" class="btn btn-primary float-right">Записать</button>
            <a class="btn btn-default " href="{{ route('rap.roles.index') }}" role="button">Отмена</a>
        </div>
    </form>
@endsection
