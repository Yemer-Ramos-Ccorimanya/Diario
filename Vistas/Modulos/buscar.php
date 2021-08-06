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

if(!empty($_POST["BUSCAR" ])&&!empty($_POST["titulo"])&&empty($_POST["fecha"])){

    $datosC = array(
        'ide'=> $_SESSION['ide'],
        'titulo'=>$_POST['titulo'],
        'fecha'=>$_POST['fecha'] 
    );
    $respuesta = new notasM();
    $respuesta=notasM::BuscarNotastituloFecha($datosC);
    $filas = $respuesta -> num_rows;
       
        echo"Tienes $filas notas esctritas<br/>";
        echo"<br/>";
        for ($j=$filas; $j>0;--$j)
        {
          
          $row = $respuesta -> fetch_array(MYSQLI_NUM);
            
              
          $r0 = htmlspecialchars($row[0]);
          $titulo = htmlspecialchars($row[1]);
          $fecha = htmlspecialchars($row[2]);
          $texto = htmlspecialchars($row[4]);
          
          echo "Titulo: $titulo</br>" ;
          echo "Texto: $texto</br>" ;
          echo "Fecha : $fecha</br>" ;
          echo <<<_END
          <form action="" method="post" ><pre>
              <input type='hidden' name='delete' value='yes'>
              <input type="hidden" name="titulo" value="$titulo">  
              <input type="hidden" name="texto" value="$texto"> 
            <input type="hidden" name="fecha" value="$fecha"> 
            <input type="submit" name="eliminar" value="eliminar">
            <input type="submit" name="modificar" value="modificar">
          </form>
_END;
    }
       
}
elseif(!empty($_POST["BUSCAR" ])&&!empty($_POST["titulo"])){

   
    $datosC = array(
        'ide'=> $_SESSION['ide'],
        'titulo'=>$_POST['titulo']
    );
    $respuesta = new notasM();
    $respuesta=notasM::BuscarNotasSolotitulo($datosC); 
    $filas = $respuesta -> num_rows;
       
        echo"Tienes $filas notas esctritas<br/>";
        echo"<br/>";
        for ($j=$filas; $j>0;--$j)
        {
          
          $row = $respuesta -> fetch_array(MYSQLI_NUM);
            
              
          $r0 = htmlspecialchars($row[0]);
          $titulo = htmlspecialchars($row[1]);
          $fecha = htmlspecialchars($row[2]);
          $texto = htmlspecialchars($row[4]);
          
          echo "Titulo: $titulo</br>" ;
          echo "Texto: $texto</br>" ;
          echo "Fecha : $fecha</br>" ;
          echo <<<_END
          <form action="" method="post" ><pre>
              <input type='hidden' name='delete' value='yes'>
              <input type="hidden" name="titulo" value="$titulo">  
              <input type="hidden" name="texto" value="$texto"> 
            <input type="hidden" name="fecha" value="$fecha"> 
            <input type="submit" name="eliminar" value="eliminar">
            <input type="submit" name="modificar" value="modificar">
          </form>
_END;
    }
}

elseif(!empty($_POST["BUSCAR" ])&&!empty($_POST["fecha"])&&!empty($_POST["fecha2"])){

   
    $datosC = array(
        'ide'=> $_SESSION['ide'],
        'fecha'=>$_POST['fecha'],
        'fecha2'=>$_POST['fecha2'] 
    );
    
    $respuesta = new notasM();
    $respuesta=notasM::BuscarNotasFechayFecha($datosC);
    $filas = $respuesta -> num_rows;
       
        echo"Tienes $filas notas esctritas<br/>";
        echo"<br/>";
        for ($j=$filas; $j>0;--$j)
        {
          
          $row = $respuesta -> fetch_array(MYSQLI_NUM);
            
              
          $r0 = htmlspecialchars($row[0]);
          $titulo = htmlspecialchars($row[1]);
          $fecha = htmlspecialchars($row[2]);
          $texto = htmlspecialchars($row[4]);
          
          echo "Titulo: $titulo</br>" ;
          echo "Texto: $texto</br>" ;
          echo "Fecha : $fecha</br>" ;
          echo <<<_END
          <form action="" method="post" ><pre>
              <input type='hidden' name='delete' value='yes'>
              <input type="hidden" name="titulo" value="$titulo">  
              <input type="hidden" name="texto" value="$texto"> 
            <input type="hidden" name="fecha" value="$fecha"> 
            <input type="submit" name="eliminar" value="eliminar">
            <input type="submit" name="modificar" value="modificar">
          </form>
_END;
    }
}
   


?>