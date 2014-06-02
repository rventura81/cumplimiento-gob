<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Buscar</li>
</ol>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#listado" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> Resultados</a></li>
    <li><a href="#visualizaciones" data-toggle="tab"><span class="glyphicon glyphicon-stats"></span> Visualizaciones</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="listado">
        <table class="table">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Público</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($compromisos as $compromiso): ?>
                <tr>
                    <td><?= $compromiso->nombre; ?></td>
                    <td><?= $compromiso->publico ? 'Sí' : 'No'; ?></td>
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

    </div>
    <div class="tab-pane" id="visualizaciones">
        <div class="chart pie" data-data='<?=json_encode($compromisos_chart)?>'></div>
    </div>
</div>


