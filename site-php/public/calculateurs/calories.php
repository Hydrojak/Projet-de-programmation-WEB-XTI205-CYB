<?php

$title = "Calculateur de calories | NutriThub";
require __DIR__ . "/../includes/header.php";
?>

<main class="prog-container">


    <section class="prog-section">
        <div class="prog-header">
            <h1>Les calories</h1>
            <p>Comprendre l’énergie avant de calculer tes besoins.</p>
        </div>

        <div class="prog-section">
            <h2>Qu’est-ce qu’une calorie ?</h2>
            <p>
                Une calorie (kcal) est une unité d’énergie. Ton corps utilise cette énergie
                pour respirer, réfléchir, bouger et récupérer après l’effort.
            </p>
        </div>

        <div class="prog-section">
            <h2>Métabolisme de base et dépense totale</h2>
            <p>
                Le métabolisme de base (MB) correspond à l’énergie nécessaire au repos.
                On multiplie ensuite par ton niveau d’activité pour obtenir la dépense
                énergétique totale.
            </p>
        </div>

        <div class="prog-section">
            <h2>Déficit, maintien, surplus</h2>
            <ul>
                <li>Maintien : poids stable</li>
                <li>Déficit : perte de poids</li>
                <li>Surplus : prise de masse</li>
            </ul>
        </div>
    </section>


    <section class="prog-section">
        <h2>Calculateur de calories</h2>

        <div class="form-group">
            <label class="form-label">Sexe</label>
            <select id="sexe" class="form-select">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Poids (kg)</label>
            <input type="number" id="poids" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Taille (cm)</label>
            <input type="number" id="taille" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Âge</label>
            <input type="number" id="age" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Niveau d’activité</label>
            <select id="activite" class="form-select">
                <option value="1.2">Sédentaire (1.2)</option>
                <option value="1.375">Léger (1.375)</option>
                <option value="1.55">Modéré (1.55)</option>
                <option value="1.725">Intense (1.725)</option>
                <option value="1.9">Très intense (1.9)</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Objectif</label>
            <select id="objectif" class="form-select">
                <option value="maintien">Maintien</option>
                <option value="perte">Perte de poids</option>
                <option value="prise">Prise de masse</option>
            </select>
        </div>

        <div class="results-card prog-section section-cta">
            <button class="prog-button" id="calculer" type="button">Calculer</button>
            <div id="resultat" style="margin-top:20px; font-size:1.2rem;"></div>
        </div>
    </section>

</main>

<?php require __DIR__ . "/../includes/footer.php"; ?>