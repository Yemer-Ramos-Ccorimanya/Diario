<?php 
class notasC {


     static public function mysql_entities_fix_string($conexion, $string){

        return htmlentities(mysql_fix_string($conexion, $string));

    }

    static public function mysql_fix_string($conexion, $string){
        
          //if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);

    } 
    static public function salir(){
        session_destroy();
  } 

    static public function get_post($con, $var){

        return $con->real_escape_string($_POST[$var]);

    }
    
    public function MostrarComentarios($respuesta){
        
        $filas = $respuesta ->num_rows;

        echo"Tienes $filas notas esctritas<br/>";
        echo"<br/>";
        
        for ($j=$filas; $j>0;--$j)
        {
          
          $row = $respuesta -> fetch_array(MYSQLI_NUM);
            
              
          $r0 = htmlspecialchars($row[0]);
          $fecha = htmlspecialchars($row[4]);
          $texto = htmlspecialchars($row[5]);
          $autor = htmlspecialchars($row[7]);
          
          echo "fecha: $fecha</br>" ;
          echo "comentario: $texto</br>" ;
          echo "autor: $autor</br>" ;

          echo"</br>";
            
          

    }
    }

    public function MostrarReacciones($respuesta){
        
        $filas = $respuesta ->num_rows;

        echo"Tienes $filas notas esctritas<br/>";
        echo"<br/>";
        
        for ($j=$filas; $j>0;--$j)
        {
          
          $row = $respuesta -> fetch_array(MYSQLI_NUM);
            
              
          $r0 = htmlspecialchars($row[0]);
          $fecha = htmlspecialchars($row[6]);
          $texto = htmlspecialchars($row[5]);
          $autor = htmlspecialchars($row[7]);
          
          echo "fecha: $fecha</br>" ;
          echo "reaccion: $texto</br>" ;
          echo "autor: $autor</br>" ;

          echo"</br>";
            
          

    }
    }

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
          $condicion = htmlspecialchars($row[5]);
         
            echo "Titulo: $titulo</br>" ;
            echo "Texto: $texto</br>" ;
            echo "Fecha : $fecha</br>" ;
            echo "tipo : $condicion</br>" ;
            echo <<<_END
            <form method="post" action= "">
                <input type='hidden' name='delete' value='yes'>
                <input type="hidden" name="titulo" value="$titulo">  
                <input type="hidden" name="texto" value="$texto"> 
                <input type="hidden" name="fecha" value="$fecha"> 
                <input type="hidden" name="condicion" value="$condicion"> 
                <input type="submit" name="eliminar" value="eliminar">
                <input type="submit" name="modificar" value="modificar">
            </form>
_END;
            
        }
}  
public function Mostrarnotas_PublicasC(){

    $tablaBD = 'diario';
    $respuesta = notasM::MostrarNotasPublicasM($tablaBD);
    $filas = $respuesta ->num_rows;

    echo"Tienes $filas notas esctritas<br/>";
    echo"<br/>";
    
    for ($j=$filas; $j>0;--$j)
    {
      
      $row = $respuesta -> fetch_array(MYSQLI_NUM);
        
          
      $romel= htmlspecialchars($row[0]);
      $titulo = htmlspecialchars($row[1]);
      $fecha = htmlspecialchars($row[2]);
      $texto = htmlspecialchars($row[4]);
      $condicion = htmlspecialchars($row[5]);
      $autor = htmlspecialchars($row[6]);
      //$_SESSION['id_nota']=$romel;
      
        echo "Titulo: $titulo</br>" ;
        echo "Texto: $texto</br>" ;
        echo "Fecha : $fecha</br>" ;
        echo "Autor : $autor</br>" ;
        echo <<<_END
        <form method="post" action= "">
            <input type='hidden' name='delete' value='yes'>
            <input type="hidden" name="titulo" value="$titulo">  
            <input type="hidden" name="id_nota" value="$romel">  
            <input type="hidden" name="texto" value="$texto"> 
            <input type="hidden" name="fecha" value="$fecha"> 
            <input type="submit" name="comentar" value="comentar">
            <input type="submit" name="ver_comentarios" value="ver comentario">
            <input type="submit" name="reaccionar" value="reaccionar">
            <input type="submit" name="ver_reacciones" value="ver reacciones">
        </form>
_END;
echo "</br>" ;
        
    }
} 
public function formularioModificar(){

    date_default_timezone_set('America/Lima');
     $fechahora=strftime('%Y-%m-%dT%H:%M',time());

if(empty($_POST['titulo2'])){
    $titulo12=$_POST['titulo'];
    $texto12=$_POST['texto'];
    $fecha12=$_POST['fecha'];
    $condicion12=$_POST['condicion'];
    echo "Titulo: $titulo12</br>" ;
    echo "Fecha : $fecha12</br>" ;
    echo <<<_END
    <form method="post" action= "">
    <input type="search" name="titulo"  placeholder="Titulo" value='$titulo12' >
    <input type="datetime-local"  name="fecha" value= $fechahora >
    <input type="hidden" name="fecha2" value="$fecha12">  
    <input type="hidden" name="titulo2" value="$titulo12">  
    <br><textarea name="texto"  cols="100" rows="10" wrap="hard"  placeholder="¿Que paso hoy?">$texto12</textarea></br>
    privado <input type="radio" name="condicion" value="privado" checked="checked">
    publico <input type="radio" name="condicion" value="publico">
    <input type="submit" name="modificar" value="modificar">
    <input type="submit" name="cancelar" value="cancelar">
    </form>
_END;
}
if(!empty($_POST['titulo2'])){
        $datosC = array(
            'ide'=> $_SESSION['ide'],
            'titulo'=>$_POST['titulo'],
            'fecha'=>$_POST['fecha'],
            'texto'=>$_POST['texto'],
            'titulo1'=>$_POST['titulo2'],
            'fecha1'=>$_POST['fecha2'],
            'texto1'=>$_POST['texto'],
            'condicion1'=>$_POST['condicion'],
            'condicion'=>$_POST['condicion']

        );
        
        $tablaBD = 'diario';
        $respuesta=notasM::ModificarNotas($datosC, $tablaBD);
        if(!$respuesta) echo "fallo modificar";

}}

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
                            'autor'=>$_POST['autor'],
                            'fecha2'=>$fecha,
                            'fecha'=>$_POST['fecha'],
                            'texto'=>$_POST['texto'],
                            'condicion'=>$_POST['condicion']
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
            'texto1'=>$_POST['texto'],
            'condicion1'=>$_POST['condicion'],
            'condicion'=>$_POST['condicion']

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
    
    
   
    public function  ComentariosC(){
        if(!empty($_POST['texto'])){
            $fechahora= $_POST['fecha_comentario'];
             

                $datosC = array(
                            'ide_texto'=> $_POST['ide_nota'],
                            'ide_usuario'=> $_POST['id_usuario'],
                            'nombre_usuario'=> $_POST['nombre_usuario'],
                            'titulo'=>$_POST['titulo'],
                            'fecha_comentario'=>$fechahora,
                            'fecha_texto'=>$_POST['fecha_texto'],
                            'texto'=>$_POST['texto'],
                            
                        );
            
            $respuesta = notasM::ComentariosM($datosC);
            if(!$respuesta) echo "fallo registro";
            
            else echo "se registro";
        
        }
    }

public function Ver_ComentariosC(){
    if(!empty($_POST['ver_comentarios'])){

            $datosC = array(
                        
                        'ide_usuario'=> $_POST['id_usuario'],
                        'titulo'=>$_POST['titulo'],
                        'fecha_texto'=>$_POST['fecha_texto'],
                        
                        
                    );
                    $respuesta = notasM::Ver_ComentariosM($datosC);
                    if(!$respuesta) echo "fallo registro";

                }
            }


public function  ReaccionesC(){
    if(!empty($_POST['reaccion'])){
        $fechahora= $_POST['fecha_reaccion'];
         

            $datosC = array(
                        'ide_texto'=> $_POST['ide_nota'],
                        'ide_usuario'=> $_POST['id_usuario'],
                        'autor'=> $_POST['nombre_usuario'],
                        'titulo'=>$_POST['titulo'],
                        'fecha_reaccion'=>$fechahora,
                        'fecha_texto'=>$_POST['fecha_texto'],
                        'reaccion'=>$_POST['reaccion'],
                        
                    );
        
        $respuesta = notasM::ReaccionesM($datosC);
        if(!$respuesta) echo "fallo registro";
        
        else echo "se registro";
    
    }
}
}
?>