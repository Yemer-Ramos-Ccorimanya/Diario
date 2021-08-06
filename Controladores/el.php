<?php
 if(!empty($_POST['eliminar'])){
		
    $notas = new notasC();;
    $notas->BorrarNotasC();
 }

 if(!empty($_POST['modificar'])){
  $titulo3=$_POST['titulo'];
  $texto3=$_POST['texto'];
  $fecha3=$_POST['fecha'];
  
  header("location: index.php?ruta=modificar_nota&titulo=$titulo3&texto=$texto3&fecha=$fecha3");
  }
?>