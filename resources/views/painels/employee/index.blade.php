@extends('template.painel')
@section('title', 'Painel\Médicos')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
@endsection
@section('painel-header')
    @isset($occupation)
        <a href="{{ route('occupation.index') }}" class="btn btn-warning">
            <i class="fas fa-user-tie"></i>
            <span>Função</span>
        </a>
    @endisset
    @isset($specialty)
        <a href="{{ route('specialty.index') }}" class="btn btn-warning">
            <i class="fas fa-briefcase-medical"></i>
            <span>Especialização</span>
        </a>
    @endisset
    <a href="{{ route('employee.index') }}" class="btn btn-info">
        <i class="fas fa-circle-notch"></i>
        <span>recarregar</span>
    </a>
    <a href="{{ route('occupation.index') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span>adicionar</span>
    </a>
@endsection
@section('painel-body')
    @isset($occupation)
        <div class="border rounded m-2 p-2">
            <span>
                <span>Função:</span>
                <span>{{ $occupation->position }}</span>
            </span>
        </div>
    @endisset
    @isset($specialty)
        <div class="border rounded m-2 p-2">
            <span>
                <span>Especialidade:</span>
                <span>{{ $specialty->name }}</span>
            </span>
        </div>
        <form action="{{ route('specialty.employee.action') }}" method="POST">
            @csrf
            <input type="hidden" name="specialty" value="{{ $specialty->id }}">
        @endisset

        @include('components.table.employee')

        @isset($specialty)
        </form>
    @endisset

    @include('components.modal.delete')

@endsection
@section('script')
    @parent
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
