<?php
//session_start();
	 if(!empty($_POST['comentar'])){
		
		$notas = new notasC();;
	    $notas->ComentariosC();
        header("location: index.php?ruta=notas_publicas");
	 }
 
     date_default_timezone_set('America/Lima');
     $fechahora=strftime('%Y-%m-%dT%H:%M',time());

    $titulo12=$_GET['titulo'];
    $fecha12=$_GET['fecha'];
    $id_nota12=$_GET['id_nota'];
    $ide=$_SESSION['ide'];
    $nombre=$_SESSION['nombre'];

    echo <<<_END

    <form method="post" action= "">
    <input type="hidden" name="fecha_comentario" value="$fechahora">  
    <input type="hidden" name="fecha_texto" value="$fecha12">  
    <input type="hidden" name="titulo" value="$titulo12">  
    <input type="hidden" name="ide_nota" value="$id_nota12">  
    <input type="hidden" name="id_usuario" value="$ide">  
    <input type="hidden" name="nombre_usuario" value="$nombre">  
    <br><textarea name="texto"  cols="100" rows="10" wrap="hard"  placeholder="escribe algo"></textarea></br>
    <input type="submit" name="comentar" value="comentar">
    </form>
_END;   

?>