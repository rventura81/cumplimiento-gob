<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/entidades/guardar/' . $entidad->id); ?>" data-onsuccess="actualizaEntidades">
    <div class="modal-body">
        <?= View::make('backend/entidades/form', array('entidad' => $entidad)); ?>
        <input type="hidden" name="is_modal" value="1"/>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-ban-circle"></i> Close</button>
        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    </div>
</form>