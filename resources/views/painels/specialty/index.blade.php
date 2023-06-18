@extends('template.painel')
@section('title', 'Painel\Médico\Especializações')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
@endsection
@section('painel-header')
    @isset($employee)
        <a class="btn btn-warning mt-1" href="{{ route('employee.index') }}">
            <i class="fas fa-user-md"></i>
            <span>Médicos</span>
        </a>
    @endisset
    <a href="{{ route('specialty.index') }}" class="btn btn-info">
        <i class="fas fa-circle-notch"></i>
        <span>recarregar</span>
    </a>
    <a href="{{ route('specialty.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span>adicionar</span>
    </a>
@endsection
@section('painel-body')
    @isset($employee)
        <div class="border rounded m-2 p-2">
            <span>
                <span>Médico(a):</span>
                <span>{{ $employee->user->name }}</span>
            </span>
        </div>
    @endisset
    @isset($specialtiesOfEmployee)
        <form action="{{ route('employee.specialty.action') }}" method="POST">
            @csrf
            <input type="hidden" name="employee" value="{{ $employee->id }}">
    @endisset
        @include('components.table.specialty')
    @isset($specialtiesOfEmployee)
        </form>
    @endisset
    @include('components.modal.delete')
@endsection
@section('script')
    @parent
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
