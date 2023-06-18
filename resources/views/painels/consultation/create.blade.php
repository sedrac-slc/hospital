@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-plus"></i>
        <span>Adicionar\Consulta</span>
    </h5>
@endsection
@section('painel-body')
    @include('components.form.consultation', [
        'route' => route('consultation.store'),
        'method' => 'POST',
        'button_desc' => 'adicionar',
    ])
@endsection
@section('script')
    @php
        $existPatient = isset($patient->id);
        $existEmployee = isset($employee->id);
        $existConsulationType = isset($consultation_type->id);
    @endphp

    <script>
        function alerta(){
            return `<div class="alert alert-warning alert-dismissible fade show" role="alert" style="position:relative;">
                    Nenhum registo encontrado, tenta de novo
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close" style="float:rigth;">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>`;
        }
    </script>

    @if (!$existPatient)
        <script>
            const inpPatient = document.querySelector('#patientInpt');
            const btnPatient = document.querySelector('#patientBtn');
            const panelPatient = document.querySelector('#patientPainel');

            function creteTablePatient(html) {
                return `<table class="table">
                        <thead>
                            <tr>
                            <th>  <span>#</span> </th>
                            <th> <i class="fas fa-signature"></i>  <span>Nome</span> </th>
                            <th> <i class="fas fa-at"></i> <span>Email</span> </th>
                            <th> <i class="fas fa-phone"></i> <span>Telefone</span> </th>
                            <th> <i class="fas fa-venus-mars"></i> <span>Gênero</span> </th>
                            <th> <i class="fas fa-flag"></i> <span>Nacionalidade</span></th>
                            <th> <i class="fas fa-flag"></i> <span>Naturalidade</span> </th>
                            <th> <i class="fas fa-calendar"></i> <span>Aniversário</span> </th>
                            </tr>
                        </thead>
                        <tbody>${html}</tbody>
                        </table>`;
            }

            btnPatient.addEventListener('click', (e) => {
                fetch(`{{ route('patient.json') }}?name=${inpPatient.value}`)
                    .then((response) => response.json())
                    .then((result) => {
                        let html = "";
                        result.patients.forEach((element,index) => {
                            html +=`<tr>
                                        <td>
                                            <input class="form-input-check" type="radio" name="patient_id" id="patient_id_${index}" value="${element.id}">
                                        </td>
                                        <td>${element.name}</td>
                                        <td>${element.email}</td>
                                        <td>${element.phone}</td>
                                        <td>${element.gender}</td>
                                        <td>${element.naturalness}</td>
                                        <td>${element.nationality}</td>
                                        <td>${element.birthday}</td>
                                    </tr>`;
                        });
                        panelPatient.innerHTML = html != "" ? creteTablePatient(html) : alerta();
                        if(html != "")
                            document.querySelector('#patient_id_def').remove();
                    }).catch((err) => {
                    })
            })
        </script>
    @endif

    @if (!$existEmployee)
        <script>
            const inpEmployee = document.querySelector('#employeeInpt');
            const btnEmployee = document.querySelector('#employeeBtn');
            const panelEmployee = document.querySelector('#employeePainel');

            function creteTableEmployee(html) {
                return `<table class="table">
                        <thead>
                            <tr>
                            <th>  <span>#</span> </th>
                            <th> <i class="fas fa-signature"></i>  <span>Nome</span> </th>
                            <th> <i class="fas fa-at"></i> <span>Email</span> </th>
                            <th> <i class="fas fa-phone"></i> <span>Telefone</span> </th>
                            <th> <i class="fas fa-venus-mars"></i> <span>Gênero</span> </th>
                            <th> <i class="fas fa-flag"></i> <span>Nacionalidade</span></th>
                            <th> <i class="fas fa-flag"></i> <span>Naturalidade</span> </th>
                            <th> <i class="fas fa-calendar"></i> <span>Aniversário</span> </th>
                            </tr>
                        </thead>
                        <tbody>${html}</tbody>
                        </table>`;
            }

            btnEmployee.addEventListener('click', (e) => {
                fetch(`{{ route('employee.json') }}?name=${inpEmployee.value}`)
                    .then((response) => response.json())
                    .then((result) => {
                        let html = "";
                        result.employees.forEach((element,index) => {
                            html +=`<tr>
                                        <td>
                                            <input class="form-input-check" type="radio" name="employee_id" id="employee_id_${index}" value="${element.id}">
                                        </td>
                                        <td>${element.name}</td>
                                        <td>${element.email}</td>
                                        <td>${element.phone}</td>
                                        <td>${element.gender}</td>
                                        <td>${element.naturalness}</td>
                                        <td>${element.nationality}</td>
                                        <td>${element.birthday}</td>
                                    </tr>`;
                        });
                        panelEmployee.innerHTML = html != "" ? creteTableEmployee(html) : alerta();
                        if(html != "")
                            document.querySelector('#employee_id_def').remove();
                    }).catch((err) => {
                    })
            })
        </script>
    @endif

    @if (!$existConsulationType)
        <script>
            const inpConsulationType = document.querySelector('#consultationTypeInpt');
            const btnConsulationType = document.querySelector('#consultationTypeBtn');
            const panelConsulationType = document.querySelector('#consultationTypePainel');

            function creteTableConsulationType(html) {
                return `<table class="table">
                        <thead>
                            <tr>
                            <th>  <span>#</span> </th>
                            <th> <i class="fas fa-signature"></i>  <span>Nome</span> </th>
                            <th> <i class="fas fa-money-bill"></i> <span>Preço</span> </th>
                            </tr>
                        </thead>
                        <tbody>${html}</tbody>
                        </table>`;
            }

            btnConsulationType.addEventListener('click', (e) => {
                fetch(`{{ route('consultation_type.json') }}?name=${inpConsulationType.value}`)
                    .then((response) => response.json())
                    .then((result) => {
                        let html = "";
                        result.consultationTypes.forEach((element,index) => {
                            html +=`<tr>
                                        <td>
                                            <input class="form-input-check" type="radio" name="consultation_type_id" id="consultation_type_id_${index}" value="${element.id}">
                                        </td>
                                        <td>${element.name}</td>
                                        <td>${element.price}</td>
                                    </tr>`;
                        });
                        panelConsulationType.innerHTML = html != "" ? creteTableConsulationType(html) : alerta();
                        if(html != "") document.querySelector('#consultation_type_id_def').remove();
                    }).catch((err) => {
                    })
            })
        </script>
    @endif
@endsection
