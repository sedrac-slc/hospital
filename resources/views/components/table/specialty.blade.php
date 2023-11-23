@extends('template.components.table', [
    'list' => $specialties,
])
@section('css')
    @parent
    <style>
        .td-c{
            margin: auto;
        }
    </style>
@endsection
@section('thead')
    @isset($specialtiesOfEmployee)
        <th>
            <span>#</span>
        </th>
    @endisset
    <th>
        <i class="fas fa-signature"></i>
        <span>Nome</span>
    </th>
    <th colspan="2">
        <i class="fas fa-user-md"></i>
       <span>Médicos</span>
    </th>
    <th colspan="3">
        <i class="fas fa-tools"></i>
        <span>Acções</span>
    </th>
@endsection
@section('tbody')
    @foreach ($specialties as $specialty)
        <tr>
            @isset($specialtiesOfEmployee)
                <td class="text-center">
                    @if ($specialtiesOfEmployee->contains($specialty->id))
                        <button class="btn btn-danger btn-circle btn-sm text-white td-c" name="x_specialty_del"
                            value="{{ $specialty->id }}" title="eliminar especialidade">
                            <i class="fas fa-times"></i>
                        </button>
                    @else
                        <button class="btn btn-primary btn-circle btn-sm text-white td-c" name="x_specialty_add"
                            value="{{ $specialty->id }}" title="adicionar especialidade">
                            <i class="fas fa-plus"></i>
                        </button>
                    @endif
                </td>
            @endisset
            <td>{{ $specialty->name }}</td>
            <td>
                <a class="text-primary" href="{{ route('employee.index') }}?specialty={{ $specialty->id }}&action=add">
                    <i class="fas fa-plus"></i>
                    <span>adicionar</span>
                </a>
            </td>
            <td>
                <a class="text-success" href="{{ route('employee.index') }}?specialty={{ $specialty->id }}">
                    <i class="fas fa-list"></i>
                    <span>listar</span>
                    <sup class="badge bg-secondary text-white">{{ count($specialty->employees) }}</sup>
                </a>
            </td>
            <td>
                <a class="text-info" href="{{ route('specialty.show', $specialty->id) }}">
                    <i class="fas fa-eye"></i>
                    <span>visualizar</span>
                </a>
            </td>
            <td>
                <a class="text-warning" href="{{ route('specialty.edit', $specialty->id) }}">
                    <i class="fas fa-edit"></i>
                    <span>editar</span>
                </a>
            </td>
            <td>
                <a class="text-danger btn-delete" href="#" data-toggle="modal" data-target="#deleteModal"
                    data-url="{{ route('specialty.destroy', $specialty->id) }}">
                    <i class="fas fa-trash"></i>
                    <span>eliminar</span>
                </a>
            </td>
        </tr>
    @endforeach
@endsection
