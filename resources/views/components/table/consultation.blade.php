@extends('template.components.table',[
    'list' => $consultations
])
@section('thead')
    <th>
        <i class="fas fa-user"></i>
        <span>Paciente</span>
    </th>
    <th>
        <i class="fas fa-user-md"></i>
        <span>Médico</span>
    </th>
    <th>
        <i class="fas fa-syringe"></i>
        <span>Tipo Consulta</span>
    </th>
    <th>
        <i class="fas fa-money-bill"></i>
        <span>Preço</span>
    </th>
    <th colspan="3">
        <i class="fas fa-tools"></i>
       <span>Acções</span>
    </th>
@endsection
@section('tbody')
    @foreach ($consultations as $consultation)
        <tr>
            <td>{{ $consultation->patient->user->name }}</td>
            <td>{{ $consultation->employee->user->name }}</td>
            <td>{{ $consultation->consultation_type->name }}</td>
            <td>{{ $consultation->price }}</td>
            <td>
                <a class="text-info" href="{{ route('consultation.show',$consultation->id) }}">
                    <i class="fas fa-eye"></i>
                    <span>visualizar</span>
                </a>
            </td>
            <td>
                <a class="text-warning" href="{{ route('consultation.edit',$consultation->id) }}">
                    <i class="fas fa-edit"></i>
                    <span>editar</span>
                </a>
            </td>
            <td>
                <a class="text-danger btn-delete" href="#"  data-toggle="modal" data-target="#deleteModal"
                    data-url="{{ route('consultation.destroy',$consultation->id) }}">
                    <i class="fas fa-trash"></i>
                    <span>eliminar</span>
                </a>
            </td>
        </tr>
    @endforeach
@endsection
