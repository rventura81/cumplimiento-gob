<aside>
    <form action="<?= URL::to('backend/buscar'); ?>" method="get">
        <div class="panel panel-default">
            <div class="panel-heading">
                <button type="submit" class="btn btn-xs btn-primary pull-right"><i class="glyphicon glyphicon-search"></i> Filtrar</button>
                <span>Busqueda</span>
            </div>
            <div class="panel-body">
                <input type="text" class="form-control" name="q" id="q-filtros" value="<?= strip_tags($q); ?>"/>
            </div>

            <div class="panel-heading">Fuentes</div>
            <div class="panel-body">
                <?php foreach($fuentes as $fuente): ?>
                    <div class="checkbox">
                        <label>
                            <input name="fuente[]" <?= in_array($fuente->id, $input['fuente']) ? 'checked' : ''; ?> value="<?= $fuente->id; ?>" type="checkbox"/>
                            <?= $fuente->nombre; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="panel-heading">Institución responsable</div>
            <div class="panel-body">
                <?php foreach($instituciones as $institucion): ?>
                    <div class="checkbox">
                        <label>
                            <input name="institucion[]" <?= in_array($institucion->id, $input['institucion']) ? 'checked' : ''; ?> value="<?= $institucion->id; ?>" type="checkbox"/>
                            <?= $institucion->nombre; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="panel-heading">Entidad de Ley</div>
            <div class="panel-body">
                <?php foreach($entidades as $entidad): ?>
                    <div class="checkbox">
                        <label>
                            <input name="entidad[]" <?= in_array($entidad->id, $input['entidad']) ? 'checked' : ''; ?> value="<?= $entidad->id; ?>" type="checkbox"/>
                            <?= $entidad->nombre; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </form>
</aside>