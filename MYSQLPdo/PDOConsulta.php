<!DOCTYPE html>
<html>
<head>
	<title>Select continents</title>

	<?php
				$servername = "localhost";
				$username = "alba";
				$password = "P@ssw0rd";

				try {
				    $conn = new PDO("mysql:host=$servername;dbname=world", $username, $password);
				    
				}catch(PDOException $e)
				    {
				    echo "Connection failed: " . $e->getMessage();
				    exit;
				    }
				$consulta = $conn->prepare("SELECT continent FROM country GROUP BY continent;");
				$consulta->execute();
				$registre = $consulta -> execute();



				?>
</head>
<body>
	<h1>Paisos per continent</h1>
	<label>Selecciona un continent</label>
	<form method="POST" action="action_PDOConsulta.php">
		<select>
			<?php  
			while ($registre){
				echo "<option value='".$registre['continent']."' name='continent'>".$registre['continent']." </option>";
				echo $registre['continent'];
				$registre = $consulta->fetch();
			}
			?>							
		</select>
		<input type='submit' value="Buscar">
	</form>

</body>
</html>