<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/entidades'); ?>">Entidades</a></li>
    <li class="active">Ver</li>
</ol>

<table class="table table-bordered">
    <tr>
        <th class="col-xs-3">Nombre</th>
        <td><?= $entidad->nombre; ?></td>
    </tr>
    <tr>
        <th>Tipo</th>
        <td><?= $entidad->tipo; ?></td>
    </tr>
    <tr>
        <th>Número de boletín</th>
        <td><?= $entidad->numero_boletin; ?></td>
    </tr>
    <tr>
        <th>Estado</th>
        <td><?= $entidad->estado; ?></td>
    </tr>
</table>
<a href="javascript:history.back();" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Volver</a>