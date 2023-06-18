@extends('template.doc')
@section('idb', 'page-top')
@section('css')
    @parent
    <style>
        *::before,
        *::after {
            content: '';
            display: none;
        }
    </style>
@endsection
@section('content')
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hospi<strong class="text-underline">web</strong></div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Pages
            </div>

            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-home"></i>
                    <span>Página inicial</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Control Painel
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Paneis</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item
                                @isset($active) @if ($active == 'occupation') active @endif @endisset"
                            href="{{ route('occupation.index') }}">
                            <i class="fas fa-user-tie"></i>
                            <span>Função</span>
                        </a>
                        <a class="collapse-item
                            @isset($active) @if ($active == 'specialty') active @endif @endisset"
                            href="{{ route('specialty.index') }}">
                            <i class="fas fa-briefcase-medical"></i>
                            <span>Especialização</span>
                        </a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Utilizador</h6>
                        <div class="collapse-divider"></div>
                        <a class="collapse-item
                        @isset($active) @if ($active == 'employee') active @endif @endisset"
                            href="{{ route('employee.index') }}">
                            <i class="fas fa-user-md"></i>
                            <span>Médicos</span>
                        </a>
                        <a class="collapse-item
                        @isset($active) @if ($active == 'patient') active @endif @endisset"
                            href="{{ route('patient.index') }}">
                            <i class="fas fa-users"></i>
                            <span>Pacientes</span>
                        </a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Consulta</h6>
                        <a class="collapse-item
                            @isset($active) @if ($active == 'consultation_type') active @endif @endisset"
                            href="{{ route('consultation_type.index') }}">
                            <i class="fas fa-syringe"></i>
                            <span>tipo</span>
                        </a>
                        <a class="collapse-item
                            @isset($active) @if ($active == 'consultation') active @endif @endisset"
                            href="{{ route('consultation.index') }}">
                            <i class="fas fa-bars"></i>
                            <span>listar</span>
                        </a>

                    </div>
                </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle">
                    <i class="fas fa-arrow-left"></i>
                </button>
            </div>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    @isset($search)
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                            action="{{ url()->current() }}" method="GET">
                            <div class="input-group">
                                <select class="form-group bg-light border-0 small" name="arg" id="">
                                    @foreach ($search->options as $key => $value)
                                        <option value="{{ $key }}"> {{ $value }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control bg-light border-0 small" placeholder="procurar..."
                                    aria-label="Search" aria-describedby="basic-addon2" name="search" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            @isset($search->action)
                                <input type="hidden" name="action" value="{{ $search->action }}">
                            @endisset
                        </form>
                    @endisset

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->name }}
                                </span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <div class="p-1 m-1">
                        @include('components.alert_message')
                        @include('components.erros')
                    </div>

                    @yield('backoffice-content')

                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="exampleModalLabel">
                        <i class="fas fa-info-circle"></i>
                        <span>Confirmação</span>
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <i class="text-white fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-justify">
                        Tens certeza que desejas sair da sua conta, caso confirma esta operação serás obrigado
                        a fazer o processo de autenticação para ter acesso a este painel de control.
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">
                        <i class="fas fa-times-circle"></i>
                        <span>cancelar</span>
                    </button>
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-check-circle"></i>
                        <span>Sim, confirmo</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection
