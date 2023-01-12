@extends('template.doc')
@section('css')
    <style>
        .bg-doctor {
            box-sizing: border-box;
            height: 95%;
        }

        .img-doctor {
            background: url('{{ asset('img/bg-header.png') }}') no-repeat;
            width: 100%;
            background-position: center;
            background-size: cover;
            min-height: 300px;
        }

        .jumbotron {
            position: relative;
            box-sizing: border-box;
        }

        .text-indent-25{
            text-indent: 50px;
        }

        .text-black {
            color: black;
        }
    </style>
@endsection
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand text-white" href="#">Hospiweb</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-home"></i>
                        <span>Página inicial</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="fas fa-phone"></i>
                        <span>Contactos</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        <span>Opções</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Procurar</button>
            </form>
        </div>
    </nav>
    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron bg-gradient-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="display-4 font-weight-bolder text-white">Bem vindo!</h1>
                        <p class="text-justify font-weight-bolder text-white">
                            Caro cliente, seja bem vindo ao website hostiweb, onde poderás encontra serviços relacionado
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="m-1">
                                    <a class="btn btn-light btn-lg w-100" href="{{ route('login') }}" role="button">
                                        <i class="fas fa-user-shield text-primary"></i>
                                        <span>Autenticação</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="m-1">
                                    <a class="btn btn-light btn-lg w-100" href="{{ route('register') }}" role="button">
                                        <i class="fas fa-file-alt text-primary"></i>
                                        <span>Cadastramento</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center img-doctor"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <div class="border-left-primary rounded p-1 m-1 pl-2">
                        <h2>
                            <i class="fas fa-file-medical"></i>
                            <span>Marcação</span>
                        </h2>
                        <p class="text-justify">
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                            tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada
                            magna mollis euismod. Donec sed odio dui.
                        </p>
                        <p><a class="btn btn-secondary mt-1" href="#" role="button">View details »</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-left-primary rounded p-1 m-1 pl-2">
                        <h2>
                            <i class="fas fa-user-edit"></i>
                            <span>Análise</span>
                        </h2>
                        <p class="text-justify">
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                            tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada
                            magna mollis euismod. Donec sed odio dui.
                        </p>
                        <p><a class="btn btn-secondary mt-1" href="#" role="button">View details »</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-left-primary rounded p-1 m-1 pl-2">
                        <h2>
                            <i class="fas fa-briefcase-medical"></i>
                            <span>Tratamento</span>
                        </h2>
                        <p class="text-justify">
                            Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum
                            id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                            condimentum nibh, ut fermentum massa justo sit amet risus.
                        </p>
                        <p><a class="btn btn-secondary mt-1" href="#" role="button">View details »</a></p>
                    </div>
                </div>
            </div>



        </div> <!-- /container -->

    </main>

    <!-- /footer-->
<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="mt-5">
    <footer class="text-white text-center text-lg-start bg-gradient-primary">
      <!-- Grid container -->
      <div class="container p-4">
        <!--Grid row-->
        <div class="row mt-4">
          <!--Grid column-->
          <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">Sobre a companhia!</h5>

            <p class="text-justify text-indent-25">
              A companhia presta serviços ligado a área de saúde, o nosso objectivo é fornecer os nossos serviços de
              forma simples e fácil com preços justo e disponibilidade de atendimento a qualquer momento.
            </p>

            <div class="mt-4">
              <!-- Facebook -->
              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
              <!-- Dribbble -->
              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-dribbble"></i></a>
              <!-- Twitter -->
              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
              <!-- Google + -->
              <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google-plus-g"></i></a>
              <!-- Linkedin -->
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4 pb-1">
                Deixar o seu email?
            </h5>

            <div class="form-outline form-white mb-4">
              <input type="text" id="formControlLg" class="form-control form-control-lg" />
              <label class="form-label" for="formControlLg">
                Enviar
              </label>
            </div>

            <ul class="fa-ul" style="margin-left: 1.65em;">
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Warsaw, 00-967, Poland</span>
              </li>
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">contact@example.com</span>
              </li>
              <li class="mb-3">
                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 48 234 567 88</span>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-4">Horas de serviços?</h5>

            <table class="table text-center text-white">
              <tbody class="fw-normal">
                <tr>
                  <td>Segunda - Terça:</td>
                  <td>8am - 5pm</td>
                </tr>
                <tr>
                  <td>Quarta - Sexta:</td>
                  <td>8am - 6am</td>
                </tr>
                <tr>
                  <td>Domingo:</td>
                  <td>8am - 4pm</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">www.hospiweb.com</a>
      </div>
      <!-- Copyright -->
    </footer>

  </div>
@endsection
