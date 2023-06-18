@extends('template.painel')
@section('painel-header')
    <a class="btn btn-user btn-info" href="{{ url()->previous() }}">
        <i class="fas fa-arrow-left"></i>
        <span>voltar</span>
    </a>
@endsection
@section('painel-body')
    @include('components.form.user')
@endsection
