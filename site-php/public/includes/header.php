<?php
if (!isset($title)) {
    $title = "NutriThub";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/CSS/style.css">
</head>
<body>

<nav>
    <div class="logo-section">
        <a href="/accueil.php">
            <img src="/media/images/NutriThub_logo.png" alt="Logo NutriThub" class="logo-img">
            NutriThub
        </a>
    </div>

    <ul class="nav-links">
        <li><a href="/accueil.php">Accueil</a></li>

        <li class="dropdown">
            <a href="/programme.php" class="dropbtn">Programme nutritionnel ▾</a>
            <ul class="dropdown-content">
                <li><a href="/calcul_nutri.php">Calculateur nutritionnel</a></li>
                <li><a href="/programme_debutant.php">Débutant</a></li>
                <li><a href="/programme_perte_poids.php">Perte de poids</a></li>
                <li><a href="/programme_prise_masse.php">Prise de masse</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="/calculateurs/calories.php" class="dropbtn">Calculateurs ▾</a>
            <ul class="dropdown-content">
                <li><a href="/calcul_nutri.php">Calculateur nutritionnel</a></li>
                <li><a href="/calculateurs/calories.php">Calories</a></li>
                <li><a href="/calculateurs/imc.php">IMC</a></li>
                <li><a href="/calculateurs/proteines.php">Protéines</a></li>
                <li><a href="/calculateurs/imm.php">IMM</a></li>
            </ul>
        </li>

        <li><a href="/contact.php">Contact</a></li>
    </ul>
</nav>