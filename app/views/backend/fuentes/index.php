<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Fuentes</li>
</ol>

<a href="<?=URL::to('backend/fuentes/nueva')?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Crear Fuente</a>

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
                <td><a href="<?= URL::to('backend/fuentes/editar/'.$fuente->id); ?>"><?= $fuente->nombre; ?></a></td>
                <td><?= $fuente->padre ? $fuente->padre->nombre : ' - '; ?></td>
                <td style="white-space: nowrap;">
                    <a href="<?= URL::to('backend/fuentes/editar/'.$fuente->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                    <a href="<?= URL::to('backend/fuentes/eliminar/'.$fuente->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
            <?php foreach($fuente->hijos as $h): ?>
                <tr>
                    <td> - <a href="<?= URL::to('backend/fuentes/editar/'.$fuente->id); ?>"><?= $h->nombre; ?></a></td>
                    <td><?= $h->padre ? $h->padre->nombre : ' - '; ?></td>
                    <td style="white-space: nowrap;">
                        <a href="<?= URL::to('backend/fuentes/editar/'.$h->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                        <a href="<?= URL::to('backend/fuentes/eliminar/'.$h->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
                    </td>
                </tr>
                <?php foreach($h->hijos as $n): ?>
                    <tr>
                        <td> -- <a href="<?= URL::to('backend/fuentes/editar/'.$fuente->id); ?>"><?= $n->nombre; ?></a></td>
                        <td><?= $n->padre ? $n->padre->nombre : ' - '; ?></td>
                        <td style="white-space: nowrap;">
                            <a href="<?= URL::to('backend/fuentes/editar/'.$n->id); ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                            <a href="<?= URL::to('backend/fuentes/eliminar/'.$n->id); ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-backend" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </tbody>
</table>