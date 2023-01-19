@extends('template.painel')
@section('title','Painel\Funções')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
@endsection
@section('painel-header')
    @if($occupations->total() == 0)
        <a href="{{ route('occupation.index') }}" class="btn btn-info">
            <i class="fas fa-circle-notch"></i>
            <span>recarregar</span>
        </a>
    @endif
    <a href="{{ route('occupation.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span>adicionar</span>
    </a>
@endsection
@section('painel-body')
    @include('components.table.occupation')
    @include('components.modal.delete')
@endsection
@section('script')
    @parent
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
