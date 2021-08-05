<?php   

date_default_timezone_set('America/Lima');
        $fechahora=strftime('%Y-%m-%dT%H:%M',time());
        $fecha=substr("$fechahora",0,10); 

        echo <<<_END
    
        <form method="post" action= "">
            <input type="search" name="titulo"  placeholder="Titulo">
            <input type="hidden" name="fecha2" value="$fecha">  
            <input type="datetime-local" name="fecha" value=$fechahora >
            <br><textarea name="texto" rows="10" cols="50"   placeholder="¿Que paso hoy?"></textarea></br>
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
 
    
        
