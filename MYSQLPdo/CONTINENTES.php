<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            margin-top: 2%;
        }
        .pais {
            text-align: center;
        }
        td {
            width: 200px;
        }
    </style>
    <title>continentes</title>
</head>

<body>
    <h1>Busca paises por continente</h1>

    <form>
        <select name="continent" required>
            <?php
            try {
                $conn = new PDO("mysql:host=localhost;dbname=world", "alba", "P@ssw0rd");
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage() . "\n";
                exit;
            }
            $query = $conn->prepare("SELECT DISTINCT(`continent`) FROM `country`;");
                $query->execute();
                echo "<option value='' selected disabled hidden>Selecciona un continente</option> ";
                $registre = $query->fetch();
                while ($registre) {
                    echo "<OPTION  value='" . $registre["continent"] . "'>" . $registre["continent"] . "</OPTION>";
                    $registre = $query->fetch();
                }
            
            ?>
        </select>
        <input type='submit' value="Seleccionar">
    </form>
    <hr>

    <table>
        <?php
        if (isset($_GET['continent'])) {
            $continente = $_GET['continent'];
            $consulta = "SELECT `Name`,`Population` FROM `country` WHERE `continent` like \"$continente\"";
            unset($query);
            $query = $conn->prepare($consulta);
            $query->execute();
            echo "<tr><th>Paises en ". $continente ."</th><th>Poblacion</th></tr>";
            $totalPop = 0;
            $registre = $query->fetch();
            
            while ($registre) {
                echo "<tr><td>" .  $registre["Name"] . "</td><td>" .  $registre["Population"] . "</td></tr>";
                $totalPop += $registre["Population"];
                $registre = $query->fetch();
            }
            echo "<tr><td> Total poblacion de ". $continente ."</td><td>" .  $totalPop . "</td></tr>";
        }
        ?>
    </table>
</body>

</html>