<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <form class="modal-content" action="#" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
        <div class="modal-header bg-danger">
            <h5 class="modal-title text-white" id="exampleModalLabel">
                <i class="fas fa-info-circle"></i>
                <span>Confirmação</span>
            </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <i class="text-white fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <p class="text-justify">
                Tens certeza que desejas eliminar este registo, cuidado! esta acção é irreversível.
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" data-dismiss="modal">
                <i class="fas fa-times-circle"></i>
                <span>cancelar</span>
            </button>
            <button class="btn btn-success" type="submit">
                <i class="fas fa-check-circle"></i>
                <span>Sim, confirmo</span>
            </button>
        </div>
    </form>
</div>
</div>
