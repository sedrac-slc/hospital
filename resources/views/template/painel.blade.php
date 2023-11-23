@extends('template.backoffice')
@section('css')
    @parent
    <style>
        .container-fluid{
            background: white;
            padding: 0.5rem;
            margin: 0.5rem;
            width: 98%;
            border-radius: 0.5rem;
            box-shadow: 0.5em 0.5em 0.5em 0.5em #ccc;
        }

        .table.my th{
            gap: 0.2rem;
        }

        .j-c-c{
            justify-content: center;
            align-items: center;
            gap: 0.2rem;
        }

    </style>
@endsection
@section('backoffice-content')
    @parent
    <div class="p-1 m-1">
        @yield('painel-header')
    </div>
    <hr class="bg-primary"/>
    <div class="p-1 m-1">
        @yield('painel-body')
    </div>
@endsection
