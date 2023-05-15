@extends('layouts.guest')
@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Укажите Email для восстановления пароля</p>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

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
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success">Выслать пароль</button>
                        </div>
                    </div>
                </form>
                <div class="float-left"> <a class="btn btn-primary" href="{{ route('login') }}">Войти</a></div>
                <div class="float-right"> <a class="btn btn-primary" href="{{ route('register') }}">Зарегистрироваться</a>
                </div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
