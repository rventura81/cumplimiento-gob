<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Compromisos</li>
</ol>


<p><a href="<?=URL::to('backend/compromisos/nuevo')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Compromiso</a></p>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#listado" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> Resultados</a></li>
    <li><a href="#visualizaciones" data-toggle="tab"><span class="glyphicon glyphicon-stats"></span> Visualizaciones</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="listado">
        <table class="table">
            <tbody>
            <?php foreach($compromisos as $compromiso): ?>
                <tr>
                    <td>
                        <h3><?= $compromiso->nombre; ?></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Institucion Responsable:</strong><br />
                                <?=$compromiso->institucion->nombre?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Sectorialista Responsable:</strong><br />
                                    <?=$compromiso->usuario->nombres?> <?=$compromiso->usuario->apellidos?></p>
                            </div>
                        </div>
                        <?=$compromiso->descripcion?>
                        <?php if($compromiso->entidadesDeLey->count()):?>
                        <h4>Entidades de Ley relacionadas:</h4>
                        <ul>
                        <?php foreach ($compromiso->entidadesDeLey as $e):?>
                            <li><?=$e->nombre?><?=$e->numero_boletin?' (Nº '.$e->numero_boletin.')':''?></li>
                        <?php endforeach ?>
                        </ul>
                        <?php endif ?>
                    </td>
                    <td>
                        <a href="<?= URL::to('backend/compromisos/editar/'.$compromiso->id); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        <a href="<?= URL::to('backend/compromisos/eliminar/'.$compromiso->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="modal-backend"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if(!count($compromisos)): ?>
                <tr>
                    <th class="text-center" colspan="3">No se han encontrado compromisos.</th>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

        <div class="text-center">
        <?=$compromisos->links()?>
        </div>

    </div>
    <div class="tab-pane" id="visualizaciones">
        <div class="chart pie" data-data='<?=json_encode($compromisos_chart)?>'></div>
    </div>
</div>


