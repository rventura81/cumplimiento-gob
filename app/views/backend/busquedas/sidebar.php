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
                                <?php if(isset($filtros_count['fuente'][$fuente->id])): ?>
                                    <span class="badge"><?= array_get($filtros_count['fuente'],$fuente->id); ?></span>
                                <?php endif ?>
                            </label>
                            <ul>
                            <?php foreach($fuente->hijos as $h): ?>
                                <li <?= in_array($h->id, $filtros['fuente']) ? 'class="active"' : ''; ?>>
                                    <label>
                                        <input name="fuentes[]" <?= in_array($h->id, $input['fuentes']) ? 'checked' : ''; ?> value="<?= $h->id; ?>" type="checkbox"/>
                                        <?= $h->nombre; ?>
                                        <?php if(isset($filtros_count['fuente'][$h->id])): ?>
                                            <span class="badge"><?= array_get($filtros_count['fuente'],$h->id); ?></span>
                                        <?php endif ?>
                                    </label>
                                    <ul>
                                        <?php foreach($h->hijos as $n): ?>
                                            <li <?= in_array($n->id, $filtros['fuente']) ? 'class="active"' : ''; ?>>
                                                <label>
                                                    <input name="fuentes[]" <?= in_array($n->id, $input['fuentes']) ? 'checked' : ''; ?> value="<?= $n->id; ?>" type="checkbox"/>
                                                    <?= $n->nombre; ?>
                                                    <?php if(isset($filtros_count['fuente'][$n->id])): ?>
                                                        <span class="badge"><?= array_get($filtros_count['fuente'],$n->id); ?></span>
                                                    <?php endif ?>
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
                        <?php foreach($instituciones as $sector): ?>
                            <li <?= in_array($sector->id, $filtros['institucion']) ? 'class="active"' : ''; ?>>
                                <label>
                                    <input name="instituciones[]" <?= in_array($sector->id, $input['instituciones']) ? 'checked' : ''; ?> value="<?= $sector->id; ?>" type="checkbox"/>
                                    <?= $sector->nombre; ?>
                                    <?php if(isset($filtros_count['institucion'][$sector->id])): ?>
                                        <span class="badge"><?= array_get($filtros_count['institucion'],$sector->id); ?></span>
                                    <?php endif ?>
                                </label>
                                <ul>
                                <?php foreach($sector->hijos as $sectorHijo): ?>
                                    <li <?= in_array($sectorHijo->id, $filtros['institucion']) ? 'class="active"' : ''; ?>>
                                        <label>
                                            <input name="instituciones[]" <?= in_array($sectorHijo->id, $input['instituciones']) ? 'checked' : ''; ?> value="<?= $sectorHijo->id; ?>" type="checkbox"/>
                                            <?= $sectorHijo->nombre; ?>
                                            <?php if(isset($filtros_count['institucion'][$sectorHijo->id])): ?>
                                                <span class="badge"><?= array_get($filtros_count['institucion'],$sectorHijo->id); ?></span>
                                            <?php endif ?>
                                        </label>
                                    </li>
                                <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="panel-heading">Sector Geográfico</div>
            <div class="panel-body panel-filtro-anidado">
                <div class="checkbox">
                    <ul>
                        <?php foreach($sectores as $sector): ?>
                            <li <?= in_array($sector->id, $filtros['sector']) ? 'class="active"' : ''; ?>>
                                <label>
                                    <input name="sectores[]" <?= in_array($sector->id, $input['sectores']) ? 'checked' : ''; ?> value="<?= $sector->id; ?>" type="checkbox"/>
                                    <?= $sector->nombre; ?>
                                    <?php if(isset($filtros_count['sector'][$sector->id])): ?>
                                        <span class="badge"><?= array_get($filtros_count['sector'],$sector->id); ?></span>
                                    <?php endif ?>
                                </label>
                                <ul>
                                    <?php foreach($sector->hijos as $sectorHijo): ?>
                                        <li <?= in_array($sectorHijo->id, $filtros['sector']) ? 'class="active"' : ''; ?>>
                                            <label>
                                                <input name="sectores[]" <?= in_array($sectorHijo->id, $input['sectores']) ? 'checked' : ''; ?> value="<?= $sectorHijo->id; ?>" type="checkbox"/>
                                                Provincia de <?= $sectorHijo->nombre; ?>
                                                <?php if(isset($filtros_count['sector'][$sectorHijo->id])): ?>
                                                    <span class="badge"><?= array_get($filtros_count['sector'],$sectorHijo->id); ?></span>
                                                <?php endif ?>
                                            </label>
                                            <ul>
                                                <?php foreach($sectorHijo->hijos as $n): ?>
                                                    <li <?= in_array($n->id, $filtros['sector']) ? 'class="active"' : ''; ?>>
                                                        <label>
                                                            <input name="sectores[]" <?= in_array($n->id, $input['sectores']) ? 'checked' : ''; ?> value="<?= $n->id; ?>" type="checkbox"/>
                                                            <?= $n->nombre; ?>
                                                            <?php if(isset($filtros_count['sector'][$n->id])): ?>
                                                                <span class="badge"><?= array_get($filtros_count['sector'],$n->id); ?></span>
                                                            <?php endif ?>
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

            <div class="panel-heading">Tipo de Compromiso</div>
            <div class="panel-body panel-filtro-anidado">
                <?php foreach($tipos as $crc32_tipo => $tipo): ?>
                    <div class="checkbox">
                    <label>
                        <input name="tipos[]" <?= in_array($crc32_tipo, $input['tipos']) ? 'checked' : ''; ?> value="<?= $crc32_tipo; ?>" type="checkbox"/>
                        <?= $tipo; ?>
                        <?php if(isset($filtros_count['tipo'][$crc32_tipo])): ?>
                            <span class="badge"><?= array_get($filtros_count['tipo'],$crc32_tipo); ?></span>
                        <?php endif ?>
                    </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="panel-heading">Estado de Avance</div>
            <div class="panel-body panel-filtro-anidado">
                <?php foreach($avances as $crc32_tipo => $tipo): ?>
                    <div class="checkbox">
                        <label>
                            <input name="avances[]" <?= in_array($crc32_tipo, $input['avances']) ? 'checked' : ''; ?> value="<?= $crc32_tipo; ?>" type="checkbox"/>
                            <?= $tipo; ?>
                            <?php if(isset($filtros_count['avance'][$crc32_tipo])): ?>
                                <span class="badge"><?= array_get($filtros_count['avance'],$crc32_tipo); ?></span>
                            <?php endif ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </form>
</aside>