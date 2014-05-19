<form action="<?= URL::to('backend/entidades/eliminar/'.$entidad->id); ?>" method="POST">
    <div class="modal-body">
        ¿Está seguro que desea eliminar la entidad de ley <strong><?= $entidad->nombre; ?></strong>?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Aceptar</button>
    </div>
    <input type="hidden" name="_method" value="delete"/>
</form>