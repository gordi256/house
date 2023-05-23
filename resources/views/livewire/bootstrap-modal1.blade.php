<div>
    <div wire:ignore.self class="modal fade" id="photoModal" tabindex="-1" role="dialog" wire:model="modalFormVisible"
        aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoModalLabel">Фотографии пункта "<span>{{ $item_name }}</span>"
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
                    <div class="row">
                        @if (count($images) > 0)
                            <div class="row">
                                @foreach ($images as $image)
                                    <div class="col-md-2 mb-4">
                                        <figure class="figure">
                                            <a class="my-image-links" data-gall="gallery01" data-maxwidth="1600px"
                                                data-ratio="16x9" href="#" data-href="{{ $image->getUrl() }}"><img
                                                    src="{{ $image->getUrl('preview') }}" class="img-fluid my-link"
                                                    alt="{{ $image->getFullUrl() }}"></a>

                                            Размер: {{ $image->human_readable_size }}</br>
                                            <figcaption class="figure-caption">
                                                <button class="btn btn-danger "
                                                    wire:click="delete({{ $image->id }})"><i
                                                        class="fa fa-trash"></i></button>
                                            </figcaption>
                                        </figure>
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


                        <div class="input-group mb-3" wire:loading.remove>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" wire:model="photos" multiple>
                                <label class="custom-file-label" for="inputGroupFile02">Выберите файлы</label>
                            </div>
                            <div class="input-group-append">
                                <span wire:loading.class="bg-red" class="input-group-text btn btn-success"
                                    wire:click.prevent="upload()">Загрузить</span>
                            </div>
                        </div>
                        @error('photos.*')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row" wire:loading wire:target="upload()">
                        Загружаем фото...
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Отмена</button>
                    {{-- <button type="button" wire:click.prevent="upload()"
                        class="btn btn-primary close-modal">Сохранить</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
