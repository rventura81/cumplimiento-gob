<form class="ajaxForm form-horizontal form-usuario" method="post" action="<?= URL::to('backend/usuarios/guardar/' . $usuario->id); ?>"  autocomplete="off">
    <fieldset>
        <legend><?= $usuario->id ? 'Editar' : 'Nuevo'; ?> Usuario</legend>
        <div class="validacion"></div>
        <div class="form-group">
            <label for="nombres" class="col-sm-3 control-label">Nombres</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nombres" id="nombres" value="<?= $usuario->nombres; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="apellidos" class="col-sm-3 control-label">Apellidos</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?= $usuario->apellidos; ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">E-Mail</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="email" id="email" value="<?= $usuario->email; ?>"/>
            </div>
        </div>
        <div class="form-group cont-password" style="<?= $usuario->id ? '' : 'display: none;'; ?>">
            <label for="cambiar-password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
                <button type="button" id="cambiar-password" class="btn btn-cambiar-password" data-disabled="true">Cambiar</button>
            </div>
        </div>
        <div class="cont-cambiar-password" style="<?= $usuario->id ? 'display: none;' : ''; ?>">
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label"><?= $usuario->id ? 'Nuevo ' : ''; ?>Password</label>
                <div class="col-sm-9">
                    <input type="password" <?= $usuario->id ? 'disabled' : ''; ?> class="form-control" name="password" id="password" value=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-3 control-label">Confirmar Password</label>
                <div class="col-sm-9">
                    <input type="password" <?= $usuario->id ? 'disabled' : ''; ?>  class="form-control" name="password_confirmation" id="password_confirmation" value=""/>
                </div>
            </div>
        </div>
    </fieldset>
    <hr/>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Guardar</button>
    <a href="javascript:history.back();" class="btn btn-warning"><i class="glyphicon glyphicon-ban-circle"></i> Cancelar</a>
</form>