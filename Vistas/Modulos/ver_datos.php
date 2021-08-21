
<!DOCTYPE html>
<html>
<head>
</head>
  <body>
      
  <?php

$datos = new notasM();
$ide=$_SESSION['ide'];
$respuesta = $datos->VerDatosM($ide);

?>
<br>  <!-- Vistas/Modulos/empleados.php -->
<h1>Empleados</h1>

<table id="t1" border="1">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>foto</th>
			<th>edad</th>
			<th>ciudad</th>
		</tr>
	</thead>

	<tbody>
	<?php
		foreach($respuesta as $key => $value){

		?>
            <tr>
			<td><?=$value['nombre']?></td>
			<td><?=$value['apellido']?></td>
			<td> <img src="<?php echo $value['archivo']?>"/></td>

			<td><?=$value['edad']?></td>
			<td> <?= $value['ciudad']?></td>
			</tr>
		<?php

		}
		?>

	</tbody>
</table>

</body>
</html>