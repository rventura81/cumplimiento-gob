<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/compromisos'); ?>">Compromisos</a></li>
    <li class="active"><?= $compromiso->id ? 'Editar' : 'Nuevo'; ?></li>
</ol>

<form class="ajaxForm" method="post" action="<?= URL::to('backend/compromisos/guardar/' . $compromiso->id); ?>">
    <fieldset>
        <legend><?= $compromiso->id ? 'Editar' : 'Nuevo'; ?> Compromiso</legend>
        <div class="validacion"></div>
        <div class="form-group">
            <label for="titulo" class="control-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $compromiso->titulo; ?>"/>

        </div>
        <hr />
        <div class="row form-horizontal">
            <div class="col-sm-6">
                <div class="form-group form-group-fuente">
                    <label for="area" class="col-sm-3 control-label">Fuente</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="fuente_id" id="area" data-placeholder="Seleccionar fuente">
                            <option></option>
                            <?php foreach($fuentes as $f): ?>
                                <option value="<?= $f->id; ?>"><?= $f->nombre; ?></option>
                                <?php foreach($f->hijos as $h):?>
                                    <option value="<?= $h->id; ?>"> - <?= $h->nombre; ?></option>
                                    <?php foreach($h->hijos as $n):?>
                                        <option value="<?= $n->id; ?>"> -- <?= $n->nombre; ?></option>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            <?php endforeach ?>
                        </select>
                    </div>

                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="institucion" class="col-sm-3 control-label">Institución responsable</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="institucion" id="institucion" data-placeholder="Seleccionar institución">
                            <option></option>
                            <?php foreach($instituciones as $institucion): ?>
                                <option value="<?= $institucion->id; ?>"><?= $institucion->nombre; ?></option>
                                <?php foreach($institucion->hijos as $h): ?>
                                    <option value="<?= $h->id; ?>"> - <?= $h->nombre; ?></option>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>

        </div>

    </fieldset>
    <hr/>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    <a href="javascript:history.back();" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</a>
</form>