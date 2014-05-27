<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Compromisos</li>
</ol>

<a href="<?=URL::to('backend/compromisos/nuevo')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Compromiso</a>

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
                <td><span class="glyphicon glyphicon-<?= $compromiso->publico ? 'ok' : 'remove'; ?>"></span> </td>
                <td>
                    <a href="<?= URL::to('backend/compromisos/editar/'.$compromiso->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                    <a href="<?= URL::to('backend/compromisos/eliminar/'.$compromiso->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="modal-backend"><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>