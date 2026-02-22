<?php

$title = "Calculateur IMM | NutriThub";
require __DIR__ . "/../includes/header.php";
?>

<main class="prog-container">
    <section class="prog-section">
        <div class="prog-header">
            <h1>Calculateur IMM</h1>
            <p>Estimation de la masse grasse (Deurenberg), puis calcul de la masse maigre (IMM estimé).</p>
        </div>

        <div class="prog-section">
            <h2>Données</h2>

            <div class="form-group">
                <label class="form-label">Sexe</label>
                <select id="sexe_imm" class="form-select">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Poids (kg)</label>
                <input type="number" id="poids_imm" class="form-input" placeholder="Ex : 80">
            </div>

            <div class="form-group">
                <label class="form-label">Taille (cm)</label>
                <input type="number" id="taille_imm" class="form-input" placeholder="Ex : 180">
            </div>

            <div class="form-group">
                <label class="form-label">Masse grasse (%)</label>
                <input type="number" id="bodyfat_imm" class="form-input" placeholder="Ex : 15">
            </div>
        </div>

        <div class="results-card prog-section section-cta">
            <button class="prog-button" id="calculer_imm" type="button">Calculer</button>
            <div id="resultat_imm" style="margin-top:20px; font-size:1.2rem;"></div>
        </div>
    </section>
</main>

<script>
document.getElementById("calculer_imm").addEventListener("click", function () {
    const sexe = document.getElementById("sexe_imm").value;
    const poids = parseFloat(document.getElementById("poids_imm").value);
    const tailleCm = parseFloat(document.getElementById("taille_imm").value);
    const bodyfat = parseFloat(document.getElementById("bodyfat_imm").value);

    if (!poids || !tailleCm || isNaN(bodyfat)) {
        alert("Veuillez remplir tous les champs.");
        return;
    }

    if (bodyfat < 0 || bodyfat > 60) {
        alert("Veuillez entrer un pourcentage de masse grasse plausible (0 à 60).");
        return;
    }

    const tailleM = tailleCm / 100;

    const masseMaigre = poids * (1 - (bodyfat / 100));
    const masseGrasse = poids - masseMaigre;

    const imm = masseMaigre / (tailleM * tailleM);

    let profil = "";
    if (sexe === "homme") {
        if (imm < 18) profil = "Masse maigre faible";
        else if (imm < 20) profil = "Masse maigre moyenne";
        else if (imm < 22) profil = "Bon niveau de masse musculaire";
        else if (imm < 25) profil = "Très musclé";
        else profil = "Exceptionnel (souvent niveau bodybuilder)";
    } else {
        if (imm < 15) profil = "Masse maigre faible";
        else if (imm < 17) profil = "Masse maigre moyenne";
        else if (imm < 19) profil = "Bon niveau de masse musculaire";
        else if (imm < 22) profil = "Très musclée";
        else profil = "Exceptionnel";
    }

    const interpretation = `
        <p><strong>Masse grasse :</strong> ${masseGrasse.toFixed(1)} kg (${bodyfat.toFixed(1)} %)</p>
        <p><strong>Masse maigre :</strong> ${masseMaigre.toFixed(1)} kg</p>
        <p><strong>IMM :</strong> ${imm.toFixed(2)}</p>
        <p><strong>Analyse :</strong> ${profil}</p>
        <p style="font-size:0.9rem; opacity:0.8;">
            IMM = Masse maigre (kg) / (Taille (m))²<br>
            Masse maigre = Poids × (1 - (% masse grasse / 100))
        </p>
    `;

    document.getElementById("resultat_imm").innerHTML = interpretation;
});
</script>

<?php require __DIR__ . "/../includes/footer.php"; ?>