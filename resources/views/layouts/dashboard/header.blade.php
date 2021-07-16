<?php $system = \App\Models\System::first(); ?>
<div class="horizontal-menu">
    <nav class="navbar top-navbar">
        <div class="container">
            <div class="navbar-content">
                <a href="{{ route('dashboard.index') }}" class="navbar-brand">
                    <b style="text-transform: lowercase;">{{ strtok($system->c_name, " ") }}</b><span>APP</span>
                </a>
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown nav-notifications">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell"></i>
                            <div class="indicator">
                                <div class="circle"></div>
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">Notifications</p>
                                <a href="javascript:;" class="text-muted">Clear all</a>
                            </div>
                            <div class="dropdown-body">
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="alert-circle"></i>
                                    </div>
                                    <div class="content">
                                        <p>New notification.</p>
                                        <p class="sub-text text-muted">1 hrs ago</p>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="#">Clear all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-profile">
                        <a class="nav-link dropdown-toggle" href="dashboard-one.html#" id="profileDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('prof.jpg')}}" alt="profile">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <img src="{{asset('prof.jpg')}}" alt="logo">
                                </div>
                                <div class="info text-center">
                                    <p class="name font-weight-bold mb-0">
                                        {{auth()->user()->fname ." ". auth()->user()->lname}}
                                    </p>
                                    <p class="email text-muted mb-3">{{auth()->user()->email}}</p>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <ul class="profile-nav p-0 pt-3">
                                    <li class="nav-item">
                                        <a href="{{ route('account') }}" class="nav-link">
                                            <i data-feather="edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>
                                    @if(auth()->user()->hasRole('admin'))
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.sms') }}" class="nav-link">
                                            <i data-feather="message-square"></i>
                                            <span>Sms</span>
                                        </a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" class="nav-link" style="color:red;"
                                            onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">
                                            <i data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="horizontal-menu-toggle">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admins.blogs') }}">
                        <i class="link-icon" data-feather="pocket"></i>
                        <span class="menu-title">Blogs</span></a>
                    </a>
                </li>
                @if(auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.categories') }}">
                        <i class="link-icon" data-feather="arrow-up-right"></i>
                        <span class="menu-title">Categories</span></a>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.users') }}" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="menu-title">Profiles</span></a>
                </li>
                @endif               
            </ul>
        </div>
    </nav>
</div>