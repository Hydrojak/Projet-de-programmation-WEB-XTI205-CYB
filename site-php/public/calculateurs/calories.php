<?php

$title = "Calculateur de calories | NutriThub";
require __DIR__ . "/../includes/header.php";
?>

<main class="prog-container">


    <header class="prog-header-hero calories-bg">
        <div class="hero-overlay">
            <h1>Les calories</h1>
            <p>Comprendre l’énergie avant de calculer tes besoins.</p>
        </div>
    </header>

    <section class="prog-section section-split no-border">
        <div class="split-text">
            <h2>Qu’est-ce qu’une calorie ?</h2>
            <p>
                Une calorie (kcal) est une unité d’énergie. Ton corps utilise cette énergie
                pour respirer, réfléchir, bouger et récupérer après l’effort.
            </p>
            <p>
                C'est le carburant de ton moteur. Sans elle, rien ne fonctionne !
            </p>
        </div>
        <div class="split-img">
            <img src="../../media/images/calories_infos.png" alt="Énergie et nutrition">
        </div>
    </section>

    <section class="prog-section">
        <h2>Métabolisme de base et dépense totale</h2>
        <div class="info-box-light">
            <p>
                Le <strong>métabolisme de base (MB)</strong> correspond à l’énergie que ton corps brûle au repos total. 
                Pour connaître ta dépense réelle, on multiplie ce chiffre par ton niveau d’activité journalier.
            </p>
        </div>
    </section>

    <section class="prog-section">
        <h2 style="text-align: center; margin-bottom: 25px;">Déficit, maintien ou surplus ?</h2>
        <div class="benefits-grid">
            <div class="benefit-item">
                <span class="benefit-icon">⚖️</span>
                <h3>Maintien</h3>
                <p>Tu manges autant que tu dépenses. Ton poids reste stable.</p>
            </div>
            <div class="benefit-item">
                <span class="benefit-icon">📉</span>
                <h3>Déficit</h3>
                <p>Tu manges moins que ta dépense. Idéal pour la perte de poids.</p>
            </div>
            <div class="benefit-item">
                <span class="benefit-icon">📈</span>
                <h3>Surplus</h3>
                <p>Tu manges plus que ta dépense. Nécessaire pour la prise de masse.</p>
            </div>
        </div>
    </section>



    <section class="prog-section expert-section">
        <h2 class="section-title">🧬 Le coin des experts : La science derrière</h2>

        <div class="expert-block section-split">
            <div class="split-img">
                <div class="video-frame">
                    <video autoplay loop muted playsinline class="science-video">
                        <source src="media/videos/science-calories.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="split-text">
                <h3>Comment le corps brûle-t-il l'énergie ?</h3>
                <p>
                    Au niveau cellulaire, les calories sont transformées en <strong>ATP</strong> (Adénosine Triphosphate) via les mitochondries. 
                    C'est ce qu'on appelle la respiration cellulaire. Chaque nutriment suit un chemin métabolique différent pour alimenter tes muscles et tes organes.
                </p>
            </div>
        </div>

        <hr class="separator">

        
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