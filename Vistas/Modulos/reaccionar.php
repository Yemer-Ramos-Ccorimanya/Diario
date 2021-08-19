<?php
//session_start();
	 if(!empty($_POST['reaccionar'])){
		
		$notas = new notasC();;
	    $notas->ReaccionesC();
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
    <form method="post" action=" "><pre>
    <input type="hidden" name="fecha_reaccion" value="$fechahora">  
    <input type="hidden" name="fecha_texto" value="$fecha12">  
    <input type="hidden" name="titulo" value="$titulo12">  
    <input type="hidden" name="ide_nota" value="$id_nota12">  
    <input type="hidden" name="id_usuario" value="$ide">  
    <input type="hidden" name="nombre_usuario" value="$nombre"> 
    <select name="reaccion" size="1">
        <option value="me gusta">me gusta</options>
        <option value="me encanta">me encanta</options>
        <option value="me sorprende">me sorprende</options>
        <option value="me enoja">me enoja</options>
        <option value="me intrestece">me intrestece</options>
    </select>
    <input type="submit" name="reaccionar" value="reaccionar">
    </from>
_END; 
    
?>
   