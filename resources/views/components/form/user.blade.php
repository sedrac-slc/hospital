@if (!isset($form_not))
<form class="user mb-2" action="{{ $url }}" method="POST">
@endif
    @csrf
    @isset($method)
        @method($method)
    @endisset
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="exampleName">
                <i class="fas fa-signature"></i>
                <span>Nome:</span>
            </label>
            <input type="text" class="form-control form-control-user" id="exampleName" placeholder="Nome completo"
                name="name" value="{{ $user->name ?? old('name') }}" required
                @isset($disabled) disabled @endisset>
        </div>
        <div class="col-sm-6">
            <label for="exampleEmail">
                <i class="fas fa-at"></i>
                <span>Email:</span>
            </label>
            <input type="email" class="form-control form-control-user" id="exampleEmail" placeholder="Email"
                name="email" value="{{ $user->email ?? old('email') }}" required
                @isset($disabled) disabled @endisset>
        </div>
    </div>
    <div class="form-group row @isset($disable_pass) d-none @endisset" id="group-pass">
        @php $existUser = isset($employee) || isset($patient); @endphp
        @if($existUser)
            <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="exampleSenhaNow">
                    <i class="fas fa-user"></i>
                    <span>Senha actual:</span>
                </label>
                <input type="password" class="form-control form-control-user input-pass" id="exampleSenhaNow"
                    placeholder="Palavra-passe actual" name="pass_now" value="{{ old('pass_now') }}" required
                    @isset($disable_pass) disabled @endisset>
            </div>
        @endif
        <div class="@if($existUser) col-sm-4 @else col-sm-6  mb-3 mb-sm-0 @endif">
            <label for="exampleSenha">
                <i class="fas fa-user-secret"></i>
                <span>Senha:</span>
            </label>
            <input type="password" class="form-control form-control-user input-pass" id="exampleSenha"
                placeholder="Palavra-passe" name="password" value="{{ old('password') }}" required
                @isset($disable_pass) disabled @endisset>
        </div>
        <div class="@if($existUser) col-sm-4 @else col-sm-6 @endif">
            <label for="exampleConfirme">
                <i class="fas fa-key"></i>
                <span>Confirma(senha):</span>
            </label>
            <input type="password" class="form-control form-control-user input-pass" id="exampleConfirme"
                placeholder="Confirma palavra-passe" name="confirm_password" value="{{ old('confirm_password') }}"
                required @isset($disable_pass) disabled @endisset>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="exampleCalendar">
                <i class="fas fa-calendar"></i>
                <span>Data nascimento:</span>
            </label>
            <input type="date" class="form-control form-control-user" id="exampleCalendar"
                placeholder="Data nascimento" name="birthday" value="{{ $user->birthday ?? old('birthday') }}" required
                @isset($disabled) disabled @endisset>
        </div>
        <div class="col-sm-6">
            <label for="examplePhone">
                <i class="fas fa-phone"></i>
                <span>Contacto:</span>
            </label>
            <input type="text" class="form-control form-control-user" id="examplePhone" placeholder="Contacto"
                name="phone" value="{{ $user->phone ?? old('phone') }}" required
                @isset($disabled) disabled @endisset>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFirstName">
            <i class="fas fa-signature"></i>
            <span>Nome:</span>
        </label>
        <select class="form-control text-dark" id="exampleInputGender" name="gender" required
            @isset($disabled) disabled @endisset>
            <option value="MALE" @if (($user->gender ?? old('gender')) == 'MALE') selected @endif>Masculino
            </option>
            <option value="FEMALE" @if (($user->gender ?? old('gender')) == 'FEMALE') selected @endif>Femenino
            </option>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="exampleNaturalness">
                <i class="fas fa-flag"></i>
                <span>Nacionalidade:</span>
            </label>
            <input type="text" class="form-control form-control-user" id="exampleNaturalness"
                placeholder="Nacionalidade" name="naturalness" value="{{ $user->naturalness ?? old('naturalness') }}"
                @isset($disabled) disabled @endisset required>
        </div>
        <div class="col-sm-6">
            <label for="exampleNationality">
                <i class="fas fa-flag"></i>
                <span>Naturalidade:</span>
            </label>
            <input type="text" class="form-control form-control-user" id="exampleNationality"
                placeholder="Naturalidade" name="nationality" value="{{ $user->nationality ?? old('nationality') }}"
                required @isset($disabled) disabled @endisset>
        </div>
    </div>
    @if (!isset($disabled))
        <button type="submit" class="btn btn-primary btn-user">
            <i class="fas fa-plus"></i>
            <span>{{ $btn_desc ?? 'Cadastra' }}</span>
        </button>
    @endif
    @if (!isset($form_not))
</form>
@endif
