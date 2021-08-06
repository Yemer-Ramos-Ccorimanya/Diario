
<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class notasM extends ConexionBD{
 
   

     static public function MostrarNotasM($tablaBD, $id){

        $cbd = ConexionBD::cBD();
        $query = "SELECT  * FROM diario WHERE id_usuario=$id ";
      $result = $cbd->query($query);
      return $result;
    }

    static public function BorrarNotasM($datosC, $tablaBD){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        //"DELETE FROM diario WHERE id_usuario=$ide AND titulo='$titulo' AND fecha='$fecha'";
        $query = "DELETE FROM $tablaBD WHERE id_usuario ='$ide' and titulo ='$titulo' and fecha ='$fecha' ";
        $resultado = $cbd->query($query);
        return $resultado;
    }

    static public function CrearNotasM($datosC, $tablaBD){

        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "INSERT INTO diario VALUES ('$ide','$titulo', '$fecha','$fecha2', '$texto')";
        $resultado = $cbd->query($query);
        return $resultado;
    }

    static public function ModificarNotas($datosC, $tablaBD){

        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query ="UPDATE diario SET titulo='$titulo', texto='$texto',fecha='$fecha'
                WHERE id_usuario='$ide' and titulo='$titulo1' and fecha='$fecha1'";;  
        $resultado = $cbd->query($query);
        return $resultado;
    }

    static public function DevolverNotas($dato){
        $cbd = ConexionBD::cBD();
        $query = "SELECT * FROM diario WHERE id_usuario=$dato";
        $result = $cbd ->query($query);
        return $result;
    }

    static public function BuscarNotastituloFecha($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM diario WHERE id_usuario=$ide and titulo='$titulo'and fechaalterna='$fecha'";
        $result = $cbd ->query($query);
        return $result;
    }

    static public function BuscarNotasSolotitulo($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM diario WHERE id_usuario=$ide and titulo='$titulo'";
        $result = $cbd ->query($query);
        return $result;
    }

    static public function BuscarNotasFechayFecha($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM diario 
         WHERE   fechaalterna BETWEEN '$fecha' AND '$fecha2'";
        $result = $cbd ->query($query);
        return $result;
    }
    static public function BuscarNotasSoloFecha($datosC){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "SELECT * FROM diario WHERE id_usuario=$id and fechaalterna='$fecha'";
        $result = $cbd ->query($query);
        return $result;
    }
} 
?>