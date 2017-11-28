<?php
	
	function esta_bd($usu,$pass)
	{
		
		
		$consulta="SELECT * From usuarios WHERE usuario='".$usu."' And clave='".$pass."';";
		$resultado=mysql_query($consulta) or die ("Imposible consultar: ".mysql_error());
		
		return $resultado;
	}

	session_name('LoginUsuario');
	@session_start();
	
	if (isset($_SESSION['usuario']) && isset($_SESSION['clave']))
	{
		$conexion=mysql_connect('localhost','jose','josefa');
		if (!$conexion)
		{
			die('Imposible conectar. Error n&uacutemero '.mysql_errno().': '.mysql_error());
		}
		$bd_seleccionada=mysql_select_db('videoclub');
		if(!$bd_seleccionada)
		{
			die('Imposible abrir la BBDD:'.mysql_error());
		}
		
		$result=esta_bd($_SESSION['usuario'],$_SESSION['clave']);
		if(mysql_num_rows($result)<=0)
		{
			
			header("Location: index.php?");
			die;
		}
		else
		{
			$h_inicio=$_SESSION['ultimoAcceso'];
			$h_actual=date('h:i:s');
			$tiempo=strtotime($h_actual)-strtotime($h_inicio);
			if ($tiempo>60*10)
			{
				session_destroy();
				header("Location: index.php?in=0");
				die;
			}
			else
			{
				$_SESSION['ultimoAcceso']=$h_actual;
			}
		}
	}
	else
	{
		session_destroy();
		header("Location: index.php?");
		die;
	}
?>