<?php 
	include "seguridad.php"; 



$dato=mysql_fetch_assoc($result); 



			if ($dato['tipo']!="admin") 
			 {
			 	header("Location:index.php?");
			 }  


			 if (isset($_GET['peli'])) {
			 	
			 	$consultapeliculas="SELECT * FROM peliculas WHERE idPelicula='".$_GET['peli']."';"; 
				$resultpeliculas=mysql_query($consultapeliculas) or die;
				$dato2=mysql_fetch_assoc($resultpeliculas);
			 }

?>


<html> 
	<head> 
			<script type="text/javascript"> 

				function enviar(elemento) 
				{  
					

						document.form.action='editando_pelicula.php'; 

						
						
							elemento.value='Editando';
							elemento.disabled=true;
							document.form.submit(); 
							document.getElementById('editar').disabled=false;
							document.getElementById('editar').value='Editar';
					 

				} 


			</script>
	</head>	 

	<body> 
			<form action="" method="post" name="form"> 

				<label for"titulo"> Titulo de la pelicula</label> <br/>
					<input type="text" id="titulo" name="titulo" value="<?php if (isset($_GET['titulo'])) {
						echo $_GET['titulo'];
					} if(isset($_GET['peli'])) {
						echo $dato2['titulo']; } ?>" /> <br/> <?php if (isset($_GET['repetido'])) {
							echo "Titulo repetido";
						}

						?>
							<label for"director"> Director de la pelicula</label> <br/>
					<input type="text" id="director" name="director" value="<?php if(isset($_GET['peli'])) {
						echo $dato2['director']; } ?>" /> <br/>
 
 						<label for"tematica"> tematica de la pelicula</label> <br/>
					<input type="text" id="tematica" name="tematica" value="<?php if(isset($_GET['peli'])) {
						echo $dato2['tematica']; } ?>"/>  <br/>

						<label for"sinopsis"> Sinopsis de la pelicula</label> <br/>
					<textarea id="sinopsis" name="sinopsis"><?php if(isset($_GET['peli'])) {
						echo $dato2['sinopsis']; } ?></textarea><br/>

						<input type='button' value='Entrar' id='entrar' onclick="enviar(this);" />

						<input type="hidden" name="idpelicula" value="<?php if (isset($_GET['repetido'])) { echo $_GET['repetido']; } else{ echo $_GET['peli'];} ?>" />


			</form>	


	</body>




</html>