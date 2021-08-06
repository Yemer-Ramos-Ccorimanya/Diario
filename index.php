<?php //index.php
require_once 'Controladores/rutasC.php';
require_once 'Controladores/adminC.php';

require_once 'Controladores/sql_entitis.php';
require_once 'Controladores/notasC.php';

require_once 'Modelos/rutasM.php';
require_once 'Modelos/adminM.php';

require_once 'Modelos/notasM.php';

$rutas = new RutasControlador();
$plantilla = $rutas->Plantilla();
include $plantilla;

?>