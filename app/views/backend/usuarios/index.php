<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Usuarios</li>
</ol>

<a href="<?=URL::to('backend/usuarios/nuevo')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Crear Usuario</a>

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
                <td><?= $usuario->nombre_completo; ?></td>
                <td>
                    <a href="<?= URL::to('backend/usuarios/editar/'.$usuario->id); ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>