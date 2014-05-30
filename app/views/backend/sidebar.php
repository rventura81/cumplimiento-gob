<aside>
    <div class="panel panel-default">
        <div class="panel-heading">Administración</div>
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li <?= $item_menu == 'compromisos' ? 'class="active"' : ''; ?>><a href="<?=URL::to('backend/compromisos')?>">Compromisos</a></li>
                <li <?= $item_menu == 'fuentes' ? 'class="active"' : ''; ?>><a href="<?=URL::to('backend/fuentes')?>">Fuentes</a></li>
                <li <?= $item_menu == 'entidades' ? 'class="active"' : ''; ?>><a href="<?=URL::to('backend/entidades')?>">Entidades de Ley</a></li>
                <li <?= $item_menu == 'usuarios' ? 'class="active"' : ''; ?>><a href="<?=URL::to('backend/usuarios')?>">Usuarios</a></li>
            </ul>
        </div>
    </div>
</aside>