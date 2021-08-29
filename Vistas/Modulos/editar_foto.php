<!DOCTYPE html>
<html>
<head>
</head>
  <body>
    <?php
     $id_usuario=$_GET['id_usuario'];
     
    ?>
  <h2>seleciones una foto nueva</h2>
</br>
 <form method="post" action=" " enctype="multipart/form-data"> 
    <input  name="userfile" type="file" >
    <input type="submit" name="subir" value="guardar datos">
  </form>


  <?php 

if(!empty($_POST['subir'])){

  $nombre=basename($_FILES['userfile']["name"]);
  $ruta="galeria/".$nombre;
  $subirFoto= move_uploaded_file($_FILES['userfile']["tmp_name"],$ruta);
 if($subirFoto){
 $datosC = array(
  'id_usuario'=> $_SESSION['ide'],
  'foto'=>$ruta
);

  $respuesta=notasM::editar_foto($datosC);
  if(!$respuesta){ echo"falllo ";
  }
  else{
    header("location: index.php?ruta=texto_diario");
  }
 }
}
?>



</body>
</html>