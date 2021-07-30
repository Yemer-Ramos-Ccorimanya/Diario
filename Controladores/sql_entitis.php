<?php class entitisM{

static public function mysql_entities_fix_string($conexion, $string)
{
    return htmlentities(mysql_fix_string($conexion, $string));
  }
public function mysql_fix_string($conexion, $string)
{
    //if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $conexion->real_escape_string($string);
  } 
    
}


?>