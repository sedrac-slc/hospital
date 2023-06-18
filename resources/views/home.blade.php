@extends('template.backoffice')
@section('backoffice-content')
    <div class="card shadow mb-4">
        <a href="#collapseCardExample" class="d-block card-header py-3 bg-primary" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="font-weight-bold text-white m-2">
                <i class="fas fa-info-circle"></i>
                <span>Dados pessoais</span>
            </h6>
        </a>
        <div class="collapse show" id="collapseCardExample" style="">
            <div class="card-body">
                @php $image = Auth::user()->image; @endphp
                @if ($image)
                  <div class="mb-3">
                    <img src="{{ url("storage/{$image}") }}" alt="" srcset="" class="img-thumbnail" width="150" height="150">
                  </div>
                @endif
                <a class="btn btn-warning mb-3" href="#" data-toggle="modal" data-target="#imageModal">
                    <i class="fas fa-user"></i>
                    <span>Foto de perfil</span>
                </a>
                @include('components.form.user', [
                    'url' => '#',
                    'user' => Auth::user(),
                    'method' => 'PUT',
                    'action' => 'edit',
                    'btn_desc' => 'Editar',
                    'disable_pass' => true,
                    'method' => 'PUT',
                    'disabled' => true,
                    'form_not' => true,
                    'button_desc' => 'salvar',
                ])
            </div>
        </div>
    </div>
    @include('components.modal.image', [
        'user_id' => Auth::user()->id,
    ])
@endsection
