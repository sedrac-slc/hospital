@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-edit"></i>
        <span>Actualização\Tipo-Consulta</span>
    </h5>
@endsection
@section('painel-body')
    @include('components.form.consultation_type',[
        'route' =>  route('consultation_type.update',$consultation_types->id),
        'method' => 'PUT',
        'button_desc' => 'salvar'
    ])
@endsection
