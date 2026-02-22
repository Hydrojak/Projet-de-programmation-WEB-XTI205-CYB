<?php

$title = "Programme — Débutant | NutriThub";
require __DIR__ . "/includes/header.php";
?>

<header class="beginner-hero">
    <h1>Bienvenue dans ton parcours <span>Fitness</span></h1>
    <p>Tout grand changement commence par un premier pas. Voici les bases pour bien démarrer.</p>
</header>

<main>
    <section class="pillars-grid">
        <div class="card">
            <div class="icon">🥗</div>
            <h3>Nutrition</h3>
            <p>Apprends à nourrir ton corps pour tes objectifs.</p>
        </div>
        <div class="card">
            <div class="icon">💪</div>
            <h3>Entraînement</h3>
            <p>Des exercices simples mais efficaces pour débuter.</p>
        </div>
        <div class="card">
            <div class="icon">😴</div>
            <h3>Récupération</h3>
            <p>Le moment où tes muscles se construisent réellement.</p>
        </div>
    </section>

    <section class="cta-section">
        <div class="cta-content">
            <h2>Connais-tu tes besoins ?</h2>
            <p>Avant de commencer, il est essentiel de savoir combien de calories ton corps consomme.</p>
            <a href="/calcul_nutri.php" class="btn-submit">Calculer mes besoins</a>
        </div>
    </section>

    <section class="faq-section">
        <h2>Le jargon du débutant</h2>
        <details>
            <summary>C'est quoi la "Surcharge Progressive" ?</summary>
            <p>C'est le fait d'augmenter petit à petit la difficulté (poids ou répétitions) pour forcer le muscle à s'adapter.</p>
        </details>
        <details>
            <summary>Sèche vs Prise de masse ?</summary>
            <p>La sèche vise à perdre du gras, la prise de masse à gagner du muscle.</p>
        </details>
    </section>

    <div class="steps-container">
        <div class="step">
            <span class="step-number">01</span>
            <p>Définis ton objectif principal (santé, esthétique, force).</p>
        </div>
        <div class="step">
            <span class="step-number">02</span>
            <p>Calcule tes besoins caloriques via notre <a href="/calcul_nutri.php">formulaire</a>.</p>
        </div>
        <div class="step">
            <span class="step-number">03</span>
            <p>Choisis un programme de 3 séances par semaine pour commencer.</p>
        </div>
    </div>
</main>

<?php require __DIR__ . "/includes/footer.php"; ?>