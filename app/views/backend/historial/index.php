<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li class="active">Historial</li>
</ol>

<div style='text-align: center;'><?= $historial->links(); ?></div>
<table class="table">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Compromiso</th>
            <th>Usuario</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($historial as $h): ?>
            <tr>
                <td><?=$h->descripcion; ?></td>
                <td><?=$h->compromiso?'<a href="'.url('backend/compromisos/editar/'.$h->compromiso->id).'">'.$h->compromiso->nombre.'</a>':''?></td>
                <td><?=$h->usuario?$h->usuario->nombres.' '.$h->usuario->apellidos:''?></td>
                <td class="updatedAt"><?=$h->updated_at?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div style='text-align: center;'><?= $historial->links(); ?></div>