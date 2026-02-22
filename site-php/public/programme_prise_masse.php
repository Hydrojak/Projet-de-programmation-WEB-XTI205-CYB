<?php

$title = "Programme — Prise de masse | NutriThub";
require __DIR__ . "/includes/header.php";
?>

<main>
    <section class="beginner-hero">
        <h1><span>Programme</span> Prise de Masse</h1>
        <p>
            Construis du muscle proprement, sans prise de gras inutile.
            Découvre un plan clair, efficace et adapté à ton niveau.
        </p>
    </section>

    <div class="prog-container">
        <div class="pillars-grid">
            <div class="card">
                <div class="icon">🍗</div>
                <h3>Nutrition</h3>
                <p>Un surplus calorique contrôlé pour maximiser la prise de muscle.</p>
            </div>

            <div class="card">
                <div class="icon">🏋️</div>
                <h3>Entraînement</h3>
                <p>Des séances structurées pour stimuler l’hypertrophie.</p>
            </div>

            <div class="card">
                <div class="icon">😴</div>
                <h3>Récupération</h3>
                <p>Le sommeil et la gestion du stress sont essentiels pour progresser.</p>
            </div>
        </div>


        <div class="prog-section">
            <h2>Calculateur de calories (Mifflin-St Jeor)</h2>
            <p>Calcule ton métabolisme basal et ton objectif calorique pour une prise de masse propre.</p>

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
                <input type="number" id="age" class="form-input" placeholder="Ex : 20">
            </div>

            <div class="form-group">
                <label class="form-label">Niveau d’activité</label>
                <select id="activite" class="form-select">
                    <option value="1.2">Sédentaire</option>
                    <option value="1.375">Léger</option>
                    <option value="1.55">Modéré</option>
                    <option value="1.725">Intense</option>
                    <option value="1.9">Très intense</option>
                </select>
            </div>

            <button class="prog-button" id="calculer">Calculer</button>

            <div id="resultat" style="margin-top:20px;"></div>
        </div>


        <div class="prog-section">
            <h2>Conseils pour une prise de masse propre</h2>
            <ul class="prog-list">
                <li>Augmente progressivement ton apport calorique (+200 à +300 kcal).</li>
                <li>Priorise les protéines (1.6 à 2.2 g/kg/jour).</li>
                <li>Entraîne-toi en surcharge progressive.</li>
                <li>Dors au moins 7 à 9 heures par nuit.</li>
            </ul>
        </div>


        <div class="faq-section">
            <h2>FAQ</h2>

            <details>
                <summary>Combien de temps pour voir des résultats ?</summary>
                <p>En général, 4 à 8 semaines suffisent pour voir les premiers changements.</p>
            </details>

            <details>
                <summary>Dois-je prendre des compléments ?</summary>
                <p>Pas obligatoire. Les bases : whey, créatine, oméga-3.</p>
            </details>
        </div>
    </div>


    <section class="cta-section">
        <h2>Prêt à transformer ton physique ?</h2>
        <p>Commence ton programme personnalisé dès aujourd’hui.</p>
        <a href="/contact.php" class="prog-button">Nous contacter</a>
    </section>
</main>

<?php require __DIR__ . "/includes/footer.php"; ?>