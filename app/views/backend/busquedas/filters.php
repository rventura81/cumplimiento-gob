<aside>
    <form action="<?= URL::to('backend/buscar'); ?>" method="get">
        <legend>Fuente</legend>
        <?php foreach($fuentes as $fuente): ?>
            <div class="checkbox">
                <label>
                    <input name="fuentes[]" value="<?= $fuente->id; ?>" type="checkbox"/>
                    <?= $fuente->nombre; ?>
                </label>
            </div>
        <?php endforeach; ?>
        <legend>Institución responsable</legend>
        <?php foreach($instituciones as $institucion): ?>
            <div class="checkbox">
                <label>
                    <input name="instituciones[]" value="<?= $institucion->id; ?>" type="checkbox"/>
                    <?= $institucion->nombre; ?>
                </label>
            </div>
        <?php endforeach; ?>
        <legend>Entidad de Ley</legend>
        <?php foreach($entidades as $entidad): ?>
            <div class="checkbox">
                <label>
                    <input name="entidades[]" value="<?= $entidad->id; ?>" type="checkbox"/>
                    <?= $entidad->nombre; ?>
                </label>
            </div>
        <?php endforeach; ?>
    </form>
</aside>