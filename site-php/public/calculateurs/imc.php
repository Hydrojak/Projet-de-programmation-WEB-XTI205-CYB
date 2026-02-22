<?php
// public/calculateurs/imc.php
$title = "Calculateur IMC | NutriThub";
require __DIR__ . "/../includes/header.php";
?>

<main class="prog-container">
    <section class="prog-section">
        <div class="prog-header">
            <h1>Calculateur IMC</h1>
            <p>Calcule ton Indice de Masse Corporelle et sa catégorie.</p>
        </div>

        <div class="prog-section">
            <h2>Données</h2>

            <div class="form-group">
                <label class="form-label">Poids (kg)</label>
                <input type="number" id="poids_imc" class="form-input" placeholder="Ex : 70">
            </div>

            <div class="form-group">
                <label class="form-label">Taille (cm)</label>
                <input type="number" id="taille_imc" class="form-input" placeholder="Ex : 180">
            </div>
        </div>

        <div class="results-card prog-section section-cta">
            <button class="prog-button" id="calculer_imc" type="button">Calculer</button>
            <div id="resultat_imc" style="margin-top:20px; font-size:1.2rem;"></div>
        </div>
    </section>
</main>

<script>
document.getElementById("calculer_imc").addEventListener("click", function () {
    const poids = parseFloat(document.getElementById("poids_imc").value);
    const tailleCm = parseFloat(document.getElementById("taille_imc").value);

    if (!poids || !tailleCm) {
        alert("Veuillez remplir tous les champs.");
        return;
    }

    const taille = tailleCm / 100;
    const imc = poids / (taille * taille);

    let categorie = "";
    if (imc < 18.5) categorie = "Insuffisance pondérale";
    else if (imc < 25) categorie = "Corpulence normale";
    else if (imc < 30) categorie = "Surpoids";
    else categorie = "Obésité";

    document.getElementById("resultat_imc").innerHTML =
        `<p><strong>IMC :</strong> ${imc.toFixed(1)}</p>
         <p><strong>Catégorie :</strong> ${categorie}</p>`;
});
</script>

<?php require __DIR__ . "/../includes/footer.php"; ?>