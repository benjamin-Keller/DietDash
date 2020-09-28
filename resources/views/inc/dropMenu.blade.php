<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle color-white a-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <div class="text-center w-100">
                    <a href="{{ route('profile.index') }}">
                        <div>
                            <img class="img-fluid img-bordered-sm inverted" style="overflow:hidden; height:100px; width:100px; border-radius:50%;"
                                 @if(Auth::user()->profile_picture == null)
                                 src="{{ asset('img/logo.png') }}"
                                 @else
                                 src="{{ Auth::user()->profile_picture }}"
                                 @endif oncontextmenu="return false" ondragstart="return false">
                        </div>

                        <div class="dropdown-item">{{ __('Profile') }}</div>
                    </a>
                </div>
                <a class="dropdown-item">
                    <div class="custom-control custom-switch" >
                        <input type="checkbox" class="custom-control-input" id="darkmode-Switch"
                               onclick="document.documentElement.classList.toggle('dark-mode');
                                            document.querySelectorAll('.inverted').forEach((result) => result.classList.toggle('invert'));
                                            document.querySelectorAll('.pagination').forEach((result) => result.classList.toggle('pagination_invert'));">
                        <label class="custom-control-label" for="darkmode-Switch">Darkmode</label>
                    </div>
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <li class="nav-item" >
            <a class="nav-link link-purple inverted" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-question-circle"></i></a>
        </li>
    </ul>
</nav>
