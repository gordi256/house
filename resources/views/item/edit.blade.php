@extends('layouts.app')
@section('content')
    <!-- row -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Редактирование параметра</h3>
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

                <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="card-body">
                        <div class="row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="name">Наименование</label>
                                    <input type="text" value="{{ $item->name }}"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" placeholder="Наименование параметра" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- @if (@$item->category_id == $category['id']) selected @endif {{ $categ['name'] }}{{ $categ['id'] }} --}}
                        <div class="row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="category_id">Группа</label>
                                    <select name="category_id" id="category" class="form-control">
                                        @foreach ($categories as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $key == @$item->category_id ? 'selected' : '' }}>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col ">
                                <div class="form-group">
                                    <label for="rate">Стоимость на ед., руб.</label>
                                    <input type="number" step="0.01" min="0" class="form-control text-right"
                                        id="rate" name="rate" value="{{ $item->rate }}">
                                    @error('rate')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col ">
                                <div class="form-group">
                                    <label for="unit">Единица измерения {{ $item->unit }} </label>
                                    <select class="form-control bootstrap-table-filter-control-step " id="unit"
                                        name="unit" style="width: 100%;" dir="ltr">
                                        <option value="-" {{ @$item->unit == '-' ? 'selected' : '' }}>-</option>
                                        <option value="м" {{ 'м' == @$item->unit ? 'selected' : '' }}>м</option>
                                        <option value="м2" @if ($item->unit == 'м2') selected @endif>м2</option>
                                        <option value="м3" {{ @$item->unit == 'м3' ? 'selected' : '' }}>м3</option>
                                        <option value="шт" {{ @$item->unit == 'шт' ? 'selected' : '' }}>шт</option>
                                    </select>
                                    @error('unit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col ">

                                <div class="form-group">
                                    <label for="description">Описание, примечания</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $item->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
                        <a class="btn btn-default " href="{{ url()->previous() }}" role="button">Отмена</a>
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
