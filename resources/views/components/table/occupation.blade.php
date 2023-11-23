@extends('template.components.table',[
    'list' => $occupations
])
@section('thead')
    @if($active == "employee")
        <th>
            <span>#</span>
        </th>
    @endif
    <th>
        <i class="fas fa-signature"></i>
        <span>Nome</span>
    </th>
    <th>
        <i class="fas fa-comment"></i>
        <span>Descrição</span>
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
    @foreach ($occupations as $occupation)
        <tr>
            @if($active == "employee")
            <td class="text-center">
                <button class="btn btn-primary btn-circle btn-sm text-white" name="x_occupation"
                 value="{{ $occupation->id }}">
                    <i class="fas fa-check"></i>
                </button>
            </td>
            @endif
            <td>{{ $occupation->position }}</td>
            <td>{{ $occupation->description }}</td>
            <td>
                <a class="text-primary" href="{{ route('employee.create') }}?occupation={{ $occupation->id }}">
                    <i class="fas fa-plus"></i>
                    <span>adicionar</span>
                </a>
            </td>
            <td>
                <a class="text-success" href="{{ route('employee.index') }}?occupation={{ $occupation->id }}">
                    <i class="fas fa-list"></i>
                    <span>listar</span>
                    <sup class="badge bg-secondary text-white">{{ count($occupation->employees) }}</sup>
                </a>
            </td>
            <td>
                <a class="text-info" href="{{ route('occupation.show',$occupation->id) }}">
                    <i class="fas fa-eye"></i>
                    <span>visualizar</span>
                </a>
            </td>
            <td>
                <a class="text-warning" href="{{ route('occupation.edit',$occupation->id) }}">
                    <i class="fas fa-edit"></i>
                    <span>editar</span>
                </a>
            </td>
            <td>
                <a class="text-danger btn-delete" href="#"  data-toggle="modal" data-target="#deleteModal"
                    data-url="{{ route('occupation.destroy',$occupation->id) }}">
                    <i class="fas fa-trash"></i>
                    <span>eliminar</span>
                </a>
            </td>
        </tr>
    @endforeach
@endsection
