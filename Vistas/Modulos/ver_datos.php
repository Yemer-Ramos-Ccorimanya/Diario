
<!DOCTYPE html>
<html>
<head>
</head>
  <body>
      
  <form method="post" action="">
	  <input type="submit" name="ver_datos" value="ver datos">
  </form>
  <?php

$datos = new notasM();
$ide=$_SESSION['ide'];
$respuesta = $datos->VerDatosM($ide);

if(!empty($_POST['ver_datos'])){
?>
<form method="post" action="">
	  <input type="submit" name="dejar_ver" value="dejar de ver">
  </form>
  
<br>  <!-- Vistas/Modulos/empleados.php -->
<h1>tus datos son</h1>

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
			<td> <img height="150px" src="<?php echo $value['archivo']?>"/></td>
			<td><?=$value['edad']?></td>
			<td> <?= $value['ciudad']?></td>

			</tr>
			<td><a href='index.php?ruta=editar_foto&id_usuario=<?=$value['id_usuario']?>'>
			<button>Editar foto</button></td>
		<?php 

		}
		?>

	</tbody>
</table>
<?php

		}
?>
</body>
</html>