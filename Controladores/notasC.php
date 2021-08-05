<?php 
class notasC {

    public function MostrarnotasC(){
        $ide=$_SESSION['ide'];
        $tablaBD = 'diario';
        $respuesta = notasM::MostrarNotasM($tablaBD,$ide);
        return $respuesta;
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
        if(!empty($_POST['titulo']) &&!empty($_POST['fecha']) &&!empty($_POST['texto'])&&!empty($_POST['fecha2'])){
            $datosC = array(
                        'ide'=> $_SESSION['ide'],
                        'titulo'=>$_POST['titulo'],
                        'fecha2'=>$_POST['fecha2'],
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
            //'fecha'=>$_POST['fecha'],
            'texto'=>$_POST['texto'],
            'titulo1'=>$_POST['titulo'],
           // 'fecha1'=>$_POST['fecha'],
            'texto1'=>$_POST['texto'] 
        );
        
        $tablaBD = 'diario';
        $respuesta=notasM::ModificarNotas($datosC, $tablaBD);
        if(!$respuesta) echo "fallo modificar";

        else echo "se modifico";

    }
    

}
?>