@extends('template.painel')
@section('painel-header')
    <h5 class="text-primary font-weight-bold">
        <i class="fas fa-edit"></i>
        <span>Actualização</span>
    </h5>
@endsection
@section('painel-body')
    <div>
        <a href="{{ route('employee.create') }}?emp={{ $employee->id }}" class="btn btn-warning mb-2">
            <i class="fas fa-edit"></i>
            <span>Ocupação</span>
        </a>
        <div class="form-group">
            <input type="checkbox" name="pass_alt" id="pass_alt" class="form-input-check">
            <label for="pass_alt" class="form-label">Alterar a palavra passe.</label>
        </div>
    </div>
    @include('components.form.user',[
        'url' =>  route('employee.update',$employee->id),
        'user' => $employee->user,
        'method' => 'PUT',
        'action' => 'edit',
        'employee' => "employee",
        'btn_desc' => "Editar",
        'disable_pass' => true,
        'method' => 'PUT',
        'button_desc' => 'salvar'
    ])
@endsection
@section('script')
    @parent
    <script>
        const checkPass = document.querySelector('#pass_alt');
        const groupPass = document.querySelector('#group-pass');
        const inputPass = document.querySelectorAll('.input-pass');

        checkPass.addEventListener('change',(e) =>{
            if(checkPass.checked){
                if(groupPass.classList.contains('d-none')){
                    groupPass.classList.remove('d-none');
                    inputPass.forEach(element => {
                        if(element.hasAttribute('disabled'))
                            element.removeAttribute('disabled');
                    });
                }
            }else{
                if(!groupPass.classList.contains('d-none')){
                    groupPass.classList.add('d-none');
                    inputPass.forEach(element => {
                        if(!element.hasAttribute('disabled'))
                            element.setAttribute('disabled','');
                    });
                }
            }
        })
    </script>
@endsection
