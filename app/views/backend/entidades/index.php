<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Trámites Legislativos</li>
</ol>

<a href="<?=URL::to('backend/entidades/nueva')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Trámite Legislativo</a>

<table class="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Borrador</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($entidades as $entidad): ?>
        <tr>
            <td><a href="<?= URL::to('backend/entidades/editar/'.$entidad->id); ?>"><?= $entidad->nombre; ?></a></td>
            <td><?= $entidad->borrador?'Sí':'No' ?></td>
            <td><?= $entidad->estado; ?></td>
            <td style="white-space: nowrap;">
                <a href="<?= URL::to('backend/entidades/editar/'.$entidad->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                <a href="<?= URL::to('backend/entidades/eliminar/'.$entidad->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>