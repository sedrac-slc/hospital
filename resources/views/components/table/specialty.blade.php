@extends('template.components.table',[
    'list' => $specialties
])
@section('thead')
    <th>
        <i class="fas fa-signature"></i>
        <span>Nome</span>
    </th>
    <th colspan="3">
        <i class="fas fa-tools"></i>
       <span>Acções</span>
    </th>
@endsection
@section('tbody')
    @foreach ($specialties as $specialty)
        <tr>
            <td>{{ $specialty->name }}</td>
            <td>
                <a class="text-info" href="{{ route('specialty.show',$specialty->id) }}">
                    <i class="fas fa-eye"></i>
                    <span>visualizar</span>
                </a>
            </td>
            <td>
                <a class="text-warning" href="{{ route('specialty.edit',$specialty->id) }}">
                    <i class="fas fa-edit"></i>
                    <span>editar</span>
                </a>
            </td>
            <td>
                <a class="text-danger btn-delete" href="#"  data-toggle="modal" data-target="#deleteModal"
                    data-url="{{ route('specialty.destroy',$specialty->id) }}">
                    <i class="fas fa-trash"></i>
                    <span>eliminar</span>
                </a>
            </td>
        </tr>
    @endforeach
@endsection
