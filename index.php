<?php

$file = "profile.json";

// Kontrola existence souboru
if (!file_exists($file)) {
    die("Soubor profile.json nebyl nalezen.");
}

// Načtení JSON
$jsonData = file_get_contents($file);

// Převod na asociativní pole
$data = json_decode($jsonData, true);

// Ověření dat
if (!$data) {
    die("Chyba při načítání dat.");
}

// Bezpečné získání hodnot
$name = $data["name"] ?? "Neznámé jméno";
$skills = $data["skills"] ?? [];
$interests = $data["interests"] ?? [];

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>IT Profil 3.0</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1><?php echo htmlspecialchars($name); ?></h1>

    <section>
        <h2>Dovednosti</h2>
        <ul>
            <?php foreach ($skills as $skill): ?>
                <li><?php echo htmlspecialchars($skill); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section>
        <h2>Zájmy</h2>
        <ul>
            <?php foreach ($interests as $interest): ?>
                <li><?php echo htmlspecialchars($interest); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

</body>
</html>