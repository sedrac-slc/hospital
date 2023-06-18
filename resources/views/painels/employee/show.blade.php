@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-eye"></i>
        <span>Visualização</span>
    </h5>
    <a href="{{ url()->previous() }}" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i>
        <span>voltar</span>
    </a>
@endsection
@section('painel-body')
    @include('components.form.user',[
        'url' =>  '#',
        'user' => $employee->user,
        'method' => 'PUT',
        'action' => 'edit',
        'employee' => "employee",
        'btn_desc' => "Editar",
        'disable_pass' => true,
        'method' => 'PUT',
        'disabled' => true,
        'button_desc' => 'salvar'
    ])
@endsection
