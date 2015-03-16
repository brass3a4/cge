<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('myform', $attributes); ?>

<p>
        <label for="nombre">nombre <span class="required">*</span></label>
        <?php echo form_error('nombre'); ?>
        <br /><input id="nombre" type="text" name="nombre" maxlength="255" value="<?php echo set_value('nombre'); ?>"  />
</p>

<p>
        <label for="usuario">username <span class="required">*</span></label>
        <?php echo form_error('usuario'); ?>
        <br /><input id="usuario" type="text" name="usuario" maxlength="50" value="<?php echo set_value('usuario'); ?>"  />
</p>

<p>
        <label for="contrasena">contraseña <span class="required">*</span></label>
        <?php echo form_error('contrasena'); ?>
        <br /><input id="contrasena" type="password" name="contrasena" maxlength="32" value="<?php echo set_value('contrasena'); ?>"  />
</p>

<p>
        <label for="re_contrasena">Vuela a escribir su contraseña <span class="required">*</span></label>
        <?php echo form_error('re_contrasena'); ?>
        <br /><input id="re_contrasena" type="password" name="re_contrasena" maxlength="32" value="<?php echo set_value('re_contrasena'); ?>"  />
</p>

<p>
        <label for="email">Correo Electrónico <span class="required">*</span></label>
        <?php echo form_error('email'); ?>
        <br /><input id="email" type="text" name="email" maxlength="100" value="<?php echo set_value('email'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
