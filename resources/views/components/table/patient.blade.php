@extends('template.components.table', [
    'list' => $patients,
])
@section('thead')
    <th>
        <i class="fas fa-tv"></i>
        <span>foto</span>
    </th>
    @isset($patient_add)
        <th>
            <span>#</span>
        </th>
    @endisset
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
    <th colspan="3">
        <i class="fas fa-tools"></i>
        <span>Acções</span>
    </th>
@endsection
@section('tbody')
    @foreach ($patients as $patient)
        <tr>
            <td>
                <img src="{{ $patient->image && $patient->image != "none" ? url("storage/{$patient->image}") : asset('img/undraw_profile.svg') }}" alt=""
                width="50" height="50">
            </td>
            @isset($patient_add)
                <td>
                    @if ($specialty->existspatient($patient->id))
                        <button class="btn btn-danger btn-circle btn-sm text-white td-c" name="x_patient_del"
                            value="{{ $patient->id }}" title="eliminar especialidade">
                            <i class="fas fa-times"></i>
                        </button>
                    @else
                        <button class="btn btn-primary btn-circle btn-sm text-white td-c" name="x_patient_add"
                            value="{{ $patient->id }}" title="adicionar especialidade">
                            <i class="fas fa-plus"></i>
                        </button>
                    @endif
                </td>
            @endisset
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->phone }}</td>
            <td>{{ $patient->gender }}</td>
            <td>{{ $patient->naturalness }}</td>
            <td>{{ $patient->nationality }}</td>
            <td>{{ $patient->birthday }}</td>
            <td>
                <a class="text-primary" href="{{ route('consultation.create') }}?patient={{ $patient->patient_id }}">
                    <i class="fas fa-plus"></i>
                    <span>adicionar</span>
                </a>
            </td>
            <td>
                <a class="text-success" href="{{ route('consultation.index') }}?patient={{ $patient->patient_id }}">
                    <i class="fas fa-list"></i>
                    <span>listar</span>
                </a>
            </td>
            <td>
                <a class="text-info" href="{{ route('patient.show', $patient->patient_id) }}">
                    <i class="fas fa-eye"></i>
                    <span>visualizar</span>
                </a>
            </td>
            <td>
                <a class="text-warning" href="{{ route('patient.edit', $patient->patient_id) }}">
                    <i class="fas fa-edit"></i>
                    <span>editar</span>
                </a>
            </td>
            <td>
                <a class="text-danger btn-delete" href="#" data-toggle="modal" data-target="#deleteModal"
                    data-url="{{ route('patient.destroy', $patient->patient_id) }}">
                    <i class="fas fa-trash"></i>
                    <span>eliminar</span>
                </a>
            </td>
        </tr>
    @endforeach
@endsection
