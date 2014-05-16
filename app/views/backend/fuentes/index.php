<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Fuentes</li>
</ol>

<a href="<?=URL::to('backend/fuentes/nueva')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Crear Fuente</a>

<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Padre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($fuentes as $fuente): ?>
            <tr>
                <td><?= $fuente->nombre; ?></td>
                <td><?= $fuente->padre ? $fuente->padre->nombre : ' - '; ?></td>
                <td>
                    <a href="<?= URL::to('backend/fuentes/editar/'.$fuente->id); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    <a href="<?= URL::to('backend/fuentes/eliminar/'.$fuente->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>