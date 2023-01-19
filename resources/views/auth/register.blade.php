@extends('template.doc')
@section('clsb', 'bg-gradient-primary')
@section('css')
    <style>
        .bg-register-image {
            background: url('{{ asset('img/register.png') }}') no-repeat;
            background-size: cover;
            background-position: center;
            padding: 5rem;
        }
    </style>
@endsection
@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    {{-- <i class="fas fa-file-alt"></i> --}}
                                    <span>Cadastramento</span>
                                </h1>
                            </div>
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form class="user" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Nome completo" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Email" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Palavra-passe" name="password" value="{{ old('password') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Confirma palavra-passe" name="confirm_password"
                                            value="{{ old('confirm_password') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Data nascimento" name="birthday"
                                            value="{{ old('birthday') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Contacto" name="phone"
                                            value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control text-dark" id="exampleInputGender" name="gender">
                                        <option value="MALE" @if (old('gender') == 'MALE') selected @endif>Masculino
                                        </option>
                                        <option value="FEMALE" @if (old('gender') == 'FEMALE') selected @endif>Femenino
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleNaturalness"
                                            placeholder="Nacionalidade" name="naturalness" value="{{ old('naturalness') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleLastNationality" placeholder="Naturalidade" name="nationality"
                                            value="{{ old('nationality') }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Cadastra
                                </button>
                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/">
                                    <i class="fas fa-home"></i>
                                    <span>Página inicial</span>
                                </a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
