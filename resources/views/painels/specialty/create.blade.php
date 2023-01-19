@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-plus"></i>
        <span>Adicionar\Especialização</span>
    </h5>
@endsection
@section('painel-body')
    @include('components.form.specialty',[
        'route' =>  route('specialty.store'),
        'method' => 'POST',
        'button_desc' => 'adicionar'
    ])
@endsection
