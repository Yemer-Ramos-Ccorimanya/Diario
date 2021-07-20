<?php
echo"<a href='texto_diario.php'>CANCELAR BUSQUEDA</a> </br>";
session_start();
require_once 'database.php';
    $conexion = new mysqli($hn, $un, $pw, $db, $port);
    if($conexion->connect_error) die("Error fatal");

    if(empty($_POST['titulo'])&&empty($_POST['fecha'])) {

        die ("no a introducido ningun dato ");
    }

    //titulo y fecha

if (!empty($_POST['BUSCAR'])&&!empty($_POST['titulo'])&&!empty($_POST['fecha']))
{
    $fecha = $_POST['fecha'];
    $titulo = get_post($conexion, 'titulo');
    $a=$_SESSION['ide'] ;
    $query = "SELECT * FROM diario WHERE id_usuario=$a AND titulo='$titulo' AND fechaalterna=' $fecha'";
    $result = $conexion->query($query);

    if (!$result){
        echo "no se encontro su nota, puede ser que introdujo mal el nombre o la fecha
        <a href='formulario_buscar.php'>¿intentar buscar de nuevo? </a> <br/> ";
    }
    elseif( $result->num_rows){
        $filas = $result->num_rows;
            
            
            echo"Tienes $filas notas esctritas<br/>";
            echo"<br/>";
            for ($j=$filas-1; $j >=0; --$j)
            {
                $row = $result->fetch_array(MYSQLI_NUM);

            $r0 = htmlspecialchars($row[0]);
            $titulo = htmlspecialchars($row[1]);
            $fecha = htmlspecialchars($row[2]);
            $texto = htmlspecialchars($row[4]);
            echo "Titulo: $titulo</br>" ;
            echo "Texto: $texto</br>" ;
            echo "Fecha : $fecha</br>" ;

            echo <<<_END
                <form action="eliminar_modificar.php" method="post">
                <input type='hidden' name='delete' value='yes'>
                <input type="hidden" name="titulo" value="$titulo">  
                <input type="hidden" name="texto" value="$texto"> 
                <input type="hidden" name="fecha" value="$fecha"> 
                <input type="submit" name="eliminar" value="eliminar">
                <input type="submit" name="modificar" value="modificar">
                </form>
                _END;
            }
            $result->close();
            $conexion->close();
         }
         else {
            echo "no se encontro su nota, puede ser que introdujo mal el nombre o la fecha
            <a href='formulario_buscar.php'>¿intentar buscar de nuevo? </a> <br/> 
            <a href='texto_diario.php'>avandonar busqueda </a> <br/>";
        
         }
}
// solo titulo
    elseif (!empty($_POST['BUSCAR'])&&!empty($_POST['titulo'])){
            $titulo = get_post($conexion,'titulo');
            $a=$_SESSION['ide'] ;
            $query = "SELECT * FROM diario WHERE id_usuario=$a AND titulo='$titulo'";
            $result = $conexion->query($query);

            if (!$result){
                echo "no se encontro su nota, puede ser que introdujo mal el nombre o la fecha
                <a href='formulario_buscar.php'>¿intentar buscar de nuevo? </a> <br/> 
                <a href='formulario_buscar.php'>avandonar busqueda </a> <br/>";
            }
            elseif( $result->num_rows){
                $filas = $result->num_rows;
                
                    echo"Tienes $filas notas esctritas<br/>";
                    echo"<br/>";
                    for ($j=$filas-1; $j >=0; --$j)
                    {
                        $row = $result->fetch_array(MYSQLI_NUM);

                        $r0 = htmlspecialchars($row[0]);
                        $titulo = htmlspecialchars($row[1]);
                        $fecha = htmlspecialchars($row[2]);
                        $texto = htmlspecialchars($row[4]);
                        echo "Titulo: $titulo</br>" ;
                        echo "Texto: $texto</br>" ;
                        echo "Fecha : $fecha</br>" ;

                        echo <<<_END
                            <form action="eliminar_modificar.php" method="post">
                            <input type='hidden' name='delete' value='yes'>
                            <input type="hidden" name="titulo" value="$titulo">  
                            <input type="hidden" name="texto" value="$texto"> 
                            <input type="hidden" name="fecha" value="$fecha"> 
                            <input type="submit" name="eliminar" value="eliminar">
                            <input type="submit" name="modificar" value="modificar">
                            </form>
                            _END;
                    }
                    $result->close();
                    $conexion->close();
                }
             else {
                echo "no se encontro su nota, puede ser que introdujo mal el nombre o la fecha
                <a href='formulario_buscar.php'>¿intentar buscar de nuevo? </a> <br/>";
            
             }
    }
    //fecha fecha
    elseif (!empty($_POST['BUSCAR'])&&!empty($_POST['fecha']&&!empty($_POST['fecha2'])))
    {
        $fecha = $_POST['fecha'];
        $fecha2= $_POST['fecha2'];
        $a=$_SESSION['ide'] ;
        
        $query = "SELECT * FROM usuarios INNER JOIN diario ON usuarios.id_usuario =$a 
            WHERE fechaalterna BETWEEN '$fecha' AND '$fecha2'";
        $result = $conexion->query($query);

        if (!$result){
            echo "no se encontro su nota, puede ser que introdujo mal el nombre o la fecha
            <a href='formulario_buscar.php'>¿intentar buscar de nuevo? </a> <br/> 
            <a href='formulario_buscar.php'>avandonar busqueda </a> <br/>";
        }
        elseif( $result->num_rows){
            $filas = $result->num_rows;
                
                
                echo"Tienes $filas notas esctritas<br/>";
                echo"<br/>";
                for ($j=$filas-1; $j >=0; --$j)
                {
                    $row = $result->fetch_array(MYSQLI_NUM);

                $r0 = htmlspecialchars($row[0]);
                $titulo = htmlspecialchars($row[4]);
                $fecha = htmlspecialchars($row[5]);
                $texto = htmlspecialchars($row[7]);
                echo "Titulo: $titulo</br>" ;
                echo "Texto: $texto</br>" ;
                echo "Fecha : $fecha</br>" ;

                echo <<<_END
                    <form action="eliminar_modificar.php" method="post">
                    <input type='hidden' name='delete' value='yes'>
                    <input type="hidden" name="titulo" value="$titulo">  
                    <input type="hidden" name="texto" value="$texto"> 
                    <input type="hidden" name="fecha" value="$fecha"> 
                    <input type="submit" name="eliminar" value="eliminar">
                    <input type="submit" name="modificar" value="modificar">
                    </form>
                    _END;
                }
                $result->close();
                $conexion->close();
             }
             else {
                echo "no se encontro su nota, puede ser que introdujo mal el nombre o la fecha
                <a href='formulario_buscar.php'>¿intentar buscar de nuevo? </a> <br/> ";
            
             }
    }
    //======================================================================
    //busca solo con la fecha
    elseif (!empty($_POST['BUSCAR'])&&!empty($_POST['fecha'])||!empty($_POST['fecha2']))
    {
        $fecha = $_POST['fecha'];
        $fecha = $_POST['fecha2'];
        $a=$_SESSION['ide'] ;
        $query = "SELECT * FROM diario WHERE id_usuario=$a AND fechaalterna='$fecha'";
        $result = $conexion->query($query);

        if (!$result){
            echo "no se encontro su nota, puede ser que introdujo mal el nombre o la fecha
            <a href='formulario_buscar.php'>¿intentar buscar de nuevo? </a> <br/> 
            <a href='formulario_buscar.php'>avandonar busqueda </a> <br/>";
        }
        elseif( $result->num_rows){
            $filas = $result->num_rows;
                
                
                echo"Tienes $filas notas esctritas<br/>";
                echo"<br/>";
                for ($j=$filas-1; $j >=0; --$j)
                {
                    $row = $result->fetch_array(MYSQLI_NUM);

                $r0 = htmlspecialchars($row[0]);
                $titulo = htmlspecialchars($row[1]);
                $fecha = htmlspecialchars($row[2]);
                $texto = htmlspecialchars($row[4]);
                echo "Titulo: $titulo</br>" ;
                echo "Texto: $texto</br>" ;
                echo "Fecha : $fecha</br>" ;

                echo <<<_END
                    <form action="eliminar_modificar.php" method="post">
                    <input type='hidden' name='delete' value='yes'>
                    <input type="hidden" name="titulo" value="$titulo">  
                    <input type="hidden" name="texto" value="$texto"> 
                    <input type="hidden" name="fecha" value="$fecha"> 
                    <input type="submit" name="eliminar" value="eliminar">
                    <input type="submit" name="modificar" value="modificar">
                    </form>
                    _END;
                }
                $result->close();
                $conexion->close();
             }
             else {
                echo "no se encontro su nota, puede ser que introdujo mal el nombre o la fecha
                <a href='formulario_buscar.php'>¿intentar buscar de nuevo? </a> <br/> ";
            
             }
    }
    

    
    function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }
        
?>