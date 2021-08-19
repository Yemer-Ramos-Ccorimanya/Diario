<?php session_start();?>
<nav>  <!-- modulos/menu.php -->

	<ul>
			<?php if (empty($_SESSION['Ingreso'])){?>
			<li><a href="index.php?ruta=registrese"> registrarse </a></li>
			<li><a href="index.php?ruta=ingreso"> ingreso</a></li>
			<?php }
			
			else { ?>
			<li><a href="index.php?ruta=registrar_datos"> registra datos</a></li>
			<li><a href="index.php?ruta=notas_publicas">notas de amigos</a></li>
			
			<li><a href='index.php?ruta=salir'>Salir</a></li>
			<li><a href='index.php?ruta=buscar'>buscar</a></li>
			<li><a href='index.php?ruta=texto_diario'>mis notas</a></li>
			<li><a href='index.php?ruta=crear_nueva_nota'>nuevo</a></li>
			<?php } ?>
		
		

	</ul>
</nav>