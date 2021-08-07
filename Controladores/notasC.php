<?php 
class notasC {

    public function MostrarNotasC2($respuesta){
        
        $filas = $respuesta ->num_rows;

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
          <form method="post" action= "">
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
    public function MostrarnotasC(){

        $ide=$_SESSION['ide'];
        $tablaBD = 'diario';
        $respuesta = notasM::MostrarNotasM($tablaBD,$ide);
        $filas = $respuesta ->num_rows;

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
          <form method="post" action= "">
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

    public function BorrarNotasC(){
            $datosC = array(
                        'ide'=> $_SESSION['ide'],
                        'titulo'=>$_POST['titulo'],
                        'fecha'=>$_POST['fecha'],
                        'texto'=>$_POST['texto'] 
                    );
                    
            $tablaBD = 'diario';
            $respuesta=notasM::BorrarNotasM($datosC, $tablaBD);
            if(!$respuesta) echo "fallo borrar";
            
            else echo "se borro";
        
    }

    public function  CrearNotasC(){
        session_start();
        if(!empty($_POST['titulo']) &&!empty($_POST['fecha']) &&!empty($_POST['texto'])){
            $fechahora= $_POST['fecha'];
            $fecha=substr("$fechahora",0,10); 
            $datosC = array(
                        'ide'=> $_SESSION['ide'],
                        'titulo'=>$_POST['titulo'],
                        'fecha2'=>$fecha,
                        'fecha'=>$_POST['fecha'],
                        'texto'=>$_POST['texto'] 
                    );
                    
            $tablaBD = 'diario';
            $respuesta = notasM::CrearNotasM($datosC, $tablaBD);
            if(!$respuesta) echo "fallo registro";
            
            else echo "se registro";
        
        }
    }

    public function ModificarNotasC(){
        session_start();
        $datosC = array(
            'ide'=> $_SESSION['ide'],
            'titulo'=>$_POST['titulo'],
            'fecha'=>$_POST['fecha'],
            'texto'=>$_POST['texto'],
            'titulo1'=>$_POST['titulo2'],
            'fecha1'=>$_POST['fecha2'],
            'texto1'=>$_POST['texto'] 
        );
        
        $tablaBD = 'diario';
        $respuesta=notasM::ModificarNotas($datosC, $tablaBD);
        if(!$respuesta) echo "fallo modificar";

        else echo "se modifico";

    }

    public function BuscarNotasTituloFechaC(){
        session_start();

            $datosC = array(
                'ide'=> $_SESSION['ide'],
                'titulo'=>$_POST['titulo'],
                'fecha'=>$_POST['fecha'] 
            );
            
            $tablaBD = 'diario';
            $respuesta=notasM::BuscarNotastituloFecha($datosC);
             return $respuesta;     
    }
    public function BuscarNotasTituloC(){
        session_start();
                $datosC = array(
                    'ide'=> $_SESSION['ide'],
                    'titulo'=>$_POST['titulo']
                );
                $respuesta=notasM::BuscarNotasSolotitulo($datosC); 
                
             
                
    }
    public function BuscarNotasFechFechaC(){
                    $datosC = array(
                        'ide'=> $_SESSION['ide'],
                        'fecha'=>$_POST['fecha'],
                        'fecha2'=>$_POST['fecha2'] 
                    );
                    
                    $tablaBD = 'diario';
                    $respuesta=notasM::BuscarNotasFechayFecha($datosC, $tablaBD);
                    return $respuesta;
    }
    public function BuscarNotasFechaC(){

        
                    $datosC = array(
                            'ide'=> $_SESSION['ide'],
                            'fecha'=>$_POST['fecha']
                        );
                    $tablaBD = 'diario';
                    $respuesta=notasM::BuscarNotasSoloFecha($datosC, $tablaBD);
                    return $respuesta;
        
    }
    


}
?>