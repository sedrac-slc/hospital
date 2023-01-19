@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-edit"></i>
        <span>Actualização\Função</span>
    </h5>
@endsection
@section('painel-body')
    @include('components.form.occupation',[
        'route' =>  route('occupation.update',$occupations->id),
        'method' => 'PUT',
        'button_desc' => 'salvar'
    ])
@endsection
