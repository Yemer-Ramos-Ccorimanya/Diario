<br> <!-- Vistas/Modulos/ingreso.php -->
<h1>INGRESAR</h1>

<?php
if(!empty($_POST['ingresar'])){
$ingreso = new AdminC();
$ingreso->IngresoC();
}
echo <<<_END
<form method="post" action="">
	<input type="text" placeholder="Usuario" name="usuarioI" required>
	<input type="password" placeholder="Contraseña" name="claveI" required>
	<input type="submit" name ="ingresar" value="Ingresar">
</form>
_END;
?>
