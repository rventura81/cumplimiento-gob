<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Usuarios</li>
</ol>

<a href="<?=URL::to('backend/usuarios/nuevo')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Usuario</a>

<table class="table">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td><a href="<?= URL::to('backend/usuarios/ver/'.$usuario->id); ?>"><?= $usuario->nombre_completo; ?></a></td>
                <td style="white-space: nowrap;">
                    <a href="<?= URL::to('backend/usuarios/editar/'.$usuario->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                    <a href="<?= URL::to('backend/usuarios/eliminar/'.$usuario->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>