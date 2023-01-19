@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-eye"></i>
        <span>Visualização\Especialização</span>
    </h5>
@endsection
@section('painel-body')
    @include('components.form.specialty',[
        'route' =>  '#',
        'method' => '',
        'type_button' => 'hidden',
        'disabled' => true
    ])
@endsection
