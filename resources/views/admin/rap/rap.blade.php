@extends('layouts.app')

{{-- @section('breadcrumbs')
    {!! Breadcrumbs::render($breadcrumb, @$item) !!}
@endsection --}}
@section('content')
    <div class="card-columns">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Роли пользователей </h5>
                <p class="card-text"></p>
                <a class="btn btn-primary" href="{{ route('rap.roles.index') }}" role="button">Перейти</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Доступы пользователей</h5>
                <p class="card-text"></p>
                <a class="btn btn-primary" href="{{ route('rap.permissions.index') }}" role="button">Перейти</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection
