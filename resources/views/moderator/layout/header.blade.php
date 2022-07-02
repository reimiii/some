<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
        <div class="mobile-menu-button">
            <i class="bi bi-list"></i>
        </div>
        <form class="searchbar">
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                <i class="bi bi-search"></i>
            </div>
            <input class="form-control" type="text" placeholder="Search for anything">
            <div class="position-absolute top-50 translate-middle-y search-close-icon">
                <i class="bi bi-x-lg"></i>
            </div>
        </form>
        <div class="top-navbar-right ms-auto">

            <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-button">
                    <a class="nav-link" href="javascript:;">
                        <div class="">
                            <i class="bi bi-search"></i>
                        </div>
                    </a>
                </li>

                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                       href="javascript:;" data-bs-toggle="dropdown">
                        <div class="user-setting">
                            <img src="{{ Auth::guard('moderator')->user()->getAvatar() }}"
                                 class="user-img" alt="">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex flex-row align-items-center gap-2">
                                    <img src="{{ Auth::guard('moderator')->user()->getAvatar() }}"
                                         alt="" class="rounded-circle" width="54" height="54">
                                    <div class="">
                                        <h6 class="mb-0 dropdown-user-name">
                                            {{ Auth::guard('moderator')->user()->name }}
                                        </h6>
                                        <small class="mb-0 dropdown-user-designation text-secondary">
                                            {{ Auth::guard('moderator')->user()->status }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('setting.mod.profile', Auth::guard('moderator')
                               ->user()->email)
                               }}">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="person-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Profile</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="settings-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Setting</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li> {{-- dropdown-item--}}
                            <a class="dropdown-item" href="{{ route('moderator.logout') }}"
                               onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Logout</span></div>
                                </div>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('moderator.logout') }}"
                              method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>
</header>