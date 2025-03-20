<?php

$estAuthentifie = false;
$mauvaisMotDePasse = false;

$motDePasse = 'abricot';

if (isset($_POST['mot_de_passe'])) {
    if ($_POST['mot_de_passe'] === $motDePasse) {
        $estAuthentifie = true;
    } else {
        $mauvaisMotDePasse = true;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page secrète</title>
    <link rel="stylesheet" href="../water.css">
</head>
<body>
    <nav>
        <a href="../index.php">Retour</a>
    </nav>
    <h1>Page secrète</h1>
    <?php
        if ($estAuthentifie) {
            echo "<p>Bravo! Vous avez trouvé le mot de passe!</p>";
        } else if ($mauvaisMotDePasse) {
            echo "<p>Mot de passe incorrect.</p>";
        } else {
            ?>
            <form action="page_secrete.php" method="post">
                <label for="mot_de_passe">Mot de passe:</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe">
                <button type="submit">Envoyer</button>
            </form>
            <?php
        }
    ?>
</body>
</html>
