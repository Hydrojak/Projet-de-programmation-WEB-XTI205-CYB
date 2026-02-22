<?php

$title = "Calculateur de protéines | NutriThub";
require __DIR__ . "/../includes/header.php";
?>

<main class="prog-container">


    <section class="prog-section">
        <div class="prog-header">
            <h1>Les protéines</h1>
            <p>Comprendre leur rôle avant de calculer tes besoins.</p>
        </div>

        <div class="prog-section">
            <h2>À quoi servent les protéines ?</h2>
            <p>
                Les protéines sont essentielles à la construction et à la réparation des tissus,
                notamment les muscles. Elles participent également à la production d’enzymes,
                d’hormones et au bon fonctionnement du système immunitaire.
            </p>
        </div>

        <div class="prog-section">
            <h2>Besoins journaliers</h2>
            <ul>
                <li>Sédentaire : ~1.2 g/kg</li>
                <li>Sport régulier : ~1.6 g/kg</li>
                <li>Musculation intensive : ~2.0 g/kg</li>
            </ul>
            <p>
                Le besoin dépend principalement de ton niveau d’activité et de ton objectif
                (maintien, prise de masse, perte de poids).
            </p>
        </div>

        <div class="prog-section">
            <h2>Sources alimentaires</h2>
            <p>
                Animales : œufs, poulet, poisson, produits laitiers.<br>
                Végétales : lentilles, pois chiches, tofu, soja, céréales complètes.
            </p>
        </div>
    </section>


    <section class="prog-section">
        <h2>Calculateur de protéines</h2>

        <div class="form-group">
            <label class="form-label">Poids (kg)</label>
            <input type="number" id="poids_prot" class="form-input" placeholder="Ex : 70">
        </div>

        <div class="form-group">
            <label class="form-label">Niveau d’activité</label>
            <select id="niveau_prot" class="form-select">
                <option value="">Choisir...</option>
                <option value="1.2">Sédentaire</option>
                <option value="1.6">Sport régulier</option>
                <option value="2.0">Musculation intensive</option>
            </select>
        </div>

        <div class="results-card prog-section section-cta">
            <button class="prog-button" id="calculer_prot" type="button">Calculer</button>
            <div id="resultat_prot" style="margin-top:20px; font-size:1.2rem;"></div>
        </div>
    </section>

</main>

<script>
document.getElementById("calculer_prot").addEventListener("click", function () {
    const poids = parseFloat(document.getElementById("poids_prot").value);
    const coef = parseFloat(document.getElementById("niveau_prot").value);

    if (!poids || !coef) {
        alert("Veuillez remplir tous les champs.");
        return;
    }

    const besoin = poids * coef;

    document.getElementById("resultat_prot").innerHTML =
        `<p><strong>Besoins estimés :</strong> ${besoin.toFixed(0)} g/jour</p>`;
});
</script>

<?php require __DIR__ . "/../includes/footer.php"; ?>