@php
    $existPatient = isset($patient->id) && (!isset($consultation));
    $existEmployee = isset($employee->id) && (!isset($consultation));
    $existConsulationType = isset($consultation_type->id) && (!isset($consultation));
@endphp
<form class="user" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div hidden>
        <input type="hidden" name="patient_id" id="patient_id_def"
            @if (isset($patient->id)) value="{{ $patient->id }}" @endif />
        <input type="hidden" name="employee_id" id="employee_id_def"
            @if (isset($employee->id)) value="{{ $employee->id }}" @endif />
        <input type="hidden" name="consultation_type_id" id="consultation_type_id_def"
            @if (isset($consultation_type->id)) value="{{ $consultation_type->id }}" @endif />
    </div>
    <div class="form-group">
        <label for="patientInpt" class="form-label">
            <i class="fas fa-user"></i>
            <span>Paciente:</span>
            <span class="text-danger">*</span>
        </label>
        @if (!$existPatient)
            <div class="input-group">
        @endif
        <input type="text" class="form-control rounded" id="patientInpt" aria-describedby="emailHelp" required
            @isset($disabled) disabled @endisset
            @if (isset($patient->id)) value="{{ $patient->user->name }}"
            @else
                placeholder="Digita o nome do paciente" @endif>
        @if (!$existPatient)
            <button class="btn btn-primary" id="patientBtn" type="button">
                <i class="fas fa-search"></i>
            </button>
    <div id="patientPainel" class="table-responsive"></div>
    </div>
    @endif
    </div>
    <hr class="bg-primary">
    <div class="form-group">
        <label for="employeeInpt" class="form-label">
            <i class="fas fa-user-md"></i>
            <span>Médico:</span>
            <span class="text-danger">*</span>
        </label>
        @if (!$existEmployee)
            <div class="input-group">
        @endif
        <input type="text" class="form-control rounded" id="employeeInpt" aria-describedby="emailHelp" required
            @isset($disabled) disabled @endisset
            @if (isset($employee->id)) value="{{ $employee->user->name }}"
            @else
                placeholder="Digita o nome do médico" @endif>
        @if (!$existEmployee)
            <button class="btn btn-primary" id="employeeBtn" type="button">
                <i class="fas fa-search"></i>
            </button>
            <div id="employeePainel" class="table-responsive"></div>
    </div>
    @endif
    </div>
    <hr class="bg-primary">
    <div class="form-group">
        <label for="consultationTypeInpt" class="form-label">
            <i class="fas fa-syringe"></i>
            <span>Tipo de consulta:</span>
            <span class="text-danger">*</span>
        </label>
        @if (!$existConsulationType)
            <div class="input-group">
        @endif
        <input type="text" class="form-control rounded" id="consultationTypeInpt" aria-describedby="emailHelp"
            required @isset($disabled) disabled @endisset
            @if (isset($consultation_type->id)) value="{{ $consultation_type->name }}"
            @else
                placeholder="Digita o tipo de consulta" @endif>
        @if (!$existConsulationType)
            <button class="btn btn-primary" id="consultationTypeBtn" type="button">
                <i class="fas fa-search"></i>
            </button>
            <div id="consultationTypePainel" class="table-responsive"></div>
    </div>
    @endif
    </div>

    <div class="row">
        <div class="col-md-6 form-group">
            <label for="exampleInputPreco" class="form-label">
                <i class="fas fa-money-bill"></i>
                <span>Preço:</span>
                <span class="text-danger">*</span>
            </label>
            <input type="number" class="form-control form-control-user" id="exampleInputPreco"
                aria-describedby="emailHelp" placeholder="Digita o preço" name="price" required
                @isset($disabled) disabled @endisset
                value="{{ $consultation->price ?? old('price') }}">
        </div>
        <div class="col-md-6 form-group">
            <label for="exampleInputPreco" class="form-label">
                <i class="fas fa-money-bill"></i>
                <span>Data marcação:</span>
                <span class="text-danger">*</span>
            </label>
            <input type="datetime" class="form-control form-control-user" id="exampleInputPreco"
                aria-describedby="emailHelp" name="marking_at" required
                @isset($disabled) disabled @endisset value="{{ $consultation->marking_at ?? date('Y-m-d') }}"
                @if(!isset($consultation)) min="{{ date('Y-m-d') }}" @endif>
        </div>
    </div>

    @isset($type_button)
        @if ($type_button != 'view')
            @include('components.form.input_user', ['obj' => $consultation_types])
            <a class="btn btn-lg btn-info btn-user mt-3" href="{{ route('consultation_type.index') }}">
                <i class="fas fa-arrow-left"></i>
                <span>voltar</span>
            </a>
        @endif
    @else
        <div class="mt-2">
            <a class="btn btn-lg btn-info btn-user" href="{{ route('consultation_type.index') }}">
                <i class="fas fa-arrow-left"></i>
                <span>voltar</span>
            </a>
            <button class="btn btn-lg btn-primary btn-user">
                <i class="fas fa-check-circle"></i>
                <span>{{ $button_desc }}</span>
            </button>
        </div>
    @endisset
</form>
