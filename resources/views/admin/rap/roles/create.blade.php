@extends('layouts.app')

{{-- @section('breadcrumbs')
    {!! Breadcrumbs::render($breadcrumb, @$item) !!}
@endsection --}}
@section('content')
    {{-- <h1>{{ __('admin.roles.create') }} </h1> --}}

    {!! Form::open(['route' => 'rap.roles.store']) !!}

    <h5 class="card-title">Основная информация </h5>
    <div class="form-row">
        <div class=" col-12  ">
            <label for="name">Наименование</label>
            <input type="text" class="form-control {!! @$item->name ? ' is-valid ' : ' is-invalid ' !!}" name="name" id="name" required autofocus
                value="@if (old('name')) {{ old('name') }}@else{{ @$item->name }} @endif">
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
        <a href="{{ route('rap.roles.index') }}" class="btn btn-secondary">Отмена</a>
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
