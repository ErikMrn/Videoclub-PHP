
<?php 

include "seguridad.php"; 



$dato=mysql_fetch_assoc($result); 

			if ($dato['tipo']!="admin") 
			 {
			 	header("Location:index.php");
			 } 




?> 

<html> 
		<head> 

			<script type="text/javascript"> 


			</script>


		</head>

		<body> 
				<?php
				
				echo "<p> Bienvenido usuario <strong> ".$dato["usuario"]."</strong> </p>"; 

				echo "<table border=1> 
						<legend> Listado de las peliculas </legend>
						<tr> <td> id </td> <td> Titulo </td> <td> </td> 
						</tr>

						"; 

				$consultapeliculas="SELECT * FROM peliculas;"; 
				$resultpeliculas=mysql_query($consultapeliculas) or die;

				while ($datopeliculas=mysql_fetch_assoc($resultpeliculas)) 
				{
				 	echo "<tr> <td>".$datopeliculas["idPelicula"]."</td> <td>".$datopeliculas["titulo"]."</td> <td> <a href='editar_peliculas.php?peli=".$datopeliculas['idPelicula']."'> Editar </a> <br/> <a href='borrar_peliculas.php'> Borrar </a> </td> </tr>"  ; 

				 	

				 } 

				 echo "</table>";



				?>
		</body>

</html> 

