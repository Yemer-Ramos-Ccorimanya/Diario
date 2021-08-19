
<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class notasM extends ConexionBD{
 

    static public function MostrarNotasM($tablaBD, $id){

        $cbd = ConexionBD::cBD();
        $query = "SELECT  * FROM diario WHERE id_usuario=$id
        ORDER BY fecha DESC ";
        $result = $cbd->query($query);
        return $result;
    }

    static public function MostrarNotasPublicasM(){

        $cbd = ConexionBD::cBD();
        $query = "SELECT  * FROM diario  where condicion= 'publico'
        ORDER BY fecha DESC ";
        $result = $cbd->query($query);
        return $result;
    }

    static public function BorrarNotasM($datosC, $tablaBD){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $titulo1=notasC::mysql_fix_string($cbd,$titulo);
        //"DELETE FROM diario WHERE id_usuario=$ide AND titulo='$titulo' AND fecha='$fecha'";
        $query = "DELETE FROM $tablaBD WHERE id_usuario ='$ide' and titulo ='$titulo1' and fecha ='$fecha' ";
        $resultado = $cbd->query($query);
        return $resultado; 
    }

    static public function CrearNotasM($datosC, $tablaBD){

        $cbd = ConexionBD::cBD();
        extract($datosC);
        $titulo1=notasC::mysql_fix_string($cbd,$titulo);
        $texto1=notasC::mysql_fix_string($cbd,$texto);
        $query = "INSERT INTO diario VALUES ('$ide','$titulo1', '$fecha','$fecha2', '$texto1','$condicion','$autor')";
        $resultado = $cbd->query($query);
        return $resultado;
    }

    static public function ComentariosM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $titulo1=notasC::mysql_fix_string($cbd,$titulo);
        $texto1=notasC::mysql_fix_string($cbd,$texto);
        $query = "INSERT INTO comentarios (id_texto, id_usuario,fecha_texto,fecha_comentario,texto,titulo_texto,nombre_usuario) 
        VALUES ('$ide_texto','$ide_usuario', '$fecha_texto','$fecha_comentario', '$texto','$titulo','$nombre_usuario')";
        $resultado = $cbd->query($query);
        return $resultado;
    }


    static public function ModificarNotas($datosC, $tablaBD){

        $cbd = ConexionBD::cBD();
        extract($datosC);
        $titulo2=notasC::mysql_fix_string($cbd,$titulo);
        $texto2=notasC::mysql_fix_string($cbd,$texto);
        $query ="UPDATE diario SET titulo='$titulo2', texto='$texto2',fecha='$fecha', condicion='$condicion'
                WHERE id_usuario='$ide' and titulo='$titulo1' and fecha='$fecha1'";;  
        $resultado = $cbd->query($query);
        return $resultado;
    }

    static public function DevolverNotas($dato){
        $cbd = ConexionBD::cBD();
        $query = "SELECT * FROM diario WHERE id_usuario=$dato
        ORDER BY fecha DESC";
        $result = $cbd ->query($query);
        return $result;
    }

    static public function BuscarNotastituloFecha($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $titulo1=notasC::mysql_fix_string($cbd,$titulo);
        $query = "SELECT * FROM diario WHERE id_usuario=$ide and titulo='$titulo1'and fechaalterna='$fecha'";
        $result = $cbd ->query($query);
        return $result;
    }

    static public function BuscarNotasSolotitulo($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $titulo1=notasC::mysql_fix_string($cbd,$titulo);
        $query = "SELECT * FROM diario WHERE id_usuario=$ide and titulo='$titulo1'";
        $result = $cbd ->query($query);
        return $result;
    }

    static public function BuscarNotasFechayFecha($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM diario 
         WHERE id_usuario=$ide AND  fechaalterna BETWEEN '$fecha' AND '$fecha2'";
        $result = $cbd ->query($query);
        return $result;
    }
    static public function BuscarNotasSoloFecha($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM diario WHERE id_usuario=$ide and fechaalterna='$fecha'";
        $result = $cbd ->query($query);
        return $result;
    }

    static public function Ver_ComentariosM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM comentarios WHERE id_texto=$ide_nota and fecha_texto='$fecha_texto' and titulo_texto='$titulo'";
        $result = $cbd ->query($query);
        return $result;
    }

    static public function ReaccionesM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "INSERT INTO reaccion (id_texto, id_usuario,fecha_texto,titulo_texto,reaccion,fecha_reaccion,autor) 
        VALUES ('$ide_texto','$ide_usuario', '$fecha_texto','$titulo','$reaccion','$fecha_reaccion','$autor')";
        $resultado = $cbd->query($query);
        return $resultado;
    }

    static public function Ver_ReaccionesM($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM reaccion WHERE id_texto=$ide_nota and fecha_texto='$fecha_texto' and titulo_texto='$titulo'";
        $result = $cbd ->query($query);
        return $result;
    }
 
}

?>