@extends('layouts.app')
{{-- 
@section('breadcrumbs')
    {!! Breadcrumbs::render($breadcrumb, @$role) !!}
@endsection --}}
@section('content')
    {{-- <h1>{{ __('admin.roles.edit') }} </h1> --}}

    {!! Form::model($role, ['route' => ['rap.roles.update', $role->id], 'method' => 'patch']) !!}

    <h5 class="card-title">Основная информация </h5>
    <div class="form-row">
        <div class=" col-12  ">
            <label for="name">Наименование</label>
            <input type="text" class="form-control {!! @$role->name ? ' is-valid ' : ' is-invalid ' !!}" name="name" id="name" required autofocus
                value="@if (old('name')) {{ old('name') }}@else{{ @$role->name }} @endif">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="form-group">
        <label for="guard_name">Guard Name</label>
        <input type="text" name="guard_name" value="{{ $role->guard_name }}" class='form-control' placeholder='Guard Name'>
    </div>
    @include('admin.blocks.role_perms_form')



    <div class=" py-3 form-row justify-content-center">
        <a href="{{ route('rap.roles.index') }}" class="btn btn-secondary">Отмена</a>
        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
