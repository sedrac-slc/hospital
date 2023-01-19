<hr class="bg-primary">
<div class="row">
    <div class="col">
        <label for="" class="form-label">
            <i class="fas fa-calendar"></i>
            <span>Data criação:</span>
        </label>
        <input type="text" class="form-control form-control-user" id="exampleInputCreated_at"
            placeholder="" name="created_at" disabled
            value="{{ $obj->created_at ?? old('created_at') }}">
    </div>
    <div class="col">
        <label for="" class="form-label">
            <i class="fas fa-calendar-check"></i>
            <span>Data actualização:</span>
        </label>
        <input type="text" class="form-control form-control-user" id="exampleInputUpdated"
            placeholder="" name="updated_at" disabled
            value="{{ $obj->updated_at ?? old('updated_at') }}">
    </div>
</div>
