@extends('layouts.app')

{{-- @section('breadcrumbs')
    {!! Breadcrumbs::render($breadcrumb, @$item) !!}
@endsection --}}
@section('content')
    <h1>{{ __('admin.rap.title') }} </h1>
    <div class="card-columns">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">roles </h5>
                <p class="card-text"> Роли .</p>
                <a class="btn btn-primary" href="{{ route('rap.roles.index') }}" role="button">roles</a>

            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Доступы </h5>
                <p class="card-text"> Доступы .</p>
                <a class="btn btn-primary" href="{{ route('rap.permissions.index') }}" role="button">Доступы</a>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection
