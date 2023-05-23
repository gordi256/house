@extends('layouts.app')
@section('content')
    <div id="toolbar">
        <a class="btn btn-success" href="{{ route('review.show', ['review' => $review->id]) }}" role="button"><i
                class="fa fa-eye"></i> Отчет</a>
        <a class="btn btn-danger confirm_button" data-id="{{ $review->id }}" href="#" role="button"> Подтвердить
            анкету</a>
        <a class="btn btn-primary approve_button" data-id="{{ $review->id }}" href="#" role="button"><i
                class="fa fa-plus"></i>Утвердить анкету </a>

        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"> <i class="fa fa-download"></i>
                Скачать отчет
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="{{ route('report.download_all', ['review' => $review->id]) }}">С пустыми
                    строками</a>
                <a class="dropdown-item" href="{{ route('report.download', ['review' => $review->id]) }}">Только
                    заполненные</a>
            </div>
        </div>
        <a class="btn btn-danger" href="{{ route('report.download_photo', ['review' => $review->id]) }}" role="button"><i
                class="fa  fa-camera"></i> Скачать фото</a>
        <button type="button" id="info" data-toggle="modal" data-target="#infoModal" class="btn btn-info">
            Помощь</button>
    </div>


    <table id="table" data-query-params="queryParams" class="table-information"></table>


    <link href="{{ asset('js/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.css') }}" rel="stylesheet">
    <link href="{{ asset('js/bootstrap-table/bootstrap-table.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/bootstrap-table-locale-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/group-by-v2/bootstrap-table-group-by.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.min.js') }}">
    </script>
    <script src="{{ asset('js/bootstrap-table/extensions/editable/bootstrap-table-editable.min.js') }}"></script>

    <link href="{{ asset('js/x-editable-develop/dist/bootstrap4-editable/css/bootstrap-editable.css') }}"
        rel="stylesheet" />
    <script src="{{ asset('js/x-editable-develop/dist/bootstrap4-editable/js/bootstrap-editable.min.js') }}"></script>

    <link rel="stylesheet" type="text/css"
        href="{{ asset('js/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.css') }}">



    <script>
        $.fn.editable.defaults.mode = 'inline';

        $(function() {

            $("#table").on("editable-save.bs.table", function(event, field, row, rowIndex, oldValue, el) {
                alert("New value = " + row[field] + ", old value = " + oldValue + ", rowIndex value = " +
                    row.id);



            });



            //   $('#table').on('editable-init.bs.table', function(e) {
            //        var $els = $('#table').find('.editable');
            //       $els.each(function(index, value) {
            //          $(this).editable('option', 'source', [{
            //             "Да": "Да"
            //         }, {
            //         "Нет": "Нет"
            ////    }, {
            //       "Отсутствует": "Отсутствует"
            //   }])
            //  });

            // });
            var data = [{
                'name': 'Да'
            }, {
                'name': 'Нет'
            }, {
                'name': 'deleted'
            }]
            $('#table').bootstrapTable({
                showRefresh: 'true',
                url: '/api/v1/review/list',
                locale: 'ru-RU',
                showFullscreen: 'true',
                toggle: "table",
                search: "true",
                searchHighlight: "true",
                groupBy: "true",
                toggle: "table",
                groupByField: "category_order",
                groupByShowToggleIcon: "true",
                groupByToggle: "true",
                dataField: "items",
                filterControl: true,
                queryParams: {
                    review_id: {{ $review->id }},

                },
                showFilterControlSwitch: true,
                showFooter: "true",
                toolbar: "#toolbar",
                showColumns: true,
                columns: [{
                        field: 'index',
                        title: '#',
                        sortable: true
                    }, {
                        field: 'name',
                        title: 'Наименование',
                        sortable: true
                    }, {
                        field: 'check',
                        title: 'Отметка при наличии</br> повреждений',
                        sortable: false,
                        align: 'center',
                        // defaultValue: 'null',
                        width: 150,
                        filterControl: 'select',
                        filterControlPlaceholder: 'Выберите значение',
                        //  searchable: true,\
                        editable: {
                            type: 'select',
                            //   {{-- emptytext: '---', --}}
                            display: function(value) {
                                $(this).text(value);
                            },

                            source: [{
                                    value: 'null',
                                    text: '---'
                                }, {
                                    value: 'Да',
                                    text: 'Да'
                                },
                                {
                                    value: 'Нет',
                                    text: 'Нет'
                                },
                                {
                                    value: 'Отсутствует',
                                    text: 'Отсутствует'
                                }
                            ]

                        },


                    }, {
                        field: 'unit',
                        title: 'Ед.изм.',
                        sortable: false,
                        align: 'center'
                    }, {
                        field: 'value',
                        title: 'Ориентировочный объём</br> работ,кол-во',
                        sortable: true,
                        align: 'center',
                        width: 150
                    }, {
                        field: 'rating',
                        title: 'Степень важности исполнения,</br>  оценка рисков при эксплуатации </br>"Опасность в эксплуатации" (опасно/безопасно)',
                        sortable: true,
                        align: 'center',
                        filterControl: 'select',
                        filterControlPlaceholder: 'Выберите значение',
                        formatter: function(index, row, $element) {

                            var value = row.rating;
                            if (value == 10) {
                                return {
                                    css: {
                                        background: '#fd0100'
                                    }
                                }
                            }
                            if (value == 9) {
                                return {
                                    css: {
                                        background: '#ff7c81'
                                    }
                                }
                            }
                            if (value == 8) {
                                return {
                                    css: {
                                        background: '#ff7c81'
                                    }
                                }
                            }
                            if (value == 7) {
                                return {
                                    css: {
                                        background: '#c55813'
                                    }
                                }
                            }
                            if (value == 6) {
                                return {
                                    css: {
                                        background: '#c55813'
                                    }
                                }
                            }
                            if (value == 5) {
                                return {
                                    css: {
                                        background: '#fbc300'
                                    }
                                }
                            }
                            if (value == 4) {
                                return {
                                    css: {
                                        background: '#ffff01'
                                    }
                                }
                            }
                            if (value == 3) {
                                return {
                                    css: {
                                        background: '#ffff01'
                                    }
                                }
                            }
                            if (value == 2) {
                                return {
                                    css: {
                                        background: '#538234'
                                    }
                                }
                            }
                            if (value == 1) {
                                return {
                                    css: {
                                        background: '#94cf4e'
                                    }
                                }
                            }
                            return {
                                css: {
                                    color: 'black'
                                }
                            }
                        },
                        //  detailFormatter: function(index, row, $element) {
                        //     return ' !' + row.rating + ' '
                        //  },
                    }, {
                        field: 'description',
                        title: 'Примечание, дополнение',
                        formatter: function(index, row, $element) {
                            return '<div class="container"><div class="truncate-text">' + row
                                .description + '</div></div>'
                        },

                        width: 250
                    },

                    {
                        field: 'price',
                        title: 'Стоимость на ед., руб.',
                        sortable: true,
                        align: 'right',
                        width: 150
                    }, {
                        field: 'summa',
                        title: 'Ориентировочная стоимость работ, руб.',
                        sortable: true,
                        align: 'right',
                        width: 150
                    }, {
                        title: 'Действия',
                        sortable: false,
                        align: 'center',
                        formatter: function(index, row, $element) {
                            return '<div class="btn-group  mr-2" role="group" aria-label="Basic example">' +
                                '<button  class="btn btn-primary  btn-sm edit-button"  data-id="' +
                                row.id +
                                '"><i class="fas fa-edit"></i></button>' +
                                '<button class="btn btn-primary   btn-sm photo-button"   data-id="' +
                                row.id +
                                '"><i class="fas fa-camera"></i> <span class="badge badge-pill badge-success">' +
                                row.photo_count +
                                '</span></button>' + '</div>'
                        },
                    },
                ],




            })


        })
    </script>

    <style>
        .group-by {
            background: #3d9970;
            font-size: 1.32rem;
        }

        .container-truncate-text {
            width: 200px;
            background: #c8ad90;
            padding: 1rem;
        }

        .truncate-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            line-height: 1.1em;
            height: 2.2em;
        }
    </style>
@endsection

@section('script')
    {{-- display: function(value, sourceData) {
                                //display checklist as comma-separated values
                                var html = [],
                                    checked = $.fn.editableutils.itemsByValue(value, sourceData);
                                //console.log(value);

                                $(this).html(value);
                                // if (checked.length) {
                                //    $.each(checked, function(i, v) {
                                //       html.push($.fn.editableutils.escape(v.text));
                                //    });
                                //  $(this).html(html.join(', '));
                                // } else {
                                //     $(this).empty();
                                //  }
                            },
                            source: [{
                                    value: 'null',
                                    text: '---'
                                },
                                {
                                    value: 'Да',
                                    text: 'Да'
                                },
                                {
                                    value: 'Нет',
                                    text: 'Нет'
                                },
                                {
                                    value: 'Отсутствует',
                                    text: 'Отсутствует'
                                }
                            ], --}}
@endsection
