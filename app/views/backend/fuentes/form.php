<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/fuentes/guardar/' . $fuente->id); ?>">
    <fieldset>
        <legend><?= $fuente->id ? 'Editar' : 'Nueva'; ?> Fuente</legend>
        <div class="validacion"></div>
        <div class="form-group">
            <label for="nombre" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $fuente->nombre; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="fuente_padre_id" class="col-sm-3 control-label">Fuente padre</label>
            <div class="col-sm-9">
                <select name="fuente_padre_id" id="fuente_padre_id" class="form-control form-control-select2">
                    <option value="">Selecciona la Fuente padre</option>
                    <?php foreach($fuentes as $fuente_area): ?>
                        <option <?= $fuente->tipo == 'area' ? 'disabled' : ''; ?> <?= $fuente->esHijoDe($fuente_area) ? 'selected' : ''; ?> value="<?= $fuente_area->id; ?>"><?= $fuente_area->nombre; ?></option>
                        <?php foreach($fuente_area->hijos as $fuente_subarea): ?>
                            <option <?=  in_array($fuente->tipo, array('area', 'subarea')) ? 'disabled' : ''; ?> <?= $fuente->esHijoDe($fuente_subarea) ? 'selected' : ''; ?> value="<?= $fuente_subarea->id; ?>"> - <?= $fuente_subarea->nombre; ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </fieldset>
    <hr/>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    <a href="javascript:history.back();" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</a>
</form>