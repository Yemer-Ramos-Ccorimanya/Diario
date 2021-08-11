<?php
session_start();
	 if(!empty($_POST['comentar'])){
		
		$notas = new notasC();;
	    $notas->ModificarNotasC();
        header("location: index.php?ruta=texto_diario");
	 }
     date_default_timezone_set('America/Lima');
     $fechahora=strftime('%Y-%m-%dT%H:%M',time());

    $titulo12=$_GET['titulo'];
    $texto12=$_GET['texto'];
    $fecha12=$_GET['fecha'];
    $condicion12=$_GET['condicion'];
    $ide=$_SESSION['ide'];
    echo"</br>";
    echo <<<_END

    <form method="post" action= "">
    <input type="hidden" name="fecha2" value="$fecha12">  
    <input type="hidden" name="titulo2" value="$titulo12">  
    <br><textarea name="texto"  cols="100" rows="10" wrap="hard"  placeholder="¿Que paso hoy?"></textarea></br>
    <input type="submit" name="cancelar" value="comentar">
    </form>
_END;   

?>