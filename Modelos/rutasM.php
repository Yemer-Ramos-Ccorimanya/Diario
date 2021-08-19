<?php //  Modelos/rutasM.php
class Modelo{
    static public function RutasModelo($rutas){
        if( $rutas == "ingreso" || 
            $rutas == "comentar_notas" || 
            $rutas == "notas_publicas" || 
            $rutas == 'registrese' || 
            $rutas == 'ver_reacciones' || 
            $rutas == 'registrar_datos' || 
            $rutas == 'salir' ||
            $rutas == 'buscar' ||
            $rutas == 'reaccionar' ||
            $rutas == 'menu' ||
            $rutas == 'texto_diario' ||
            $rutas == 'editar'||
            $rutas == 'eliminar'||
            $rutas == 'ver_comentarios'||
            $rutas == 'modificar_nota'||
            $rutas == 'crear_nueva_nota')

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