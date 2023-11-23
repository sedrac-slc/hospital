@extends('template.painel')
@section('painel-header')
    <a class="btn btn-user btn-info" href="{{ url()->previous() }}">
        <i class="fas fa-arrow-left"></i>
        <span>voltar</span>
    </a>
    @isset($occupation->position)
        <h4 class="mt-2">
            <i class="fas fa-user-tie"></i>
            <span>Ocupação:</span>
            <span>{{ $occupation->position }}</span>
        </h4>
    @endisset
@endsection
@section('painel-body')
    @include('components.form.user')
@endsection
