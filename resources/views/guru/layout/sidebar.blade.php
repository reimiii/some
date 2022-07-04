<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon-2.png') }}" class="logo-icon" alt="logo
            icon">
        </div>
        <div>
            <h4 class="logo-text">Guru</h4>
        </div>
        <div class="toggle-icon ms-auto">
            <ion-icon name="menu-sharp"></ion-icon>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('guru.dashboard') }}">
                <div class="parent-icon">
                    <i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Setting</li>

        <li>
            <a href="">
                <div class="parent-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <div class="menu-title">Guru</div>
            </a>
        </li>
        <li>
            <a href="">
                <div class="parent-icon">
                    <i class="bi bi-printer"></i>
                </div>
                <div class="menu-title">Siswa</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</aside>