<html>
	<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/foundation.min.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/foundation/stylesheets/app.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/css/style.css">
  	<link rel="stylesheet" href="<?=base_url(); ?>statics/css/datepicker.css">
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/foundation.min.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/jquery.foundation.forms.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/modernizr.foundation.js"></script>
  	<script src="<?=base_url(); ?>statics/foundation/javascripts/jquery.placeholder.js.js"></script>
  	<script src="<?=base_url(); ?>statics/js/js.js"></script>
  	<script src="<?=base_url(); ?>statics/js/ajax.js"></script>
  	<script src="<?=base_url(); ?>statics/js/jquery-1.8.2.min.js"></script>
  	<script src="<?=base_url(); ?>statics/js/jquery-ui-1.8.23.custom.min.js"></script>
  	<script src="<?=base_url(); ?>statics/js/datepickerEsp.js"></script>
	<script type="text/javascript">
		var base = "<?=base_url(); ?>";
	</script>
</head>
<body>
	<h1>Combobox dependientes de Pa&iacute;s, Estado y Ciudad con PHP, MySQL, jQuery y un poco de AJAX</h1>
	<div class="six columns">
		<dl>
<dt>Ubicaci&oacute;n:</dt>
	<dd>Pais:</dd>
    <dd>
        <select id="pais" name="pais">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>

	<dd>Estado:</dd>
    <dd>
        <select id="estado" name="estado">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>

	<dd>Ciudad:</dd>
    <dd>
        <select id="ciudad" name="ciudad">
            <option value="0">Selecciona Uno...</option>
        </select>
    </dd>
</dl>
	</div>
<pre>
<?
	// print_r($datos);
?>
</pre>
</body>
</html>
