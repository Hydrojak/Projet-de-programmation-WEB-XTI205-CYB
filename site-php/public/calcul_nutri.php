<?php

$title = "Calculateur nutritionnel | NutriThub";
require __DIR__ . "/includes/header.php";
?>

<main class="prog-container">

    <header class="prog-header">
        <h1>Calculateur nutritionnel</h1>
        <p>Calculer vos besoins caloriques et macronutrimentaux en fonction de vos paramètres personnels.</p>
    </header>

    <div class="prog-container">
        <div class="prog-header">
            <h1>Calcul du Métabolisme (Harris & Benedict)</h1>
            <p>Calcule votre métabolisme basal et votre dépense énergétique totale.</p>
        </div>

        <div id="calculator_nutri" class="prog-section">
            <h2>Informations personnelles</h2>

            <div class="form-group">
                <label class="form-label">Sexe</label>
                <select id="sexe" class="form-select">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Poids (kg)</label>
                <input type="number" id="poids" class="form-input" placeholder="Ex : 70">
            </div>

            <div class="form-group">
                <label class="form-label">Taille (cm)</label>
                <input type="number" id="taille" class="form-input" placeholder="Ex : 180">
            </div>

            <div class="form-group">
                <label class="form-label">Âge</label>
                <input type="number" id="age" class="form-input" placeholder="Ex : 19">
            </div>
        </div>

        <div class="prog-section">
            <h2>Niveau d’activité</h2>

            <select id="activite">
                <option value="1.2">Sédentaire (1.2)</option>
                <option value="1.375">Léger (1.375)</option>
                <option value="1.55">Modéré (1.55)</option>
                <option value="1.725">Intense (1.725)</option>
                <option value="1.9">Très intense (1.9)</option>
            </select>
        </div>

        <div class="results-card prog-section section-cta">
            <button class="prog-button" id="calculer">Calculer</button>
            <div id="resultat" style="margin-top:20px; font-size:1.2rem;"></div>
        </div>
    </div>

    <div class="form-container prog-section">
        <h2>Calculateur de Macros</h2>

        <div class="form-group">
            <label for="weight" class="form-label">Poids actuel (kg)</label>
            <input type="number" id="weight" class="form-input" placeholder=" " required>
        </div>

        <div class="form-group">
            <label class="form-label">Objectif</label>
            <select id="goal" class="form-select">
                <option value="maintenance">Maintenance</option>
                <option value="gain">Prise de masse</option>
                <option value="loss">Perte de gras</option>
            </select>
        </div>

        <button type="button" class="btn-submit prog-button" onclick="calculateMacros()">Calculer mes besoins</button>

        <div id="results" class="results-card prog-section section-cta" style="display: none;">
            <h3>Vos besoins quotidiens :</h3>
            <div class="macro-grid">
                <div class="macro-item"><strong>Protéines:</strong> <span id="prot">0</span>g</div>
                <div class="macro-item"><strong>Lipides:</strong> <span id="fat">0</span>g</div>
                <div class="macro-item"><strong>Glucides:</strong> <span id="carb">0</span>g</div>
            </div>
        </div>
    </div>

</main>

<?php require __DIR__ . "/includes/footer.php"; ?>