<?php 


	
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
		
		$consulta="SELECT * From usuarios WHERE usuario='".$_POST['usuario']."' And clave='".
		md5($_POST['clave'])."';";

		$resultado=mysql_query($consulta) or die ("Imposible consultar: ".mysql_error());
		if(mysql_num_rows($resultado)>0)
		{
			mysql_free_result($resultado);
			mysql_close();
			
			session_name('LoginUsuario');
			session_start();
			$_SESSION['usuario']=$_POST['usuario'];
			$_SESSION['clave']=md5($_POST['clave']);
			$_SESSION['ultimoAcceso']=date('h:i:s');
			header("Location: index.php?correcto=".$_POST["usuario"]);		
		} else {
			header('Location: index.php?error=0');
		}


?>