<?php
  
    if(!empty($_COOKIE['nombre'])){
     $r=$_COOKIE['nombre'];
     echo" <h1>$r</h1>";}
   
     echo "<h1>bien venido <br/></h1>";
    
     if(!empty($_POST['ver_comentarios'])){
		
        $titulo3=$_POST['titulo'];
        $texto3=$_POST['texto'];
        $fecha3=$_POST['fecha'];
        $id_nota3=$_POST['id_nota'];
        
        header("location: index.php?ruta=ver_comentarios&titulo=$titulo3&fecha=$fecha3&id_nota=$id_nota3");
	 }

    if(!empty($_POST['ver_reacciones'])){
		
      $titulo3=$_POST['titulo'];
      $texto3=$_POST['texto'];
      $fecha3=$_POST['fecha'];
      $id_nota3=$_POST['id_nota'];
      
      header("location: index.php?ruta=ver_reacciones&titulo=$titulo3&fecha=$fecha3&id_nota=$id_nota3");
  }

	 if(!empty($_POST['comentar'])){
		
        $titulo3=$_POST['titulo'];
        $texto3=$_POST['texto'];
        $fecha3=$_POST['fecha'];
        $id_nota3=$_POST['id_nota'];
        
        header("location: index.php?ruta=comentar_notas&titulo=$titulo3&fecha=$fecha3&id_nota=$id_nota3");
	 }

     if(!empty($_POST['reaccionar'])){
		
        $titulo3=$_POST['titulo'];
        $texto3=$_POST['texto'];
        $fecha3=$_POST['fecha'];
        $id_nota3=$_POST['id_nota'];
        
        header("location: index.php?ruta=reaccionar&titulo=$titulo3&fecha=$fecha3&id_nota=$id_nota3");
	 }

	 
    

      $notas = new notasC();;
	    $notas->Mostrarnotas_PublicasC();;
      
     
?>