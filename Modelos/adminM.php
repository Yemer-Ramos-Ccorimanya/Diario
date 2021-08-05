<?php  //Modelos/adminM.php
    require_once "conexionBD.php";

    class AdminM extends ConexionBD{
        static public function IngresoM($datosC, $tablaBD){
            $cbd = ConexionBD::cBD();
            $usuario = $datosC['usuario'];
            $clave = $datosC['contraseña'];

            $un_temp =  $datosC['usuario'];
            $pw_temp =  $datosC['contraseña'];
            $query   = "SELECT * FROM $tablaBD WHERE usuario='$un_temp'";
            $result  = $cbd ->query($query);
            return $result;
            
            
            
        }
        static public function RegistroM($datosC, $tablaBD){
            $cbd = ConexionBD::cBD();
            $usuario =   $datosC['usuario'];
            $clave =  $datosC['clave'];
            $password = password_hash($clave, PASSWORD_DEFAULT);
            $query="INSERT INTO  $tablaBD (usuario,contraseña)  VALUES ('$usuario','$password')";
            return $result = $cbd->query($query);
            
        }

        
        
        
    
    }

   
?>