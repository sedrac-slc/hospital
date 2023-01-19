@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-edit"></i>
        <span>Actualização\Especialização</span>
    </h5>
@endsection
@section('painel-body')
    @include('components.form.specialty',[
        'route' =>  route('specialty.update',$specialties->id),
        'method' => 'PUT',
        'button_desc' => 'salvar'
    ])
@endsection
