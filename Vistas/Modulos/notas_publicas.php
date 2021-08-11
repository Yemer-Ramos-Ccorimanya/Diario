<?php
  
    if(!empty($_COOKIE['nombre'])){
     $r=$_COOKIE['nombre'];
     echo" <h1>$r</h1>";}
     session_start();
     echo "<h1>bien venido <br/></h1>";
    

	 if(!empty($_POST['comentar'])){
		
        $titulo3=$_POST['titulo'];
        $texto3=$_POST['texto'];
        $fecha3=$_POST['fecha'];
        $condicion3=$_POST['condicion'];
        
        header("location: index.php?ruta=comentar_notas&titulo=$titulo3&texto=$texto3&fecha=$fecha3&condicion=$condicion3");
	 }


	 
    

      $notas = new notasC();;
	    $notas->Mostrarnotas_PublicasC();;
      
     
?>