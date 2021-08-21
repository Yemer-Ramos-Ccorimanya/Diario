<?php
$titulo12=$_GET['titulo'];
$fecha12=$_GET['fecha'];
$id_nota12=$_GET['id_nota'];

$datosC = array(
                        
    'ide_nota'=> $_GET['id_nota'],
    'titulo'=>$_GET['titulo'],
    'fecha_texto'=>$_GET['fecha'],  
);

$respuesta = notasM::Ver_ComentariosM($datosC);
		
		$notas = new notasC();
        $notas-> MostrarComentarios($respuesta);
       

?>
<form method="post" action="">
	<input type="submit" name="dejar_de_ver_comentarios" value="dejar de ver comentarios">
</form>

<?php
if(!empty( $_POST['dejar_de_ver_comentarios'])){
    header("location: index.php?ruta=notas_publicas");

}

?>