@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-plus"></i>
        <span>Adicionar\Tipo-Consulta</span>
    </h5>
@endsection
@section('painel-body')
    @include('components.form.consultation_type',[
        'route' =>  route('consultation_type.store'),
        'method' => 'POST',
        'button_desc' => 'adicionar'
    ])
@endsection
