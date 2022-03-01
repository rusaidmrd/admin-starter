<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area">
                @yield('page-title')
                {{-- <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul> --}}
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-end">
            <div class="user-profile">
                <img class="avatar user-thumb" src="{{ asset('images/user-avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">Admin <i class="fas fa-angle-down"></i></h4>
                <div class="dropdown-menu" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Message</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
