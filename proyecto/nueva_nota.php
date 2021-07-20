<?php
require_once 'database.php';
session_start();
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");
    if(!empty($_POST['cancelar'])) {
        die ("<a href='texto_diario.php'> continuar </a> ");}
    if (!empty($_POST['titulo']) &&!empty($_POST['fecha']) &&!empty($_POST['texto'])&&!empty($_POST['fecha2']) )
    {
        
        $titulo = get_post($conexion,'titulo');
        $fecha = get_post($conexion, 'fecha');
        //$contenido = get_post($conexion, 'texto');
        $contenido=$_POST['texto'];
        $fecha2=substr("$fecha",0,10); 
        $ide= $_SESSION['ide'];
        //$contenido= str_replace( "\n", 'cc', $contenido );
        $query = "INSERT INTO diario VALUES ('$ide','$titulo', '$fecha','$fecha2', '$contenido')";
        

        $result = $conexion->query($query);
        
        if (!$result) echo "INSERT FALLO <br><br>";
        else {
            die ("SE GUARDO SU TEXTO <br/>
            <br/><a href='nueva_nota.php'> seguir redactando </a> <br/>
            <br/>   <a href='texto_diario.php'> ver mis notas  </a> ");
        }
    }

function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }
    function mysql_entities_fix_string($conexion, $string)
        {
        return htmlentities(mysql_fix_string($conexion, $string));
        }
    function mysql_fix_string($conexion, $string)
        {
          //if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
        } 
        date_default_timezone_set('America/Lima');
        $fechahora=strftime('%Y-%m-%dT%H:%M',time());
        $fecha=substr("$fechahora",0,10); 
        
        echo <<<_END
    
        <form action="nueva_nota.php" method="post">
        <input type="search" name="titulo"  placeholder="Titulo">
        <input type="hidden" name="fecha2" value="$fecha">  
        <input type="datetime-local" name="fecha" value=$fechahora >
        <br><textarea name="texto" rows="10" cols="50"   placeholder="¿Que paso hoy?"></textarea></br>
        <input type="submit" name="guarda" value="Guardar">
        <input type="submit" name="cancelar" value="cancelar">
        
        </form>
        _END;
?>
        