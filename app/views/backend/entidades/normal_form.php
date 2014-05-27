<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/entidades/guardar/' . $entidad->id); ?>">
    <ol class="breadcrumb">
        <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
        <li><a href="<?=URL::to('backend/entidades'); ?>">Entidades</a></li>
        <li class="active"><?= $entidad->id ? 'Editar' : 'Nueva'; ?></li>
    </ol>

    <fieldset>
        <legend><?= $entidad->id ? 'Editar' : 'Nueva'; ?> Entidad</legend>

        <?= View::make('backend/entidades/form', array('entidad' => $entidad)); ?>

    </fieldset>
    <hr/>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    <a href="javascript:history.back();" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</a>
</form>