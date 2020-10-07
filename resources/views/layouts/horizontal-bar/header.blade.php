<div class="main-header">
    <div class="logo">
        <h1 class="ml-4 font-weight-bold" style="font-size: 1.8rem;line-height: 1;margin: 0; color: #663399">VAMS</h1>
    </div>

    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div style="margin: auto"></div>

    <div class="header-part-right">
{{--        <!-- Full screen toggle -->--}}
{{--        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>--}}
{{--        <!-- Grid menu Dropdown -->--}}
{{--        <div class="dropdown widget_dropdown">--}}
{{--            <i class="i-Safe-Box text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown"--}}
{{--                aria-haspopup="true" aria-expanded="false"></i>--}}
{{--            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                <div class="menu-icon-grid">--}}
{{--                    <a href="#"><i class="i-Shop-4"></i> Home</a>--}}
{{--                    <a href="#"><i class="i-Library"></i> UI Kits</a>--}}
{{--                    <a href="#"><i class="i-Drop"></i> Apps</a>--}}
{{--                    <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>--}}
{{--                    <a href="#"><i class="i-Checked-User"></i> Sessions</a>--}}
{{--                    <a href="#"><i class="i-Ambulance"></i> Support</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="{{asset('assets/images/faces/1.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> {{ Auth::user()->name }}
                    </div>
                    <a class="dropdown-item">Account settings</a>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Sign out</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- header top menu end -->
