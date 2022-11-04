<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Formulaire d'inscription</title>
</head>

<body>
    <?php
    $servername = 'mysqlapache:3306';
    $username = 'root';
    $password = 'ROOT';
    $DBName = 'liste';

    //On établit la connexion
    $conn = mysqli_connect($servername, $username, $password, $DBName);

    //On vérifie la connexion
    if (!$conn) {
        die('Erreur : ' . mysqli_connect_error());
    }
    echo 'Connexion réussie';

    ?>
    <h1>Liste de course</h1>
    <form action="" method="POST">
        <label for="">Que voulez-vous ajouter à la liste ?</label>
        <br>
        <input type="text" name="element">
        <br />
        <input type="submit" value="Valider" name="validate">
    </form>
    <p>Liste de course</p>

    <?php
    $sqll = "SELECT * FROM liste";
    $result = $conn->query($sqll);

    if ($result->num_rows > 0) {
        // Afficher les résultats de chaque ligne
        while ($row = $result->fetch_assoc()) {
            echo "" . $row["nom"] . "<br>";
        }
    } else {
        echo "0 results";
    }


    if (!empty($_POST['element'])) {
        $nom = ($_POST['element']);

        // Attempt insert query execution
        $sql = "INSERT INTO liste (nom) VALUES ('$nom')";
        if (mysqli_query($conn, $sql)) {
            echo "Records added successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

    ?>
</body>

</html>