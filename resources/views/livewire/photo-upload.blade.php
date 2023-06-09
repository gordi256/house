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

                            @foreach ($images as $image)
                                <div class="col-md-2 mb-4">
                                    <figure class="figure">
                                        <a class="my-image-links" data-gall="gallery01" data-maxwidth="1600px"
                                            data-ratio="16x9" href="#" data-href="{{ $image->getUrl() }}"><img
                                                src="{{ $image->getUrl('preview') }}" class="img-fluid my-link"
                                                alt="{{ $image->getFullUrl() }}"></a>

                                        Размер: {{ $image->human_readable_size }} 
                                        <figcaption class="figure-caption">
                                            <button class="btn btn-danger " wire:click="delete({{ $image->id }})"><i
                                                    class="fa fa-trash"></i></button>
                                            <button class="btn btn-success"
                                                wire:click="download({{ $image->id }})"><i
                                                    class="fa fa-download"></i></button>
                                        </figcaption>
                                    </figure>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 text-center">
                                Изображений не найдено
                            </div>
                        @endif
                    </div>
                    <div class="row" wire:loading wire:target="delete">
                        <div class="alert alert-danger" role="alert">
                            Удаляем фото...
                        </div>
                    </div>
                    <div class="row">
                        <form wire:submit.prevent="save">
                            <input type="file" class="form-control" wire:model="photos" multiple
                                style="padding: 3px 5px;" />
                            @error('photos.*')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                    <div class="row" wire:loading wire:target="upload">
                        <div class="alert alert-success" role="alert">
                            Загружаем фото...
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" wire:click="closeModal()"
                        data-dismiss="modal">Отмена</button>
                    <button type="button" wire:click="upload()" class="btn btn-primary close-modal">Загрузить фото</button>
                </div>
            </div>
        </div>
    </div>
</div>
