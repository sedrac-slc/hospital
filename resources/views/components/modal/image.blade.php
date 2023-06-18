<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <form class="modal-content" action="{{ route('user.image') }}" method="POST" id="imageForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-white" id="exampleModalLabel">
                <i class="fas fa-info-circle"></i>
                <span>Foto de perfil</span>
            </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <i class="text-white fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <input type="file" name="image" id="image" class="form-control">
            <input type="hidden" name="user_id" id="user_id" @isset($user_id) value="{{ $user_id }}" @endisset>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" type="submit">
                <i class="fas fa-check-circle"></i>
                <span>Sim, confirmo</span>
            </button>
        </div>
    </form>
</div>
</div>
