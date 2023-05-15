@extends('layouts.guest')
@section('content')
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Регистрация нового пользователя</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">Фамилия</label>
                        <div class="col-md-6">
                            <input id="last_name" type="text"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">Имя</label>
                        <div class="col-md-6">
                            <input id="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="patronymic" class="col-md-4 col-form-label text-md-end">Отчество</label>
                        <div class="col-md-6">
                            <input id="patronymic" type="text"
                                class="form-control @error('patronymic') is-invalid @enderror" name="patronymic"
                                value="{{ old('patronymic') }}" required autocomplete="patronymic" autofocus>
                            @error('patronymic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">E-mail</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Пароль</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Повторите пароль</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="current-password">

                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Регистрация</button>


                        </div>
                    </div>
                </form>

                <div class="float-left"> <a class="btn btn-primary" href="{{ route('login') }}">Войти</a></div>
                <div class="float-right"> <a class="btn btn-primary" href="{{ route('password.request') }}">Я забыл
                        пароль</a>
                </div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
