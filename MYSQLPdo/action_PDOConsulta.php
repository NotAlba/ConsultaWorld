<!DOCTYPE html>
<html>
	<style type="text/css">
		table {
            margin-left: auto;
            margin-right: auto;
        }
        .continent{
        	text-align: center;

        }

	</style>
<head>
	<title></title>
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
	?>
</head>
<body>
	<table>
	<?php 
	echo "<p class='continent'><b>".$_POST['continent']."</b><p>";
		if (!empty($_POST['continent'])){
			$Poblacio=0;
			$Continent= $_POST['continent'];
			$consulta2= $conn->prepare("SELECT `Name`,`Population` FROM `country` WHERE `continent`='".$Continent."';");
			$registre = $consulta2 -> execute();
			
			

			while ($registre) {

				

				echo "<tr> ";
				echo "<td>" .  $registre["Name"] . "</td><td>" .  $registre["Population"] . "</td>";
				echo "</tr>";
                $Poblacio += $registre["Population"];
                $registre = $consulta2->fetch();
				
			}
			echo "<tr><td><b> Total poblacion de ". $Continent ."</td><td><b> " .  $Poblacio . "</b></td></tr>";

		}


	  ?>
	</table>

</body>
</html>