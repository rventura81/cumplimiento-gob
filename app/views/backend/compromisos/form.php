<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/compromisos')?>">Compromisos</a></li>
    <li class="active"><?= $compromiso->id ? 'Editar' : 'Nuevo'; ?></li>
</ol>

<?php if(!$editMode):?>
<div class="alert alert-warning">Atención. Usted no tiene permisos para editar este compromiso. Solamente podra visualizarlo.</div>
<?php endif ?>

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

                <div class="form-group">
                    <label for="tags" class="col-sm-3 control-label">Tags</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-select2-tags" name="tags" data-tags='<?=json_encode($tags)?>' value="<?=implode(',',$compromiso->tags->lists('nombre'))?>" />
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="sector" class="col-sm-3 control-label">Sector Geográfico</label>
                    <div class="col-sm-9">
                        <select class="form-control form-control-select2" name="sectores[]" id="sector" data-placeholder="Chile" multiple>
                            <option></option>
                            <?php foreach($sectores as $s): ?>
                                <option value="<?= $s->id; ?>" <?=$compromiso->sectores->find($s->id)?'selected':''?>><?= $s->nombre; ?></option>
                                <?php foreach($s->hijos as $h): ?>
                                    <option value="<?= $h->id; ?>" <?=$compromiso->sectores->find($h->id)?'selected':''?>> - Provincia de <?= $h->nombre; ?></option>
                                    <?php foreach($h->hijos as $hh): ?>
                                        <option value="<?= $hh->id; ?>" <?=$compromiso->sectores->find($hh->id)?'selected':''?>> -- <?= $hh->nombre; ?></option>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
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
                        <?php if(Auth::user()->super):?>
                        <select class="form-control form-control-select2" name="usuario" id="usuario" data-placeholder="Seleccionar usuario">
                            <option></option>
                            <?php foreach($usuarios as $usuario): ?>
                                <option value="<?= $usuario->id; ?>" <?=$usuario->id==$compromiso->usuario_id?'selected':''?>><?= $usuario->nombres; ?> <?=$usuario->apellidos?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php else: ?>
                        <input type="text" class="form-control" readonly value="<?=$compromiso->usuario->nombres.' '.$compromiso->usuario->apellidos?>" />
                        <?php endif ?>
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
                    <label for="metas">Actividades Relacionadas</label>
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
                    <option value="Con Problemas" <?=$compromiso->avance=='Con Problemas'?'selected':''?>>Con Problemas</option>
                    <option value="Reformulado" <?=$compromiso->avance=='Reformulado'?'selected':''?>>Reformulado</option>
                    <option value="Sin Información" <?=$compromiso->avance=='Sin Información'?'selected':''?>>Sin Información</option>
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
                    <a href="<?= URL::to('backend/entidades/nueva'); ?>" data-toggle="modal" data-target="#modal-backend" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Nueva</a>
                    <label for="entidades_de_ley">Trámites Legislativos asociados</label>
                    <select id="entidades_de_ley" name="entidades_de_ley[]" class="form-control form-control-select2" data-placeholder="Seleccione las entidades de Ley asociadas a este compromiso" multiple>
                        <option></option>
                        <?php foreach($entidades_de_ley as $l): ?>
                            <option value="<?= $l->id; ?>" <?=$compromiso->entidadesDeLey->find($l->id)?'selected':''?>><?= $l->nombre; ?> <?= $l->numero_boletin ? '(N° Boletín: '.$l->numero_boletin.')' : ''; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <p class="help-block">Doble click para editar una en particular.</p>
                </div>
            </div>
        </div>

        <hr />

        <div class="row form-hitos">
            <div class="col-sm-12">
                <label>Hitos</label>

                <div><button class="btn btn-default form-hitos-agregar" type="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo hito</button></div>
                <table class="table form-hitos-table">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($compromiso->hitos as $h):?>
                        <tr>
                            <td><input class="form-control" type="text" value="<?=$h->descripcion?>" name="hitos[<?=$i?>][descripcion]" placeholder="Descripción del hito"/></td>
                            <td><input data-provide="datepicker" data-date-format="dd-mm-yyyy" data-date-autoclose="true" type="date" class="form-control" value="<?=$h->fecha->format('d-m-Y')?>" name="hitos[<?=$i?>][fecha]" placeholder="Fecha en que debería ocurrir" /></td>
                            <td>
                                <button class="btn btn-danger" type="text"><span class="glyphicon glyphicon-remove"></span></button>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <hr />

        <div class="row form-medios">
            <div class="col-sm-12">
                <label>Medios de verificación</label>
                <div><button class="btn btn-default form-medios-agregar" type="button"><span class="glyphicon glyphicon-plus"></span> Agregar nuevo Medio de Verificación</button></div>

                <table class="table form-medios-table">
                    <thead>
                    <tr>
                        <th class="col-sm-6">Descripción</th>
                        <th class="col-sm-3">Tipo</th>
                        <th class="col-sm-3">Enlace</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach($compromiso->mediosDeVerificacion as $m):?>
                    <tr>
                        <td><input class="form-control" type="text" name="medios-de-verificacion[<?=$i?>][descripcion]" value="<?=$m->descripcion?>" placeholder="Descripción del medio de verificación" /></td>
                        <td><input class="form-control" type="text" name="medios-de-verificacion[<?=$i?>][tipo]" value="<?=$m->tipo?>" placeholder="pdf" /></td>
                        <td class="url">
                            <input class="form-control" type="text" name="medios-de-verificacion[<?=$i?>][url]" value="<?=$m->url?>" placeholder="http://www.diariooficial.cl" />
                            <span class="fileinput-button"><span class="glyphicon glyphicon-upload"></span><input type="file" /></span>
                        </td>
                        <td>
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
    <div class="text-right">
        <?php if($editMode):?><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button><?php endif ?>
        <a href="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancelar</a>
    </div>
</form>