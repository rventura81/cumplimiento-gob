<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        @page {
            margin: 120px 20px 40px 20px;
        }
        body{
            font-size: 80%;
        }
        #header{
            position: fixed;
            top: -100px;
            left: 0;
            right: 0;
            height: 100px;
        }
        #header h1{
            position: absolute;
            top: 0;
            left: 120px;
        }
        #footer{
            position: fixed;
            bottom: -90px;
            left: 0;
            right: 0;
            height: 100px;
        }
    </style>
</head>
<body>
<div id="header">
    <img src="<?=public_path('img/minsegpres.jpg')?>" alt="" width="100"/>
    <h1>Estado de avance de compromisos presidenciales</h1>
</div>
<div id="footer">
    <p><?=Carbon\Carbon::now()->formatLocalized('%c')?></p>
</div>



            <?php foreach($compromisos as $compromiso): ?>
                <div>
                        <h3><?= $compromiso->nombre; ?></h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Institucion Responsable:</strong><br />
                                <?=$compromiso->institucion->nombre?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Estado de Avance</strong><br />
                                    Estado: <?=$compromiso->avance?><br />
                                    Descripción: <?=trim($compromiso->avance_descripcion)?$compromiso->avance_descripcion:'No hay descripción.'?>
                                </p>
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


</body>
</html>
