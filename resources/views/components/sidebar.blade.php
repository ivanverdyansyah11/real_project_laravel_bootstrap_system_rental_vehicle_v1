<div class="sidebar">
    <div class="sidebar-scroll d-flex flex-column justify-content-between">
        <div class="d-flex flex-column align-items-center w-100">
            <a href="">
                <img src="{{ asset('assets/img/brand/brand-logo.svg') }}" class="img-fluid brand-logo" alt="Brand Logo"
                    draggable="false">
            </a>
            <div class="link-wrapper d-flex flex-column w-100">
                <div class="menu-link d-flex flex-column {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="" class="link-item d-flex align-items-center">
                        <div class="icon-sidebar-wrapper">
                            <div class="sidebar-icon dashboard-icon"></div>
                        </div>
                        <p>Dashboard</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
