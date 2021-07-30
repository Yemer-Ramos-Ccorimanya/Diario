<?php
echo "hola ";
  
    if(!empty($_COOKIE['nombre'])){
     $r=$_COOKIE['nombre'];
     echo" <h1>$r</h1>";}
     session_start();
    echo "<h1>bien venido <br/></h1>";
    // echo " <a href='nueva_nota.php'>crear nueva nota</a> <br/>";
    // echo "<br/>";
    // echo " <a href='logout.php'>cerrar session</a><br/> ";
    // echo "<br/>";
    // require 'formulario_buscar.php';

    // $conexion = new mysqli($hn, $un, $pw, $db);

    // if ($conexion->connect_error) die ("Fatal error");
    
    //     $a=$_SESSION['ide'] ;
    //     $query = "SELECT * FROM diario WHERE id_usuario=$a";
    //     $result = $conexion->query($query);
    //     $filas = $result->num_rows;
        
    //     echo"Tienes $filas notas esctritas<br/>";
    //     echo"<br/>";
    //     for ($j=0; $j<$filas;++$j)
    //     {
    //         $row = $result->fetch_array(MYSQLI_NUM);

    //     $r0 = htmlspecialchars($row[0]);
    //     $titulo = htmlspecialchars($row[1]);
    //     $fecha = htmlspecialchars($row[2]);
    //     $texto = htmlspecialchars($row[4]);
        
    //     echo "Titulo: $titulo</br>" ;
    //     echo "Texto: $texto</br>" ;
    //     echo "Fecha : $fecha</br>" ;
    //     echo <<<_END
    //         <form action="eliminar_modificar.php" method="post">
    //         <input type='hidden' name='delete' value='yes'>
    //         <input type="hidden" name="titulo" value="$titulo">  
    //         <input type="hidden" name="texto" value="$texto"> 
    //         <input type="hidden" name="fecha" value="$fecha"> 
    //         <input type="submit" name="eliminar" value="eliminar">
    //         <input type="submit" name="modificar" value="modificar">
    //         </form>
    //         _END;

            

        

    //     }
    //     $result->close();
    //     $conexion->close();
        
?>
