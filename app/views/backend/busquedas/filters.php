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
            <div class="panel-body panel-filtro-anidado">
                <div class="checkbox">
                    <ul>
                    <?php foreach($fuentes as $fuente): ?>
                        <li <?= in_array($fuente->id, $filtros['fuente']) ? 'class="active"' : ''; ?>>
                            <label>
                                <input name="fuentes[]" <?= in_array($fuente->id, $input['fuentes']) ? 'checked' : ''; ?> value="<?= $fuente->id; ?>" type="checkbox"/>
                                <?= $fuente->nombre; ?>
                            </label>
                            <ul>
                            <?php foreach($fuente->hijos as $h): ?>
                                <li <?= in_array($h->id, $filtros['fuente']) ? 'class="active"' : ''; ?>>
                                    <label>
                                        <input name="fuentes[]" <?= in_array($h->id, $input['fuentes']) ? 'checked' : ''; ?> value="<?= $h->id; ?>" type="checkbox"/>
                                        <?= $h->nombre; ?>
                                    </label>
                                    <ul>
                                        <?php foreach($h->hijos as $n): ?>
                                            <li <?= in_array($n->id, $filtros['fuente']) ? 'class="active"' : ''; ?>>
                                                <label>
                                                    <input name="fuentes[]" <?= in_array($n->id, $input['fuentes']) ? 'checked' : ''; ?> value="<?= $n->id; ?>" type="checkbox"/>
                                                    <?= $n->nombre; ?>
                                                </label>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="panel-heading">Institución responsable</div>
            <div class="panel-body panel-filtro-anidado">
                <div class="checkbox">
                    <ul>
                        <?php foreach($instituciones as $institucion): ?>
                            <li <?= in_array($institucion->id, $filtros['institucion']) ? 'class="active"' : ''; ?>>
                                <label>
                                    <input name="instituciones[]" <?= in_array($institucion->id, $input['instituciones']) ? 'checked' : ''; ?> value="<?= $institucion->id; ?>" type="checkbox"/>
                                    <?= $institucion->nombre; ?>
                                </label>
                                <ul>
                                <?php foreach($institucion->hijos as $institucionHija): ?>
                                    <li <?= in_array($institucionHija->id, $filtros['institucion']) ? 'class="active"' : ''; ?>>
                                        <label>
                                            <input name="instituciones[]" <?= in_array($institucionHija->id, $input['instituciones']) ? 'checked' : ''; ?> value="<?= $institucionHija->id; ?>" type="checkbox"/>
                                            <?= $institucionHija->nombre; ?>
                                        </label>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="panel-heading">Tipo de Compromiso</div>
            <div class="panel-body">
                <?php foreach($tipos as $crc32_tipo => $tipo): ?>
                    <div class="checkbox">
                    <label>
                        <input name="tipos[]" <?= in_array($crc32_tipo, $input['tipos']) ? 'checked' : ''; ?> value="<?= $crc32_tipo; ?>" type="checkbox"/>
                        <?= $tipo; ?>
                    </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </form>
</aside>