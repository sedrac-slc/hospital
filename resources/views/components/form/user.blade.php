<form class="user" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                placeholder="Nome completo" name="name" value="{{ old('name') }}">
        </div>
        <div class="col-sm-6">
            <input type="email" class="form-control form-control-user" id="exampleLastName"
                placeholder="Email" name="email" value="{{ old('email') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user" id="exampleFirstName"
                placeholder="Palavra-passe" name="password" value="{{ old('password') }}">
        </div>
        <div class="col-sm-6">
            <input type="password" class="form-control form-control-user" id="exampleLastName"
                placeholder="Confirma palavra-passe" name="confirm_password"
                value="{{ old('confirm_password') }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="date" class="form-control form-control-user"
                id="exampleInputPassword" placeholder="Data nascimento" name="birthday"
                value="{{ old('birthday') }}">
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user"
                id="exampleRepeatPassword" placeholder="Contacto" name="phone"
                value="{{ old('phone') }}">
        </div>
    </div>
    <div class="form-group">
        <select class="form-control text-dark" id="exampleInputGender" name="gender">
            <option value="MALE" @if (old('gender') == 'MALE') selected @endif>Masculino
            </option>
            <option value="FEMALE" @if (old('gender') == 'FEMALE') selected @endif>Femenino
            </option>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="exampleNaturalness"
                placeholder="Nacionalidade" name="naturalness" value="{{ old('naturalness') }}">
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user"
                id="exampleLastNationality" placeholder="Naturalidade" name="nationality"
                value="{{ old('nationality') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user">
        Cadastra
    </button>
</form>
