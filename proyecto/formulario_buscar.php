<?php 
  date_default_timezone_set('America/Lima');
  $fechahora=strftime('%Y-%m-%dT%H:%M:%S',time());
  $fecha=substr("$fechahora",0,10);
echo <<<_END
    
<form action="buscar.php" method="post">
<input type="search" name="titulo"  placeholder="buscar Texto">
<input type="date" name="fecha" >
<input type="date" name="fecha2" >
<input type="submit" name="BUSCAR" value="BUSCAR">
</form>
_END;

?>