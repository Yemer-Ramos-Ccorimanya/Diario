



<!DOCTYPE html>
<html>
<head>
</head>
  <body>
  <form method="post" action="">
	  <input type="submit" name="registrar_datos" value="registrar datos">
  </form>
<?php
if(!empty($_POST['registrar_datos'])){
?>

 <form method="post" action=" " enctype="multipart/form-data">
    <input type="text" placeholder="nombre" name="nombre" required>
    <input type="text" placeholder="apellido" name="apellido" required>
    <input type="text" placeholder="edad" name="edad" required>
    <input type="text" placeholder="ciudad" name="ciudad" required> 
    <input  name="userfile" type="file" >
    <input type="submit" name="subir" value="guardar datos">  
<?php  
  }
  ?>
<?php 
    if(!empty($_POST['cancelar'])){
      header("location: index.php?ruta=texto_diario");
    }
    if(!empty($_POST['subir'])){
    
      $nombre=basename($_FILES['userfile']["name"]);
      $ruta="galeria/".$nombre;
      $subirFoto= move_uploaded_file($_FILES['userfile']["tmp_name"],$ruta);
    date_default_timezone_set('America/Lima');
     $fechahora=strftime('%Y-%m-%dT%H:%M',time());
     if($subirFoto){
     $datosC = array(
      'id_usuario'=> $_SESSION['ide'],
      'fecha_introduccion'=>$fechahora,
      'nombre'=>$_POST['nombre'],
      'apellido'=>$_POST['apellido'],
      'foto'=>$ruta, 
      'edad'=>$_POST['edad'],
      'ciudad'=>$_POST['ciudad'],
    );

      $tablaBD = 'diario';
      $respuesta=notasM::GuardarDatos($datosC);
      if(!$respuesta){ echo"falllo ";
      echo("$ruta");
      }
     }
}
?>



</body>
</html>