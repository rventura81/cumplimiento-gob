<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/entidades'); ?>">Entidades</a></li>
    <li class="active"><?= $entidad->id ? 'Editar' : 'Nueva'; ?></li>
</ol>

<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/entidades/guardar/' . $entidad->id); ?>">
    <fieldset>
        <legend><?= $entidad->id ? 'Editar' : 'Nueva'; ?> Entidad</legend>
        <div class="validacion"></div>
        <div class="form-group">
            <label for="nombre" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $entidad->nombre; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="tipo" class="col-sm-3 control-label">Tipo</label>
            <div class="col-sm-9">
                <select name="tipo" id="tipo" class="form-control form-control-select2" data-placeholder="Seleccionar tipo">
                    <option></option>
                    <option <?= $entidad->tipo == "borrador" ? 'selected':''; ?> value="borrador">Borrador</option>
                    <option <?= $entidad->tipo == "proyecto" ? 'selected':''; ?> value="proyecto">Proyecto</option>
                    <option <?= $entidad->tipo == "ley" ? 'selected':''; ?> value="ley">Ley</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="numero_boletin" class="col-sm-3 control-label">Número de boletín</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="numero_boletin" id="numero_boletin" value="<?= $entidad->numero_boletin; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="estado" class="col-sm-3 control-label">Estado</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="estado" id="estado" value="<?= $entidad->estado; ?>"/>
            </div>
        </div>
    </fieldset>
    <hr/>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    <a href="javascript:history.back();" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</a>
</form>