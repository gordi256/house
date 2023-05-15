<div>


    <div wire:ignore.self class="modal fade" id="photoModal" tabindex="-1" role="dialog" wire:model="modalFormVisible"
        aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel">Фотографии пункта
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif

                    <input type="hidden" wire:model="item_id">
                    <span>{{ $item_name }}</span>
                    <h3> Фотографии </h3>
                    <div class="row">
                        @if (count($images) > 0)
                            <div class="row">
                                @foreach ($images as $image)
                                    <div class="col-md-2 mb-4">
                                        <img src="{{ $image->getUrl('preview') }}" class="img-fluid"
                                            alt="{{ $image->getFullUrl() }}">

                                        размер {{ $image->human_readable_size }}</br>

                                        <button class="btn btn-info  btn-sm"><i class="fa fa-trash"></i></button>


                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    Изображений не найдено
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <input type="file" class="form-control" wire:model="photos" multiple
                            style="padding: 3px 5px;" />
                        @error('photos.*')
                            <span class="error">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Отмена</button>
                    <button type="button" wire:click.prevent="upload()"
                        class="btn btn-primary close-modal">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

</div>
