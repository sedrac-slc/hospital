@extends('template.components.table',[
    'list' => $consultation_types
])
@section('thead')
    <th>
        <i class="fas fa-signature"></i>
        <span>Nome</span>
    </th>
    <th>
        <i class="fas fa-money-bill"></i>
        <span>Preço</span>
    </th>
    <th>
        <i class="fas fa-comment"></i>
        <span>Descrição</span>
    </th>
    <th colspan="2">
        <i class="fas fa-users"></i>
        <span>Consultas</span>
    </th>
    <th colspan="3">
        <i class="fas fa-tools"></i>
       <span>Acções</span>
    </th>
@endsection
@section('tbody')
    @foreach ($consultation_types as $consultation_type)
        <tr>
            <td>{{ $consultation_type->name }}</td>
            <td>{{ $consultation_type->price }}</td>
            <td>{{ $consultation_type->description }}</td>
            <td>
                <a class="text-primary" href="{{ route('consultation.create') }}?consultation_type={{ $consultation_type->id }}">
                    <i class="fas fa-plus"></i>
                    <span>adicionar</span>
                </a>
            </td>
            <td>
                <a class="text-success" href="{{ route('consultation.index') }}?consultation_type={{ $consultation_type->id }}">
                    <i class="fas fa-list"></i>
                    <span>listar</span>
                </a>
            </td>
            <td>
                <a class="text-info" href="{{ route('consultation_type.show',$consultation_type->id) }}">
                    <i class="fas fa-eye"></i>
                    <span>visualizar</span>
                </a>
            </td>
            <td>
                <a class="text-warning" href="{{ route('consultation_type.edit',$consultation_type->id) }}">
                    <i class="fas fa-edit"></i>
                    <span>editar</span>
                </a>
            </td>
            <td>
                <a class="text-danger btn-delete" href="#"  data-toggle="modal" data-target="#deleteModal"
                    data-url="{{ route('consultation_type.destroy',$consultation_type->id) }}">
                    <i class="fas fa-trash"></i>
                    <span>eliminar</span>
                </a>
            </td>
        </tr>
    @endforeach
@endsection
