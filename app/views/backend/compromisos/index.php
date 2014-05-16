<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Compromisos</li>
</ol>

<a href="<?=URL::to('backend/compromisos/nuevo')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Crear Compromiso</a>

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
                <td><?= $compromiso->titulo; ?></td>
                <td><span class="label"><?= $compromiso->publico ? 'public' : 'privado'; ?></span></td>
                <td>
                    <a href="<?= URL::to('backend/compromisos/editar/'.$compromiso->id); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    <a href="<?= URL::to('backend/compromisos/eliminar/'.$compromiso->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="modal-backend"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>