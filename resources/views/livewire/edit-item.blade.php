<div>


    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" wire:model="modalFormVisible"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редактирование пункта
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" wire:model="item_id">
                    <span>{{ $item_name }}</span>
                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordCheck">Отметка при наличии повреждений</label>
                                <select class="form-control bootstrap-table-filter-control-step " id="recordCheck"
                                    style="width: 100%;" dir="ltr" wire:model="check">
                                    <option value=""></option>
                                    <option value="Да">Да</option>
                                    <option value="Нет">Нет</option>
                                    <option value="Отсутствует">Отсутствует </option>

                                </select>
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordRating">Степень важности исполнения</label>
                                <select class="form-control bootstrap-table-filter-control-step " id="recordRating"
                                    wire:model="rating" style="width: 100%;" dir="ltr">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordValue">Ориентировочный объём работ,кол-во</label>
                                <input type="number" step="0.01" min="0" id="recordValue" wire:model="value"
                                    class="form-control text-right">
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordPrice">Стоимость на ед., руб.</label>
                                <input type="number" step="0.01" min="0" class="form-control text-right"
                                    id="recordPrice" wire:model="rate">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col ">
                            <div class="form-group">
                                <label for="recordDescription">Примечание, дополнение</label>
                                <textarea class="form-control" id="recordDescription" wire:model="description" rows="3"></textarea>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Отмена</button>
                    <button type="button" wire:click.prevent="store()"
                        class="btn btn-primary close-modal">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

</div>
