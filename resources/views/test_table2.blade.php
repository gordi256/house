<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>test</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css"
        media="all" />

    <script src="https://cdn.jsdelivr.net/gh/underground-works/clockwork-browser@1/dist/toolbar.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/underground-works/clockwork-browser@1/dist/metrics.js"></script>




    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}


    <!-- http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">

            </div>

            <div class="mt-16">

            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})( MySQl v{{ DB::select('select version()')[0]->{'version()'} }})
                </div>
            </div>
        </div>
    </div>


    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet">
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/messages/messages.ru-ru.min.js" type="text/javascript"></script>


    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <table id="grid"></table>
            </div>
        </div>
    </div>

    <style>
        .grouping {
            white-space: nowrap;
            background: rgba(0, 245, 0, .8);
        }

        .bold {
            font-weight: bold
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            var grid, countries;
            grid = $('#grid').grid({
                dataSource: '/api/v1/test2',
                uiLibrary: 'bootstrap4',
                primaryKey: 'id',
                locale: 'ru-ru',
                grouping: {
                    groupBy: 'category_name',
                    cssClass: 'grouping'
                },
                inlineEditing: {
                    mode: 'command'
                },
                columns: [{
                        field: 'index',
                        width: 50
                    },
                    {
                        field: 'name',
                        editor: false
                    },
                    {
                        field: 'check',
                        title: 'Отметка при наличии повреждений',
                        editor: true,
                         type: 'dropdown', 
                    },
                    {
                        field: 'unit_type',
                        title: 'Ед.изм.',
                      
                    },
                    {
                        field: 'CountryName',
                        title: 'Ориентировочный объём работ,кол-во ',
                       //  type: 'dropdown',
                       //  editField: 'CountryID',
                        //  editor: {
                        //      dataSource: '/Locations/GetCountries',
                        //      valueField: 'id'
                        //  }
                    },
                    {
                        field: 'DateOfBirth',
                     
                        editor: true
                    },
                    {
                        field: 'IsActive',
                        title: 'Active?',
                        type: 'checkbox',
                        editor: true,
                        width: 90,
                        align: 'center'
                    }
                ],
                pager: {
                   // limit: 5
                }
            });
            grid.on('rowDataChanged', function(e, id, record) {
                // Clone the record in new object where you can format the data to format that is supported by the backend.
                var data = $.extend(true, {}, record);
                // Format the date to format that is supported by the backend.
                data.DateOfBirth = gj.core.parseDate(record.DateOfBirth, 'mm/dd/yyyy').toISOString();
                // Post the data to the server
                $.ajax({
                        url: '/Players/Save',
                        data: {
                            record: data
                        },
                        method: 'POST'
                    })
                    .fail(function() {
                        alert('Failed to save.');
                    });
            });
            grid.on('rowRemoving', function(e, $row, id, record) {
                if (confirm('Are you sure?')) {
                    $.ajax({
                            url: '/Players/Delete',
                            data: {
                                id: id
                            },
                            method: 'POST'
                        })
                        .done(function() {
                            grid.reload();
                        })
                        .fail(function() {
                            alert('Failed to delete.');
                        });
                }
            });
        });
    </script>








</body>

</html>
