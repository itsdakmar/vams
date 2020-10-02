<div class="horizontal-bar-wrap">
    <div class="header-topnav">
        <div class="container-fluid">
            <div class=" topnav rtl-ps-none" id="" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="menu float-left">
                    <li class="{{ request()->is('dashboard/*') ? 'active' : '' }}">
                        <div>
                            <div>
                                <label class="toggle" for="drop-2">
                                    Starter Kits
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Bar-Chart"></i>
                                    Starter Kits
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
                                    User Management
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Bar-Chart"></i>
                                    User Management
                                </a>
                                <input type="checkbox" id="drop-2">
                                <ul>
                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName() == 'users.index' ? 'open' : '' }}"
                                           href="{{ route('users.index') }}">
                                            <i class="nav-icon mr-2 i-Clock-3"></i>
                                            <span class="item-name">List of users</span>
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
