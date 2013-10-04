<div id="content" class="span10">
    <!-- content starts -->

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i> Crear Usuarios</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Crear usuarios del sistema</legend>
                        <div class="control-group">
                            <label class="control-label" for="username">Usuario: </label>
                            <div class="controls">
                                <input type="text" class="span2" id="username" name='username'>
                                <p class="help-block">Escriba un nombre de usuario</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">Email: </label>
                            <div class="controls">
                                <input type="text" class="span2" id="email" name='email'>
                                <p class="help-block">Escriba un correo electrónico valido</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="password">Contraseña: </label>
                            <div class="controls">
                                <input type="password" class="span2" id="password" name='password'>
                                <p class="help-block">Escriba una contraseña (mínimo 4 caracteres)</p>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="re_password">Repetir Contraseña: </label>
                            <div class="controls">
                                <input type="password" class="span2" id="re_password" name='re_password'>
                                <p class="help-block">Repita Contraseña</p>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Crear Usuario</button>
                            <button type="reset" class="btn">Cancelar</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

</div><!--/#content.span10-->

