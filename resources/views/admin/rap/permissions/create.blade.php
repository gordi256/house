@extends('layouts.app')

{{-- @section('breadcrumbs')
    {!! Breadcrumbs::render($breadcrumb, @$item) !!}
@endsection --}}
@section('content')
    <form action="{{ route('rap.permissions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h5 class="card-title">Основная информация </h5>
        <div class="form-row">
            <div class=" col-12  ">
                <label for="permission">Наименование</label>
                <input type="text" class="form-control {!! @$permission->name ? ' is-valid ' : ' is-invalid ' !!}" name="name" id="name" required
                    autofocus
                    value="@if (old('name')) {{ old('name') }}@else{{ @$permission->name }} @endif">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="guard_name">Guard Name</label>
            <input type="text" name="guard_name" value="{{ @$permission->guard_name }}" class='form-control'
                placeholder='Guard Name'>
        </div>
        <div class=" py-3 form-row justify-content-center">
            <button type="submit" class="btn btn-primary float-right">Записать</button>
            <a class="btn btn-default " href="{{ route('rap.permissions.index') }}" role="button">Отмена</a>
        </div>
    </form>
@endsection
