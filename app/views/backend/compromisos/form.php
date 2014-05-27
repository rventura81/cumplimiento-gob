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
                    <textarea class="form-control tinymce" rows="6" placeholder="Descripción sobre lo que consiste el compromiso." id="descripcion" name="descripcion"><?=$compromiso->descripcion?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="beneficios">Beneficios</label>
                    <textarea class="form-control tinymce" rows="6" placeholder="Beneficios que otorga el compromiso." id="beneficios" name="beneficios"><?=$compromiso->beneficios?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="metas">Metas</label>
                    <textarea class="form-control tinymce" rows="6" placeholder="Metas del compromisos." id="metas" name="metas"><?=$compromiso->metas?></textarea>
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-4">
                <label>Estado de Avance</label>
                <select name="avance" class="form-control">
                    <option value="No Iniciado" <?=$compromiso->avance=='No Iniciado'?'selected':''?>>No Iniciado</option>
                    <option value="En Proceso" <?=$compromiso->avance=='En Proceso'?'selected':''?>>En Proceso</option>
                    <option value="Atrasado" <?=$compromiso->avance=='Atrasado'?'selected':''?>>Atrasado</option>
                    <option value="Cumplido" <?=$compromiso->avance=='Cumplido'?'selected':''?>>Cumplido</option>
                </select>
            </div>
            <div class="col-sm-8">
                <label>Descripción del Estado de Avance</label>
                <textarea class="form-control tinymce" rows="6" name="avance_descripcion"><?=$compromiso->avance_descripcion?></textarea>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="instituciones-relacionadas">Instituciones relacionadas</label>
                    <select class="form-control form-control-select2" name="instituciones_relacionadas[]" id="instituciones-relacionadas" data-placeholder="Seleccionar instituciones" multiple>
                        <option></option>
                        <?php foreach($instituciones as $i): ?>
                            <option value="<?= $i->id; ?>" <?=$compromiso->institucionesRelacionadas->find($i->id)?'selected':''?>><?= $i->nombre; ?></option>
                            <?php foreach($i->hijos as $h): ?>
                                <option value="<?= $h->id; ?>" <?=$compromiso->institucionesRelacionadas->find($h->id)?'selected':''?>> - <?= $h->nombre; ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </div>


            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="anuncio">Extracto anuncio</label>
                    <textarea id="anuncio" name="anuncio" class="form-control tinymce" rows="6" placeholder="Transcriba la frase o discurso donde se anunció este compromiso."><?=$compromiso->anuncio?></textarea>
                </div>
                <div class="form-group">
                    <label id="anuncio_emisor">Emisor del anuncio</label>
                    <input type="text" name="anuncio_emisor" id="anuncio_emisor" class="form-control" placeholder="Persona que emitió el anuncio" value="<?=$compromiso->anuncio_emisor?>" />
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group form-compromisos-tipo">
                    <label for="tipo">Tipo de Compromiso</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="Medida de Gestión" <?=$compromiso->tipo=='Medida de Gestión'?'selected':''?>>Medida de Gestión</option>
                        <option value="Proyecto de Ley" <?=$compromiso->tipo=='Proyecto de Ley'?'selected':''?>>Proyecto de Ley</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="form-group form-compromisos-entidades-de-ley">
                    <label for="entidades_de_ley">Entidades de Ley asociadas</label>
                    <select id="entidades_de_ley" name="entidades_de_ley[]" class="form-control form-control-select2" data-placeholder="Seleccione las entidades de Ley asociadas a este compromiso" multiple>
                        <option></option>
                        <?php foreach($entidades_de_ley as $l): ?>
                            <option value="<?= $l->id; ?>" <?=$compromiso->entidadesDeLey->find($l->id)?'selected':''?>><?= $l->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <hr />

        <div class="row form-medios">
            <div class="col-sm-12">
                <label>Medios de verificación</label>

                <div class="row form-medios-agregar">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="medio-descripcion">Descripción</label>
                            <input id="medio-descripcion" type="text" class="form-control medio-descripcion" placeholder="Descripción del medio" />
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="medio-tipo">Tipo</label>
                            <input id="medio-tipo" type="text" class="form-control medio-tipo" placeholder="Ej: pdf" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="medio-url">Enlace</label>
                            <input id="medio-url" type="text" class="form-control medio-url" placeholder="Ej: http://diariooficial.cl" />
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
                </div>

                <table class="table form-medios-table">
                    <thead>
                    <tr>
                        <th class="col-sm-6">Descripcion</th>
                        <th class="col-sm-3">Tipo</th>
                        <th class="col-sm-3">Enlace</th>
                        <th></th>
                    </tr>
                    <tr class="nodata">
                        <td colspan="4">No hay medios de verificación ingresados.</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach($compromiso->mediosDeVerificacion as $m):?>
                    <tr>
                        <td><?=$m->descripcion?></td>
                        <td><?=$m->tipo?></td>
                        <td><?=$m->url?></td>
                        <td>
                            <input type="hidden" name="medios-de-verificacion[<?=$i?>][descripcion]" value="<?=$m->descripcion?>" />
                            <input type="hidden" name="medios-de-verificacion[<?=$i?>][tipo]" value="<?=$m->tipo?>" />
                            <input type="hidden" name="medios-de-verificacion[<?=$i?>][url]" value="<?=$m->url?>" />
                            <button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-remove"></span></button>
                        </td>
                    </tr>
                    <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </fieldset>
    <hr/>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    <a href="javascript:history.back();" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</a>
</form>