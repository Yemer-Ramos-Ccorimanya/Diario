<?php   

        date_default_timezone_set('America/Lima');
        $fechahora=strftime('%Y-%m-%dT%H:%M',time());
        $fecha=substr("$fechahora",0,10); 
        $autor=$_SESSION['nombre'];
        echo <<<_END
    
        <form method="post" action= "">
            <input type="search"  name="titulo"  placeholder="Titulo" required>
            <input type="hidden" name="fecha2" value="$fecha" >  
            <input type="datetime-local" name="fecha" value=$fechahora >
            <input type="hidden" name="autor" value="$autor">
            <br><textarea name="texto" required rows="10" cols="50" placeholder="¿Que paso hoy?"></textarea></br>
            privado <input type="radio" name="condicion" value="privado" checked="checked">
            publico <input type="radio" name="condicion" value="publico">
            <input type="submit" name="guarda" value="Guardar">
            <input type="submit" name="cancelar" value="cancelar">
            

        </form>
_END;

if(!empty($_POST['guarda'])){

    $ingreso = new notasC();
    $ingreso->CrearNotasC();
    header("location: index.php?ruta=texto_diario");
    }

  ?>      
 
    
        
