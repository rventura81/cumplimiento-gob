<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/compromisos')?>">Compromisos</a></li>
    <li class="active"><?= $compromiso->id ? 'Editar' : 'Nuevo'; ?></li>
</ol>

<form class="ajaxForm" method="post" action="<?= URL::to('backend/compromisos/guardar/' . $compromiso->id); ?>">
    <fieldset>
        <legend><?= $compromiso->id ? 'Editar' : 'Nuevo'; ?> Compromiso</legend>
        <div class="validacion"></div>
        <div class="form-group">
            <label for="nombre" class="control-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $compromiso->nombre; ?>" placeholder="Nombre del compromiso"/>

        </div>
        <hr />
        <div class="row form-horizontal">
            <div class="col-sm-6">
                <div class="form-group form-group-fuente">
                    <label for="publico" class="col-sm-3 control-label">Privacidad</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="publico" id="publico">
                            <option value="0">Privado</option>
                            <option value="1">Público</option>
                        </select>
                    </div>

                </div>
                <div class="form-group form-group-fuente">
                    <label for="fuente" class="col-sm-3 control-label">Fuente</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="fuente" id="area" data-placeholder="Seleccionar fuente">
                            <option></option>
                            <?php foreach($fuentes as $f): ?>
                                <option value="<?= $f->id; ?>" <?=$f->id==$compromiso->fuente_id?'selected':''?>><?= $f->nombre; ?></option>
                                <?php foreach($f->hijos as $h):?>
                                    <option value="<?= $h->id; ?>" <?=$h->id==$compromiso->fuente_id?'selected':''?>> - <?= $h->nombre; ?></option>
                                    <?php foreach($h->hijos as $n):?>
                                        <option value="<?= $n->id; ?>" <?=$n->id==$compromiso->fuente_id?'selected':''?>> -- <?= $n->nombre; ?></option>
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
                            <?php foreach($instituciones as $i): ?>
                                <option value="<?= $i->id; ?>" <?=$i->id==$compromiso->institucion_responsable_id?'selected':''?>><?= $i->nombre; ?></option>
                                <?php foreach($i->hijos as $h): ?>
                                    <option value="<?= $h->id; ?>" <?=$h->id==$compromiso->institucion_responsable_id?'selected':''?>> - <?= $h->nombre; ?></option>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="usuario" class="col-sm-3 control-label">Sectorialista responsable</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="usuario" id="usuario" data-placeholder="Seleccionar usuario">
                            <option></option>
                            <?php foreach($usuarios as $usuario): ?>
                                <option value="<?= $usuario->id; ?>" <?=$usuario->id==$compromiso->usuario_id?'selected':''?>><?= $usuario->email; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>

        </div>

        <hr />

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" rows="6" placeholder="Descripción sobre lo que consiste el compromiso." id="descripcion" name="descripcion"><?=$compromiso->descripcion?></textarea>
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="instituciones-relacionadas">Instituciones relacionadas</label>
                    <select class="form-control form-control-select2" name="instituciones_relacionadas_id" id="instituciones-relacionadas" data-placeholder="Seleccionar instituciones" multiple>
                        <option></option>
                        <?php foreach($instituciones as $i): ?>
                            <option value="<?= $i->id; ?>"><?= $i->nombre; ?></option>
                            <?php foreach($i->hijos as $h): ?>
                                <option value="<?= $h->id; ?>"> - <?= $h->nombre; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>


            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="anuncio">Extracto anuncio</label>
                    <textarea id="anuncio" name="anuncio" class="form-control" rows="6" placeholder="Transcriba la frase o discurso donde se anunció este compromiso."></textarea>
                </div>
                <div class="form-group">
                    <label id="anuncio_emisor">Emisor del anuncio</label>
                    <input type="text" name="anuncio_emisor" id="anuncio_emisor" class="form-control" placeholder="Persona que emitió el anuncio" />
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="entidades_de_ley">Entidades de Ley asociadas</label>
                    <select id="entidades_de_ley" name="entidades_de_ley_id" class="form-control form-control-select2" data-placeholder="Seleccione las entidades de Ley asociadas a este compromiso" multiple>
                        <option></option>
                        <?php foreach($entidades_de_ley as $l): ?>
                            <option value="<?= $l->id; ?>"><?= $l->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-12">
                <label for="medios_de_verificacion">Medios de verificación</label>
                <p>Pendiente...</p>
            </div>
        </div>

    </fieldset>
    <hr/>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    <a href="javascript:history.back();" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</a>
</form>