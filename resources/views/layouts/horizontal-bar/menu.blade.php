<div class="horizontal-bar-wrap">
    <div class="header-topnav">
        <div class="container-fluid">
            <div class=" topnav rtl-ps-none" id="" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="menu float-left">
                    <li class="{{ request()->is('dashboard/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Halaman Utama
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Bar-Chart"></i>
                                    Halaman Utama
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='dashboard' ? 'open' : '' }}"
                                            href="{{ route('dashboard') }}">
                                            <i class="nav-icon mr-2 i-Clock-3"></i>
                                            <span class="item-name">Dashboard</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="{{ request()->is('users/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Pengurusan Pengguna
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Bar-Chart"></i>
                                    Pengurusan Pengguna
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item " style="width: 255px">
                                        <a class="{{ Route::currentRouteName() == 'users.index' ? 'open' : '' }}"
                                           href="{{ route('users.index') }}">
                                            <i class="nav-icon mr-2 i-Clock-3"></i>
                                            <span class="item-name">Senarai Pengguna</span>
                                        </a>
                                    </li>
                                    <li class="nav-item " style="width: 255px">
                                        <a class="{{ Route::currentRouteName() == 'users.create' ? 'open' : '' }}"
                                           href="{{ route('users.create') }}">
                                            <i class="nav-icon mr-2 i-Clock-3"></i>
                                            <span class="item-name">Daftar Baharu</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="{{ request()->is('vehicles/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Pengurusan Jentera
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Bar-Chart"></i>
                                    Pengurusan Jentera
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item " style="width: 255px">
                                        <a class="{{ Route::currentRouteName() == 'vehicles.index' ? 'open' : '' }}"
                                           href="{{ route('vehicles.index') }}">
                                            <i class="nav-icon mr-2 i-Clock-3"></i>
                                            <span class="item-name">Senarai Jentera</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" style="width: 255px">
                                        <a class="{{ Route::currentRouteName() == 'data.service.upcoming' ? 'open' : '' }}"
                                           href="{{ route('data.service.upcoming') }}">
                                            <i class="nav-icon mr-2 i-Clock-3"></i>
                                            <span class="item-name">Senarai Servis (Akan Datang)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!--=============== Horizontal bar End ================-->
