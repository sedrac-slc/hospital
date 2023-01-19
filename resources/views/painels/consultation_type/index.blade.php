@extends('template.painel')
@section('title','Painel\Tipo-Consulta')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
@endsection
@section('painel-header')
    @if($consultation_types->total() == 0)
        <a href="{{ route('consultation_type.index') }}" class="btn btn-info">
            <i class="fas fa-circle-notch"></i>
            <span>recarregar</span>
        </a>
    @endif
    <a href="{{ route('consultation_type.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span>adicionar</span>
    </a>
@endsection
@section('painel-body')
    @include('components.table.consultation_type')
    @include('components.modal.delete')
@endsection
@section('script')
    @parent
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
