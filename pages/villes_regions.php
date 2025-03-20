<?php

$regionsParVilles = [
    "Montréal" => "Montréal",
    "Québec" => "Capitale-Nationale",
    "Laval" => "Laval",
    "Gatineau" => "Outaouais",
    "Longueuil" => "Montérégie",
    "Sherbrooke" => "Estrie",
    "Magog" => "Estrie",
    "Coaticook" => "Estrie",
    "Trois-Rivières" => "Mauricie",
    "Drummondville" => "Centre-du-Québec",
];

if (!isset($_GET['ville'])) {
    $texte = 'Paramètre "ville" manquant.';
} else if (!isset($regionsParVilles[$_GET['ville']])) {
    $texte = 'Ville non trouvée.';
} else {
    $texte = 'La ville de ' . $_GET['ville'] . ' est dans la région administrative "' . $regionsParVilles[$_GET['ville']] . '".';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villes et régions</title>
    <link rel="stylesheet" href="../water.css">
</head>
<body>
    <nav>
        <a href="../index.php">Retour</a>
    </nav>
    <h1>Villes et régions</h1>
    <p><?= $texte ?></p>
</body>
</html>
