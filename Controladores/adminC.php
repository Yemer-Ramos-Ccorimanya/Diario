<?php  //Controladores/adminC.php
class AdminC{
    public function IngresoC(){
        
        session_start();
        if(isset($_SESSION['Ingreso'])) header("location: index.php?ruta=texto_diario");

        if (!empty($_POST['usuarioI'])&& !empty($_POST['claveI']))
        {
            $datosC = array(    
                        "usuario"=>$_POST["usuarioI"], 
                        "contraseña"=>$_POST["claveI"]);

            $tablaBD = "usuarios";

            $respuesta = AdminM::IngresoM($datosC, $tablaBD);

            if (!$respuesta) echo"Usuario no encontrado";
           
            elseif ($respuesta->num_rows)
            {
                $pw_temp=$_POST['claveI'];
                $row = $respuesta->fetch_array(MYSQLI_NUM);
                $respuesta->close();
                if (password_verify($pw_temp, $row[1])){
                  
                    $_SESSION['nombre']=$row[0];
                    $_SESSION['ide']=$row[2];

                    //cookie
                    setcookie('nombre',$_SESSION['nombre'],time()+ 5);
                    $GLOBALS['entrada']=true;
                    $_SESSION['Ingreso']=true;
                    header("location: index.php?ruta=texto_diario");
                    
                }
                
                else{
              
                    echo "no se puedo registrar las contraseñas no coenciden intente de nuevo";
                }
        }

        else {
            echo "no se puedo registrar las contraseñas no coenciden intente de nuevo";
        }

        
    }
        
}      
    public function RegistroC(){

        session_start();
        if(isset($_SESSION['Ingreso']))
            header("location:index.php?ruta=registrarse");
        if(isset($_POST["usuarioI"])){
            if($_POST['clave2']==$_POST['claveI'])
            {
                    $datosC = array(    
                                "usuario"=>$_POST["usuarioI"], 
                                "clave"=>$_POST["claveI"]);
                                
                    $tablaBD = "usuarios";
                    $respuesta = AdminM::RegistroM($datosC, $tablaBD);
                    if (!$respuesta) die("no se puedo registrar <a href='./index.php'>volvel a registrarce</a>");
                   
                    else {
                        
                        $_SESSION['Ingreso']=true;
                        header("location: index.php?ruta=texto_diario");
                    }

            }

            else
            {
                echo "no se puedo registrar las contraseñas no coenciden intente de nuevo";
            }
        }
    }

     
}
?>