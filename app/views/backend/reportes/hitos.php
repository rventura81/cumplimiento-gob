<ol class="breadcrumb">
    <li><a href="<?=URL::to('backend')?>">Inicio</a></li>
    <li><a href="<?=URL::to('backend/reportes')?>">Reportes</a></li>
    <li class="active">Próximos hitos relevantes</li>
</ol>


<table class="table">
    <thead>
    <tr>
        <th>Hito</th>
        <th>Compromiso</th>
        <th>Fecha</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($hitos as $h):?>
    <tr>
        <td><?=$h->descripcion?></td>
        <td><a href="<?=URL::to('backend/compromisos/ver/'.$h->compromiso->id)?>"><?=$h->compromiso->nombre?></a></td>
        <td><?=$h->fecha->format('d-m-Y')?></td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>