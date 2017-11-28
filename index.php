<html> 
	
	<head> 

		<script type="text/javascript"> 

				function enviar(elemento) 
				{  
					if (elemento) 
					{

						document.getElementById('form').action='inicio_sesion.php'; 

						if (todocorrecto) 
						{
							document.getElementById('entrar').value='Entrando';
							document.getElementById('entrar').disabled=true;
							document.form.submit(); 
							document.getElementById('entrar').disabled=false;
							document.getElementById('entrar').value='Entrar';
						}
					} 

					else 
					{
						document.getElementById('form').action='registro_usuario.php'; 
						document.getElementById('registrar').disabled=true;
						document.form.submit();
						document.getElementById('registrar').disabled=false;
					}

				} 

				function todocorrecto()
				{ 

					var usuario=document.getElementById('usuario').value; 

					if (usuario=='' || usuario==null) 
					{
						return false;

					} 

					var clave=document.getElementById('clave').value; 

					if (clave=='' || clave==null) 
					{
						return false;

					} 

					return true;
				}

		</script>


	</head>

	<body onload='documentById('entrar').disabled=false;'>  

		<?php
		if (isset($_GET['error'])) 
		{	
			echo "Error, no se ha logueado correctamente";
		} 

		if (isset($_GET['correcto'])) {
			include 'seguridad.php';
			echo "Bienvenido ".$_GET['correcto']."&nbsp;-&nbsp;"."<a href='index.php'>Salir</a>"; 

			$dato=mysql_fetch_assoc($result); 

			if ($dato['tipo']=="admin") 
			 {
			 	echo "<p><a href='gest_peliculas.php'>Gestion de peliculas </a></p>";
			 } 

			
		}
		else 
		{
		?>
			<form action="" method='post' name='form' id='form'>  

				<table> 
						<tr> 
							<td> <label for='usuario'> Usuario: </label> </td> 
							<td> <input type='text' name='usuario' id='usuario' value=""/> </td> 

						</tr> 

						<tr> 
							<td> <label for='clave'> Clave </label> </td> 
							<td> <input type='text' name='clave' id='clave' value=""/> </td> 

						</tr> 

						<tr>
							<td><input type='button' value='Entrar' id='entrar' onclick='enviar(true);'/> <input type='button' value='Registrar' id='registrar' onclick='enviar(false);'/> </td>
						</tr>
				</table>

			</form> 

		<?php 
			} 
		?>

	</body>	


</html>