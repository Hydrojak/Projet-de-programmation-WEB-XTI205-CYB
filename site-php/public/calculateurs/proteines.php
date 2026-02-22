<?php

$title = "Calculateur de protéines | NutriThub";
require __DIR__ . "/../includes/header.php";
?>

<main class="prog-container">
    <header class="prog-header-hero proteines-bg">
        <div class="hero-overlay">
            <h1>Les Protéines</h1>
            <p>Comprendre leur rôle de bâtisseur avant de calculer tes besoins.</p>
        </div>
    </header>

    <section class="prog-section section-split no-border">
        <div class="split-text">
            <h2>À quoi servent les protéines ?</h2>
            <p>
                Les protéines sont les <strong>briques de ton corps</strong>. Elles sont essentielles à la construction et à la réparation des tissus, notamment les muscles après un effort.
            </p>
            <p>
                Elles ne servent pas qu'aux muscles : elles participent aussi à la production d’enzymes, d’hormones et au bon fonctionnement de ton système immunitaire.
            </p>
        </div>
        <div class="split-img">
            <img src="../../media/images/protein-illustration.avif" alt="Sources de protéines" class="side-img">
        </div>
    </section>

    <section class="prog-section">
        <h2 style="text-align: center; margin-bottom: 25px;">Tes besoins selon ton profil</h2>
        <div class="benefits-grid">
            <div class="benefit-item">
                <span class="benefit-icon">🚶</span>
                <h3>Sédentaire</h3>
                <p><strong>~1.2 g / kg</strong><br>Pour maintenir la santé globale.</p>
            </div>
            <div class="benefit-item">
                <span class="benefit-icon">🏃</span>
                <h3>Sport régulier</h3>
                <p><strong>~1.6 g / kg</strong><br>Optimiser la récupération.</p>
            </div>
            <div class="benefit-item">
                <span class="benefit-icon">🏋️</span>
                <h3>Musculation</h3>
                <p><strong>~2.0 g / kg</strong><br>Maximiser la croissance musculaire.</p>
            </div>
        </div>
    </section>

    <section class="prog-section">
        <h2>Où les trouver ?</h2>
        <div class="info-box-light" style="display: flex; gap: 20px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 200px;">
                <strong>🥩 Sources Animales :</strong>
                <p>Œufs, poulet, poisson, produits laitiers, bœuf.</p>
            </div>
            <div style="flex: 1; min-width: 200px;">
                <strong>🌱 Sources Végétales :</strong>
                <p>Lentilles, pois chiches, tofu, soja, céréales complètes.</p>
            </div>
        </div>
    </section>


        <section class="prog-section expert-section">
        <h2 class="section-title">🧬 Le coin des experts : La science derrière</h2>

        <hr class="separator">

        <div class="expert-block section-split reverse">
            <div class="split-text">
                <h3>La synthèse protéique et les acides aminés</h3>
                <p>
                    Les protéines ne sont pas juste du "carburant". Elles sont décomposées en <strong>acides aminés</strong> qui servent de briques de construction pour tes tissus. 
                    Sans un apport suffisant, le corps entre en état de catabolisme (il détruit ses propres muscles pour survivre).
                </p>
            </div>
            <div class="split-img">
                <div class="video-frame">
                    <video autoplay loop muted playsinline class="science-video">
                        <source src="../../media/videos/science-proteines.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>



    <!-- CALCULATEUR -->
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



<script src="/JS/api_logger.js"></script>

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