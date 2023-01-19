<form class="user" action="{{ $route }}" method="POST">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="exampleInputPosition" class="form-label">
            <i class="fas fa-signature"></i>
            <span>Nome:</span>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-user" id="exampleInputPosition" aria-describedby="emailHelp"
            placeholder="Digita o nome" name="position" required @isset($disabled) disabled @endisset
            value="{{ $occupations->position ?? old('position') }}">
    </div>
    <hr class="bg-primary">
    <div class="form-group">
        <label for="exampleInputDescription" class="form-label">
            <i class="fas fa-comment"></i>
            <span>Descricão:</span>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-user" id="exampleInputDescription"
            placeholder="Digita a descrição" name="description" required
            @isset($disabled) disabled @endisset
            value="{{ $occupations->description ?? old('description') }}">
    </div>

    @isset($type_button)
        @if ($type_button != 'view')
            @include('components.form.input_user', ['obj' => $occupations])
            <a class="btn btn-lg btn-user btn-info mt-3" href="{{ route('occupation.index') }}">
                <i class="fas fa-arrow-left"></i>
                <span>voltar</span>
            </a>
        @endif
    @else
        <div class="mt-2">
            <a class="btn btn-lg btn-user btn-info" href="{{ route('occupation.index') }}">
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
