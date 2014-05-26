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
                    <a href="<?= URL::to('backend/fuentes/ver/'.$fuente->id); ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search"></i> Ver</a>
                    <a href="<?= URL::to('backend/fuentes/editar/'.$fuente->id); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                    <a href="<?= URL::to('backend/fuentes/eliminar/'.$fuente->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
                </td>
            </tr>
            <?php foreach($fuente->hijos as $h): ?>
                <tr>
                    <td> - <?= $h->nombre; ?></td>
                    <td><?= $h->padre ? $h->padre->nombre : ' - '; ?></td>
                    <td>
                        <a href="<?= URL::to('backend/fuentes/ver/'.$h->id); ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search"></i> Ver</a>
                        <a href="<?= URL::to('backend/fuentes/editar/'.$h->id); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        <a href="<?= URL::to('backend/fuentes/eliminar/'.$h->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
                    </td>
                </tr>
                <?php foreach($h->hijos as $n): ?>
                    <tr>
                        <td> -- <?= $n->nombre; ?></td>
                        <td><?= $n->padre ? $n->padre->nombre : ' - '; ?></td>
                        <td>
                            <a href="<?= URL::to('backend/fuentes/ver/'.$n->id); ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-search"></i> Ver</a>
                            <a href="<?= URL::to('backend/fuentes/editar/'.$n->id); ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                            <a href="<?= URL::to('backend/fuentes/eliminar/'.$n->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>