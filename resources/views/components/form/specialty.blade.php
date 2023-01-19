<form class="user" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div class="form-group row">
        <label for="exampleInputName" class="form-label">
            <i class="fas fa-signature"></i>
            <span>Nome:</span>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-user" id="exampleInputName" aria-describedby="emailHelp"
            placeholder="Digita o nome" name="name" required @isset($disabled) disabled @endisset
            value="{{ $specialties->name ?? old('name') }}">
    </div>

    @isset($type_button)
        @if ($type_button != 'view')
            @include('components.form.input_user', ['obj' => $specialties])
            <a class="btn btn-lg btn-user btn-info mt-3" href="{{ route('specialty.index') }}">
                <i class="fas fa-arrow-left"></i>
                <span>voltar</span>
            </a>
        @endif
    @else
        <div class="mt-2">
            <a class="btn btn-lg btn-user btn-info" href="{{ route('specialty.index') }}">
                <i class="fas fa-arrow-left"></i>
                <span>voltar</span>
            </a>
            <button class="btn btn-lg btn-user btn-primary">
                <i class="fas fa-check-circle"></i>
                <span>{{ $button_desc }}</span>
            </button>
        </div>
    @endisset
</form>
