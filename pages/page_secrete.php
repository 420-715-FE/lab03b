<?php

session_start();

$motsDePasse = [
    'jaja72' => 'lapin',
    'petitefleur145' => 'chat',
    'bob' => 'poisson',
];


if (isset($_GET['deconnexion'])) {
    session_unset();
    session_destroy();
}

$erreurAuthentification = false;

if (isset($_SESSION['utilisateur'])) {
    $utilisateur = $_SESSION['utilisateur'];
} else if (
    isset($_POST['utilisateur'])
    && isset($_POST['mot_de_passe'])
) {
    if (
        isset($motsDePasse[$_POST['utilisateur']])
        && $_POST['mot_de_passe'] == $motsDePasse[$_POST['utilisateur']]
    ) {
        $_SESSION['utilisateur'] = $_POST['utilisateur'];
        $utilisateur = $_POST['utilisateur'];
    } else {
        $erreurAuthentification = true;
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
        if (isset($utilisateur)) {
        ?>
            <p>Bonjour <strong><?= $utilisateur ?></strong> ! Bienvenue sur la page secrète!</p>
            <a href="?deconnexion">Se déconnecter</a></p>
        <?php
        } else {
            if ($erreurAuthentification) {
                echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
            }
            ?>
            <form action="page_secrete.php" method="post">
                <label for="utilisateur">Nom d'utilisateur:</label>
                <input type="text" name="utilisateur" id="utilisateur">
                <label for="mot_de_passe">Mot de passe:</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe">
                <button type="submit">Envoyer</button>
            </form>
            <?php
        }
    ?>
</body>
</html>
