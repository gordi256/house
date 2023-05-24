<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="/img/logo1.jpg" alt=" Logo" class="brand-image  elevation-3"
            style="opacity: 0.8" />
        <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/user1.jpg" class="img-circle elevation-2" alt="{{ Auth::user()->fio_short }}" />
            </div>
            <div class="info">
                <a href="/profile" class="d-block">{{ Auth::user()->fio_short }}</a>
            </div>


            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit">
                    Выйти
                </button>
            </form>
        </div>

        <!-- SidebarSearch Form
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Поиск"
                    aria-label="Поиск" />
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
 -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library menu-open-->
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Справочники
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('building.index') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Здания</p>
                            </a>
                        </li>
                        @can('manage users')
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link  ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Пользователи</p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link  ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Расценки</p>
                            </a>
                        </li>
                   
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link  active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Настройки
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('log-viewer.index') }}" target="_blank" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Логи ошибок<span class="right badge badge-danger">Админ</span></p>
                            </a>
                        </li>


                        @can('manage roles')
                            <li class="nav-item">
                                <a href="{{ route('rap.rap.list') }}" target="_blank" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Роли и доступы<span class="right badge badge-danger">Админ</span></p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a href="https://chatbot.theb.ai/" target="_blank" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>chatbot<span class="right badge badge-danger">Админ</span></p>
                            </a>
                        </li>

                    </ul>



                </li>

                
                <li class="nav-item">
                    <a href="{{ route('review.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>Отчеты</p>
                    </a>
                </li>




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
