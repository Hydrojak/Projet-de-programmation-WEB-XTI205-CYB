<?php

$title = "Programme — Perte de poids | NutriThub";
require __DIR__ . "/includes/header.php";
?>

<main>
    <section class="beginner-hero">
        <h1><span>Programme</span> Perte de Poids</h1>
        <p>Perds du gras efficacement, sans frustration et sans mettre ta santé en danger.</p>
    </section>

    <div class="prog-container">

        <div class="pillars-grid">
            <div class="card">
                <div class="icon">🥗</div>
                <h3>Nutrition</h3>
                <p>Un déficit calorique contrôlé pour brûler du gras sans perdre de muscle.</p>
            </div>

            <div class="card">
                <div class="icon">🔥</div>
                <h3>Activité physique</h3>
                <p>Combinaison optimale entre musculation et cardio intelligent.</p>
            </div>

            <div class="card">
                <div class="icon">🧘</div>
                <h3>Habitudes</h3>
                <p>Sommeil, hydratation et gestion du stress pour maximiser les résultats.</p>
            </div>
        </div>


        <div class="prog-section">
            <h2>Calculateur de calories (Mifflin-St Jeor)</h2>
            <p>Calcule ton métabolisme basal et ton objectif calorique pour perdre du poids efficacement.</p>

            <div class="form-group">
                <label class="form-label">Sexe</label>
                <select id="sexe" class="form-select">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Poids (kg)</label>
                <input type="number" id="poids" class="form-input" placeholder="Ex : 80">
            </div>

            <div class="form-group">
                <label class="form-label">Taille (cm)</label>
                <input type="number" id="taille" class="form-input" placeholder="Ex : 175">
            </div>

            <div class="form-group">
                <label class="form-label">Âge</label>
                <input type="number" id="age" class="form-input" placeholder="Ex : 30">
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
            <h2>Conseils pour une perte de poids durable</h2>
            <ul class="prog-list">
                <li>Crée un déficit modéré (300 à 500 kcal/jour).</li>
                <li>Priorise les protéines pour préserver ta masse musculaire.</li>
                <li>Augmente ton NEAT (marche, mouvements du quotidien).</li>
                <li>Évite les régimes trop restrictifs qui mènent au rebond.</li>
            </ul>
        </div>

        <div class="faq-section">
            <h2>FAQ</h2>

            <details>
                <summary>Combien de kilos puis-je perdre par mois</summary>
                <p>Entre 1 et 3 kg selon ton déficit et ton niveau d’activité.</p>
            </details>

            <details>
                <summary>Le cardio est-il obligatoire</summary>
                <p>Non, mais il accélère la dépense calorique et améliore la santé.</p>
            </details>

            <details>
                <summary>Dois-je supprimer les glucides</summary>
                <p>Absolument pas. Le déficit calorique est ce qui compte réellement.</p>
            </details>
        </div>
    </div>

    <section class="cta-section">
        <h2>Prêt à commencer ta transformation</h2>
        <p>Je peux t’aider à construire un plan personnalisé et durable.</p>
        <a href="/contact.php" class="prog-button">Me contacter</a>
    </section>
</main>

<?php require __DIR__ . "/includes/footer.php"; ?>