<?php
  
    if(!empty($_COOKIE['nombre'])){
     $r=$_COOKIE['nombre'];
     echo" <h1>$r</h1>";}
     session_start();
     echo "<h1>bien venido <br/></h1>";
    

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
    
      $a=$_SESSION['ide'];
      $notas = new notasC();;
	    $notas->MostrarnotasC();;
      
     
?>
		
		
   
