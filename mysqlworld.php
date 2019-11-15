<html>
 <head>
 	<title>Exemple de lectura de dades a MySQL</title>
 	<style>
 		body{
 		}
 		table,td {
 			border: 1px solid black;
 			border-spacing: 0px;
 		}
 		
 	</style>
 </head>
 
 <body>
 	<h1>Exemple de lectura de dades a MySQL</h1>
 	
 
 	<?php
 		
 		$conn = mysqli_connect('localhost','alba','P@ssw0rd');
 
 		
 		mysqli_select_db($conn, 'world');
 
 		# (2.1) creem el string de la consulta (query)
 		$consulta = "SELECT name,code,code2 FROM country;";
 		$count_countries= "SELECT count(*) FROM country;";
 		# (2.2) enviem la query al SGBD per obtenir el resultat
 		$resultat = mysqli_query($conn, $consulta);
 
 		# (2.3) si no hi ha resultat (0 files o bé hi ha algun error a la sintaxi)
 		#     posem un missatge d'error i acabem (die) l'execució de la pàgina web
 		if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}
 	?>
 	

 	<!-- (3.1) aquí va la taula HTML que omplirem amb dades de la BBDD -->
 	<table>
 	<!-- la capçalera de la taula l'hem de fer nosaltres -->
 	<thead><td colspan="4" align="center" bgcolor="cyan">Llistat de ciutats</td></thead>
 	<?php
 		echo "<form method='POST' action='action_world.php' >";
 		$countFilas=0;
 		//echo "<select name='name'>";
 		
 		while( $registre = mysqli_fetch_assoc($resultat) )
 		{	
 			$imagen=strtolower($registre['code2']);
 			# els \t (tabulador) i els \n (salt de línia) son perquè el codi font quedi llegible
  			if ($countFilas==0) {
  				echo "<tr>";
  			}elseif ($countFilas%12==0) {
  				echo "</tr>";
  				echo "<tr>";
  			}
 			# (3.3) obrim fila de la taula HTML amb <tr>
 			
 			
 			# (3.4) cadascuna de les columnes ha d'anar precedida d'un <td>
 			#	després concatenar el contingut del camp del registre
 			#	i tancar amb un </td>
 			//echo "<option data-icon='./flags/".$imagen.".png' value='".$registre['code']."'>".$registre['name']."</option>";
 			echo "<td>";
 			echo "<input type='radio' value='".$registre['code']."' name='name'>".$registre['name']."</input>";
 			echo "<img src='./flags/".$imagen.".png'>";
 			
 			echo "</td>";
 			
 			

 			$countFilas+=1;

 			
 
 			# (3.5) tanquem la fila
 			
 		}
 		//echo "</select>";
 		
 		echo "<br>";
 		
 		echo "<input type=submit name='pais'></input>";
 		echo "</form>";
 	?>
  	<!-- (3.6) tanquem la taula -->

 	</table>
 	
 </body>
</html>