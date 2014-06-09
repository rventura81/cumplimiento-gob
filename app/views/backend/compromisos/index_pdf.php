<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
<img src="<?=public_path('img/minsegpres.jpg')?>" alt="" width="100"/>

            <?php foreach($compromisos as $compromiso): ?>
                <div>
                        <h3><?= $compromiso->nombre; ?></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Institucion Responsable:</strong><br />
                                <?=$compromiso->institucion->nombre?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Sectorialista Responsable:</strong><br />
                                    <?=$compromiso->usuario->nombres?> <?=$compromiso->usuario->apellidos?></p>
                            </div>
                        </div>
                        <?=$compromiso->descripcion?>
                        <?php if($compromiso->entidadesDeLey->count()):?>
                        <h4>Entidades de Ley relacionadas:</h4>
                        <ul>
                        <?php foreach ($compromiso->entidadesDeLey as $e):?>
                            <li><a href="<?=URL::to('backend/entidades/editar/'.$e->id)?>"><?=$e->nombre?><?=$e->numero_boletin?' (Nº '.$e->numero_boletin.')':''?></a></li>
                        <?php endforeach ?>
                        </ul>
                        <?php endif ?>
                </div>
                <hr/>
            <?php endforeach; ?>
            <?php if(!count($compromisos)): ?>
                <div>
                    <th class="text-center" colspan="3">No se han encontrado compromisos.</th>
                </div>
            <?php endif; ?>



</html>
</body>