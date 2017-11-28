<?php 
	include "seguridad.php"; 

	$dato=mysql_fetch_assoc($result); 

			if ($dato['tipo']!="admin") 
			 {
			 	header("Location:index.php?");
			 }  

	$consultarepetido="SELECT * FROM peliculas WHERE titulo='".$_POST['titulo']."';"; 
	$resultadorepetido=mysql_query($consultarepetido); 
	  

	

	if (mysql_num_rows($resultadorepetido)>0) {
		
		header("Location:editar_peliculas.php?repetido=".$_POST['idpelicula']."&titulo=".$_POST['titulo']); 
		
		die;

	} 
	else 
	{ 

		
		$consultanueva="UPDATE peliculas SET titulo='".$_POST['titulo']."', director='".$_POST['director']."', sinopsis='".$_POST['sinopsis']."', tematica='".$_POST['tematica']."' WHERE idPelicula=".$_POST['idpelicula'].";";
		$resultadonuevo=mysql_query($consultanueva);
		
		header("Location: gest_peliculas.php");
	}


	?>