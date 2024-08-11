<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->

    <title>Aplikasi Kehadiran</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('css/mini-event-calendar.min.css') }}">

    <!-- These plugins only need for the run this page -->
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/fileupload.css') }}">

    <!-- Master Stylesheet CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader-area">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Main Page Wrapper **********
    ======================================= -->

    <!-- Choose Layout -->
    <div class="choose-layout-area">
        <div class="setting-trigger-icon" id="settingTrigger">
            <i class="ti-settings"></i>
        </div>
        <div class="choose-layout" id="chooseLayout">
            <div class="quick-setting-tab">
                <div class="widgets-todo-list-area">
                    <h4 class="todo-title">Todo List:</h4>
                    <form id="form-add-todo" class="form-add-todo">
                        <input type="text" id="new-todo-item" class="new-todo-item form-control" name="todo"
                            placeholder="Add New">
                        <input type="submit" id="add-todo-item" class="add-todo-item" value="+">
                    </form>

                    <form id="form-todo-list">
                        <ul id="flaptToDo-list" class="todo-list">
                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="test"><span></span></label>Go to Market
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Meeting with AD
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Check Mail
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Work for Theme
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Create a Plugin
                                <i class="todo-item-delete ti-close"></i></li>

                            <li><label class="ckbox"><input type="checkbox" name="todo-item-done" class="todo-item-done"
                                        value="hello"><span></span></label>Fixed Template Issues
                                <i class="todo-item-delete ti-close"></i></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="flapt-page-wrapper">
        <!-- Sidemenu Area -->
        <div class="flapt-sidemenu-wrapper">
            <!-- Desktop Logo -->
            <div class="flapt-logo">
                <a href="index.html"><img class="desktop-logo" src="{{ asset('image/logo.png') }}" alt="Desktop Logo"> <img
                        class="small-logo" src="{{ asset('image/small-logo.png') }}" alt="Mobile Logo"></a>
            </div>

            <!-- Side Nav -->
            <div class="flapt-sidenav" id="flaptSideNav">
                <!-- Side Menu Area -->
                <div class="side-menu-area">
                    <!-- Sidebar Menu -->
                    <nav>
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="menu-header-title">Dashboard</li>
                            <li class="active"><a href="{{ route('dashboard') }}"><i class='bx bx-user-circle'></i><span>Absensi</span></a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logoutForm').submit();">
                                                        <i class="bx bx-power-off"></i>
                                                        <span>Log Out</span>
                                    </a>
                                {{-- Logout User --}}
                                <form method="POST" action="{{ route('logout') }}" class="logoutForm" id="logoutForm">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="flapt-page-content">
            <!-- Top Header Area -->
            <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo">
                        <a href="index.html"><img src="{{ asset('image/small-logo.png') }}" alt="Mobile Logo"></a>
                    </div>

                    <!-- Triggers -->
                    <div class="flapt-triggers">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class='bx bx-grid-alt'></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class='bx bx-grid-alt'></i>
                        </div>
                    </div>
                </div>

                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class='bx bx-menu-alt-right'></i>
                    </div>

                    <!-- Top Bar Nav -->
                    <ul class="right-side-content d-flex align-items-center">

                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-item"><i class="font-15"
                                aria-hidden="true"></i> {{ Auth::user()->name }}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img src="{{ asset('image/person_1.jpg') }}"
                                    alt=""></button>
                            <div class="dropdown-menu profile dropdown-menu-right">
                                <!-- User Profile Area -->
                                <div class="user-profile-area">
                                    <a href="{{ route('profile.edit') }}" class="dropdown-item"><i class="bx bx-wrench font-15"
                                            aria-hidden="true"></i> Profile Setting</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <!-- Body Content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">

                            {{-- cek if message --}}
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Sukses</strong> Absensi Berhasil
                                </div>
                            @endif

                            <div class="col-12 col-sm-6 col-xl">
                                <!-- Card -->
                                <div class="card box-margin">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <!-- Title -->
                                                <h6 class="text-uppercase font-14">
                                                    TANGGAL & WAKTU
                                                </h6>

                                                <!-- Heading -->
                                                <span class="font-24 text-dark mb-0" id="current-time">
                                                   
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        <!-- / .row -->

                        <div class="row">
                            <!-- Table -->
                            <div class="col-lg-12 col-12 box-margin height-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Add Books</h4>

                                        {{-- Start Form --}}
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label for="judulBuku">Judul Buku</label>
                                                        <input type="text" class="form-control" id="judulBuku" name="judulBuku" value="{{ old('judulBuku') }}"
                                                            placeholder="Masukan Judul Buku">
                                                            @error('judulBuku')
                                                                <label class="error mt-2 text-danger">{{ $message }}</label>
                                                            @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="kategori">Kategori</label>
                                                        <select name="kategori" id="kategori" class="form-control">
                                                            <option>Pilih -</option>
                                                            <option value="pendidikan">Pendidikan</option>
                                                            <option value="novel">Novel</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="deskripsi">Deskripsi</label>
                                                        <input type="text" class="form-control"
                                                            id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" value="{{ old('deskripsi') }}">
                                                            @error('deskripsi')
                                                            <label class="error mt-2 text-danger">{{ $message }}</label>
                                                            @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" class="form-control"
                                                            id="jumlah" name="jumlah" placeholder="Masukan Jumlah" value="{{ old('jumlah') }}">
                                                            @error('jumlah')
                                                            <label class="error mt-2 text-danger">{{ $message }}</label>
                                                            @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="jumlah">Upload File Buku</label>
                                                        <input type="file" name="file_buku[]" id="file_buku" class="custom-input-file"/>
                                                        <label for="file_buku">
                                                            <i class="fa fa-upload"></i>
                                                            <span>Choose a file…</span>
                                                        </label>
                                                        @error('file_buku')
                                                        <label class="error mt-2 text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="jumlah">Upload Cover Buku</label>
                                                        <input type="file" name="cover_buku[]" id="cover_buku" class="custom-input-file"/>
                                                        <label for="cover_buku">
                                                            <i class="fa fa-upload"></i>
                                                            <span>Choose a file…</span>
                                                        </label>
                                                        @error('cover_buku')
                                                        <label class="error mt-2 text-danger">{{ $message }}</label>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- End Form --}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Area -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- Footer Area -->
                                <footer
                                    class="footer-area d-sm-flex justify-content-center align-items-center justify-content-between">
                                    <!-- Copywrite Text -->
                                    <div class="copywrite-text">
                                        <p>Created by @<a href="#">RIGEL</a></p>
                                    </div>
                                    <div class="fotter-icon text-center">
                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="Facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="Twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="Pinterest">
                                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="action-item mr-2" data-bs-toggle="tooltip" title="Instagram">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Plugins Js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bundle.js') }}"></script>

    <!-- Active JS -->
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/scrool-bar.js') }}"></script>
    <script src="{{ asset('js/todo-list.js') }}"></script>
    <!-- DATE TIME -->
    <script src="{{ asset('js/waktu.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>

    <!-- Inject JS -->
    <script src="{{ asset('js/mini-event-calendar.min.js') }}"></script>
    <script src="{{ asset('js/mini-calendar-active.js') }}"></script>
    <script src="{{ asset('js/apexchart.min.js') }}"></script>
    <script src="{{ asset('js/dashboard-active.js') }}"></script>

    <!-- Inject JS -->
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/dropzone-custom.js') }}"></script>
    <script src="{{ asset('js/default-assets/dropzone-and-module.min.js') }}"></script>

</body>

</html>