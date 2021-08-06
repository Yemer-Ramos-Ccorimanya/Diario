<?php
	 if(!empty($_POST['modificar'])){
		
		$notas = new notasC();;
	    $notas->ModificarNotasC();
        header("location: index.php?ruta=texto_diario");
	 }
     date_default_timezone_set('America/Lima');
     $fechahora=strftime('%Y-%m-%dT%H:%M',time());

    $titulo12=$_GET['titulo'];
    $texto12=$_GET['texto'];
    $fecha12=$_GET['fecha'];
    echo "Titulo: $titulo12</br>" ;
    echo "Fecha : $fecha12</br>" ;
    echo"</br>";
    echo <<<_END
    <form method="post" action= "">
    <input type="search" name="titulo"  placeholder="Titulo" value='$titulo12'>
    <input type="datetime-local"  name="fecha" value= $fechahora >
    <input type="hidden" name="fecha2" value="$fecha12">  
    <input type="hidden" name="titulo2" value="$titulo12">  
    <br><textarea name="texto"  cols="100" rows="10" wrap="hard"  placeholder="¿Que paso hoy?">$texto12</textarea></br>
    <input type="submit" name="modificar" value="modificar">
    <input type="submit" name="cancelar" value="cancelar">
    </form>
_END;   
    
    


?>