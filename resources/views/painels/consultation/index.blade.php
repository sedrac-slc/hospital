@extends('template.painel')
@section('title', 'Painel\Consulta')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
@endsection
@section('painel-header')
    <a href="{{ route('consultation.index') }}" class="btn btn-info">
        <i class="fas fa-syringe"></i>
        <span>consulta(listar)</span>
    </a>
    <a href="{{ route('consultation.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span>adicionar</span>
    </a>
@endsection
@section('painel-body')
    @include('components.table.consultation')
    @include('components.modal.delete')
@endsection
@section('script')
    @parent
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
