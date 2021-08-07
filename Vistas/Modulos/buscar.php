<?php 

 session_start();
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

echo <<<_END
    
<form  method="post" action="">
<input type="search" name="titulo"  placeholder="buscar Texto">
<input type="date" name="fecha" >
<input type="date" name="fecha2" >
<input type="submit" name="BUSCAR" value="BUSCAR">
</form>
_END;

if(!empty($_POST["BUSCAR" ])&&!empty($_POST["titulo"])&&!empty($_POST["fecha"])){

    $datosC = array(
        'ide'=> $_SESSION['ide'],
        'titulo'=>$_POST['titulo'],
        'fecha'=>$_POST['fecha'] 
    );
    $respuesta = new notasM();
    $respuesta=notasM::BuscarNotastituloFecha($datosC);

    $notas = new notasC();;
	$notas->MostrarNotasC2($respuesta);
       
}

elseif(!empty($_POST["BUSCAR" ])&&!empty($_POST["titulo"])){

   
    $datosC = array(
        'ide'=> $_SESSION['ide'],
        'titulo'=>$_POST['titulo']
    );
    $respuesta = new notasM();
    $respuesta=notasM::BuscarNotasSolotitulo($datosC); 
    
    $notas = new notasC();;
	$notas->MostrarNotasC2($respuesta);
}


elseif(!empty($_POST["BUSCAR" ])&&!empty($_POST["fecha"])&&!empty($_POST["fecha2"])){

   
    $datosC = array(
        'ide'=> $_SESSION['ide'],
        'fecha'=>$_POST['fecha'],
        'fecha2'=>$_POST['fecha2'] 
    );
    
    $respuesta = new notasM();
    $respuesta=notasM::BuscarNotasFechayFecha($datosC);
    
    $notas = new notasC();;
	$notas->MostrarNotasC2($respuesta);
}

   
elseif(!empty($_POST["BUSCAR" ])&&!empty($_POST["fecha"])){
   
    $datosC = array(
        'ide'=> $_SESSION['ide'],
        'fecha'=>$_POST['fecha'],
    );
    
    $respuesta = new notasM();
    $respuesta=notasM::BuscarNotasSoloFecha($datosC);
    
    $notas = new notasC();;
	$notas->MostrarNotasC2($respuesta);
}

elseif(!empty($_POST["BUSCAR" ])&&!empty($_POST["fecha2"])){
   
    $datosC = array(
        'ide'=> $_SESSION['ide'],
        'fecha'=>$_POST['fecha2'],
    );
    
    $respuesta = new notasM();
    $respuesta=notasM::BuscarNotasSoloFecha($datosC);
    
    $notas = new notasC();;
	$notas->MostrarNotasC2($respuesta);
}


?>