<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/compromisos/guardar/' . $compromiso->id); ?>">
    <fieldset>
        <legend><?= $compromiso->id ? 'Editar' : 'Nuevo'; ?> Compromiso</legend>
        <div class="validacion"></div>
        <div class="form-group">
            <label for="titulo" class="col-sm-3 control-label">Titulo</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $compromiso->titulo; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="institucion" class="col-sm-3 control-label">Institución responsable</label>
            <div class="col-sm-9">
                <select class="form-control form-control-select2" name="institucion" id="institucion">
                    <?php foreach($instituciones as $institucion): ?>
                        <option value="<?= $institucion->id; ?>"><?= $institucion->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </fieldset>
    <hr/>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    <a href="javascript:history.back();" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</a>
</form>