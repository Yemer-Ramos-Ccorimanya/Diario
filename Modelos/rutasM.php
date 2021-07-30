<?php //  Modelos/rutasM.php
class Modelo{
    static public function RutasModelo($rutas){
        if( $rutas == "ingreso" || 
            $rutas == 'empleados' || 
            $rutas == 'registrase' || 
            $rutas == 'salir' ||
            $rutas == 'texto_diario ' ||
            $rutas == 'editar')
        {
            $pagina = "Vistas/modulos/".$rutas. ".php";
        }
        else if($rutas == 'index'){
            $pagina = "Vistas/modulos/ingreso.php";
        }
        else {
            $pagina = "Vistas/modulos/ingreso.php";
        }
        return $pagina;
    }
}
?>