@extends('template.components.table',[
    'list' => $employees
])
@section('thead')
    <th>
        <i class="fas fa-signature"></i>
        <span>Nome</span>
    </th>
    <th>
        <i class="fas fa-at"></i>
        <span>Email</span>
    </th>
    <th>
        <i class="fas fa-phone"></i>
        <span>Telefone</span>
    </th>
    <th>
        <i class="fas fa-venus-mars"></i>
        <span>Gênero</span>
    </th>
    <th>
        <i class="fas fa-flag"></i>
        <span>Nacionalidade</span>
    </th>
    <th>
        <i class="fas fa-flag"></i>
        <span>Naturalidade</span>
    </th>
    <th>
        <i class="fas fa-calendar"></i>
        <span>Aniversário</span>
    </th>
    <th colspan="2">
        <i class="fas fa-users"></i>
        <span>Consultas</span>
    </th>
    <th colspan="2">
        <i class="fas fa-briefcase-medical"></i>
        <span>Especialização</span>
    </th>
    <th colspan="3">
        <i class="fas fa-tools"></i>
       <span>Acções</span>
    </th>
@endsection
@section('tbody')
    @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email  }}</td>
            <td>{{ $employee->phone   }}</td>
            <td>{{ $employee->gender  }}</td>
            <td>{{ $employee->naturalness  }}</td>
            <td>{{ $employee->nationality  }}</td>
            <td>{{ $employee->birthday  }}</td>
            <td>
                <a class="text-primary" href="{{ route('employee.show',$employee->id) }}">
                    <i class="fas fa-plus"></i>
                    <span>adicionar</span>
                </a>
            </td>
            <td>
                <a class="text-success" href="{{ route('employee.edit',$employee->id) }}">
                    <i class="fas fa-list"></i>
                    <span>listar</span>
                </a>
            </td>
            <td>
                <a class="text-primary" href="{{ route('employee.show',$employee->id) }}">
                    <i class="fas fa-plus"></i>
                    <span>adicionar</span>
                </a>
            </td>
            <td>
                <a class="text-success" href="{{ route('employee.edit',$employee->id) }}">
                    <i class="fas fa-list"></i>
                    <span>listar</span>
                </a>
            </td>
            <td>
                <a class="text-info" href="{{ route('employee.show',$employee->id) }}">
                    <i class="fas fa-eye"></i>
                    <span>visualizar</span>
                </a>
            </td>
            <td>
                <a class="text-warning" href="{{ route('employee.edit',$employee->id) }}">
                    <i class="fas fa-edit"></i>
                    <span>editar</span>
                </a>
            </td>
            <td>
                <a class="text-danger btn-delete" href="#"  data-toggle="modal" data-target="#deleteModal"
                    data-url="{{ route('employee.destroy',$employee->id) }}">
                    <i class="fas fa-trash"></i>
                    <span>eliminar</span>
                </a>
            </td>
        </tr>
    @endforeach
@endsection
