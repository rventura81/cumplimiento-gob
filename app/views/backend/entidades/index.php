<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Entidades de Ley</li>
</ol>

<a href="<?=URL::to('backend/entidades/nueva')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Crear Entidad de Ley</a>

<table class="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($entidades as $entidad): ?>
        <tr>
            <td><?= $entidad->nombre; ?></td>
            <td><?= $entidad->tipo; ?></td>
            <td><?= $entidad->estado; ?></td>
            <td>
                <a href="<?= URL::to('backend/entidades/editar/'.$entidad->id); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                <a href="<?= URL::to('backend/entidades/eliminar/'.$entidad->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>