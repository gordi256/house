@extends('layouts.app')
@section('content')
    <!-- Small Box (Stat card) -->
    <h5 class="mb-2 mt-4">Основная информация</h5>
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $review_count }}</h3>

                    <p>Отчеты</p>
                </div>
                <div class="icon">
                    <i class="fas fa-list"></i>
                </div>
                <a href="{{ route('review.index') }}" class="small-box-footer">
                    Перейти <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $buildings_count }}</h3>

                    <p>Здания</p>
                </div>
                <div class="icon">
                    <i class="fas fa-home"></i>
                </div>
                <a href="{{ route('building.index') }}" class="small-box-footer">
                    Перейти <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $user_count }}</h3>

                    <p>Пользователи</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">
                    Перейти <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

    </div>
    <!-- /.row -->
@endsection
