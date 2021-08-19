<?php
  
  require_once "perfil.php";
    if(!empty($_COOKIE['nombre'])){
     $r=$_COOKIE['nombre'];
     echo" <h1>$r</h1>";}
     
     echo "<h1>bien venido <br/></h1>";
    

	 if(!empty($_POST['eliminar'])){
		
		$notas = new notasC();;
	    $notas->BorrarNotasC();
	 }

     if(!empty($_POST['modificar'])){
        $notas2= new notasC();;
        $notas2->formularioModificar();
        
      }
     
    
      $a=$_SESSION['ide'];
      $notas = new notasC();;
	    $notas->MostrarnotasC();;
      
        
?>
		
		
   
