@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Создание нового объекта</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('building.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Наименование</label>
                            <input type="text" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Наименование объекта" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="street">Улица</label>
                                    <input type="text" value="{{ old('street') }}"
                                        class="form-control @error('street') is-invalid @enderror" id="street"
                                        name="street" placeholder="Наименование улицы " />
                                    @error('street')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="house">Номер дома</label>
                                    <input type="text" value="{{ old('house') }}"
                                        class="form-control @error('house') is-invalid @enderror" id="house"
                                        name="house" placeholder="Номер дома" />
                                    @error('house')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col ">
                                <div class="form-group">
                                    <label for="building">Корпус</label>
                                    <input type="text" value="{{ old('building') }}"
                                        class="form-control @error('building') is-invalid @enderror" id="building"
                                        name="building" placeholder="Корпус" />
                                    @error('building')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col ">
                                <div class="form-group">
                                    <label for="liter">Литер</label>
                                    <input type="text" value="{{ old('liter') }}"
                                        class="form-control @error('liter') is-invalid @enderror" id="liter"
                                        name="liter" placeholder="Литер" />
                                    @error('liter')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="floors">Этажность</label>
                                    <input type="number" value="{{ old('floors') }}"
                                        class="form-control @error('floors') is-invalid @enderror" id="floors"
                                        name="floors" placeholder="1" />
                                    @error('floors')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col ">
                                <div class="form-group">
                                    <label for="entrances">Количество подъездов</label>
                                    <input type="number" value="{{ old('entrances') }}"
                                        class="form-control @error('entrances') is-invalid @enderror" id="entrances"
                                        name="entrances" placeholder="1" />
                                    @error('entrances')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col ">
                                <div class="form-group">
                                    <label for="improvement">Кат. благоустройства</label>
                                    <input type="number" value="{{ old('improvement') }}"
                                        class="form-control @error('improvement') is-invalid @enderror" id="improvement"
                                        name="improvement" placeholder="1" />
                                    @error('improvement')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="organization">Обслуживающая организация</label>
                            <input type="text" value="{{ old('organization') }}"
                                class="form-control @error('organization') is-invalid @enderror" id="organization"
                                name="organization" placeholder="Наименование обслуживающей  организации" />
                            @error('organization')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Описание, примечания</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="description">Широта</label>
                                <input type="text" class="form-control" name="longitude" id="longitude"
                                    placeholder="34.5643545">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description">Долгота</label>
                                <input type="text" class="form-control" name="latitude" id="latitude"
                                    placeholder="35.34234234">
                            </div>
                        </div>


                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --}}
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Записать</button>
                        <a class="btn btn-default " href="{{ route('building.index') }}" role="button">Отмена</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->
@endsection

@section('script')
@endsection
