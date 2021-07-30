<?php  //Modelos/conexcionBD.php
class ConexionBD{
    static public function cBD(){
        $cbd = new mysqli('localhost','root','','1005920191');
        return $cbd;
    }
}
?>