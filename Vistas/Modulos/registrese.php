<br> <!-- Vistas/Modulos/ingreso.php -->
<h1>REGISTRARSE</h1>

<form method="post" action="">
	<input type="text" placeholder="Usuario" name="usuarioI" required>
	<input type="password" placeholder="Contraseña" name="claveI" required>
	<input type="password" placeholder="confirme contraseña" name="clave2" required>
	<input type="submit" value="Ingresar">
</form>

<?php
$registro= new AdminC();
$registro->RegistroC();
?>