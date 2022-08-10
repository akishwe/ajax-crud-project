<div class="app-header header-shadow">
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="app-header__content">
        <div class="app-header-left">
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-link-icon fa fa-database"> </i>
                        User
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.login') }}" class="nav-link">
                        <i class="nav-link-icon fa fa-database"> </i>
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
