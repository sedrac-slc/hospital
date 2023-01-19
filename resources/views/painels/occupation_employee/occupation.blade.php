@extends('template.painel')
@section('title', 'Painel\Funções')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
@endsection
@section('painel-header')
    <div class="bg-primary rounded p-2">
        <span class="btn btn-circle btn-sm btn-light mr-2">1</span>
        <a href="{{ route('employee.create') }}" class="btn btn-info btn-sm">
            <i class="fas fa-circle-notch"></i>
            <span>recarregar</span>
        </a>
        <span class="text-white ml-2 font-weight-bold">Escolha a ocupação</span>
    </div>
@endsection
@section('painel-body')
    <form action="{{ route('employee.form.occupation') }}">
        @isset($search->action)
            <input type="hidden" name="action" value="{{ $search->action }}">
        @endisset
        @include('components.table.occupation')
    </form>
    @include('components.modal.delete')
@endsection
@section('script')
    @parent
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
