@extends('layouts.app')
@section('content')
    <!-- row -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Сведения об объекте {{ $building->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div id="toolbar">
                        @can('manage building')
                            <a class="btn btn-primary" href="{{route('building.info', ['building' => $building->id]) }}"
                                role="button"><i class="fa fa-plus"></i> Информация о здании
                            </a>
                        @endcan
                    </div>

                    <div class="form-group">
                        <label for="name">Наименование</label>
                        {{ $building->name }}

                    </div>

                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="street">Улица</label>
                                {{ $building->street }}

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="house">Номер дома</label>
                                {{ $building->house }}

                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group">
                                <label for="building">Корпус</label>
                                {{ $building->building }}
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group">
                                <label for="liter">Литер</label>
                                {{ $building->liter }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="floors">Этажность</label>
                                {{ $building->floors }}
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group">
                                <label for="entrances">Количество подъездов</label>
                                {{ $building->entrances }}
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group">
                                <label for="improvement">Кат. благоустройства</label>
                                {{ $building->improvement }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="organization">Обслуживающая организация</label>
                        {{ $building->organization }}
                    </div>
                    <div class="form-group">
                        <label for="description">Описание, примечания</label>
                        {{ $building->description }}
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="description">Широта</label>
                            <input type="text" class="form-control" name="longitude" id="longitude"
                                value="{{ $building->longitude }}" placeholder="34.5643545">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="description">Долгота</label>
                            <input type="text" class="form-control" name="latitude" id="latitude"
                                value="{{ $building->latitude }}" placeholder="35.34234234">
                        </div>
                    </div> --}}


                    {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a class="btn btn-primary float-right" href="{{ route('building.edit', $building->id) }}"
                        role="button">Редактировать</a>

                    <a class="btn btn-default " href="{{ route('building.index') }}" role="button">Отмена</a>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
@endsection

@section('script')
@endsection
