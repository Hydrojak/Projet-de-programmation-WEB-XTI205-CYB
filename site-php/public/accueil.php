<?php

$title = "NutriThub - Accueil";
require __DIR__ . "/includes/header.php";
?>

<main class="prog-container">


    <section class="prog-section">
        <div class="prog-header">
            <h1>Maîtrise ta nutrition. Comprends ton corps.</h1>
            <p>
                NutriThub t’aide à calculer tes besoins caloriques, estimer ta masse musculaire
                et comprendre comment les protéines et les calories influencent tes résultats.
            </p>
        </div>

        <div class="section-cta">
            <a href="/calculateurs/calories.php" class="prog-button">Commencer mon calcul</a>
        </div>
    </section>


    <section class="prog-section section-with-img">
        <div class="text-content">
            <h2>Pourquoi comprendre la nutrition ?</h2>
            <p>
                La transformation physique ne repose pas uniquement sur l’entraînement.
                Comprendre ton métabolisme, ton apport calorique et tes besoins en protéines
                te permet de progresser plus intelligemment.
            </p>
            <p>
                Chez NutriThub, nous combinons outils pratiques et explications claires
                pour que tu ne suives pas un plan au hasard, mais que tu comprennes
                réellement ce que tu fais.
            </p>
        </div>
        <img src="/media/images/healthy1.avif" alt="Cuisine saine" class="side-img">
    </section>

    <section class="prog-section no-border">
        <h2 class="section-title">Des outils simples et efficaces</h2>

        <div class="calculateurs-grid">
            <div class="calc-card">
                <div class="card-video-container">
                    <video autoplay loop muted playsinline class="calc-video">
                        <source src="/media/videos/animation_fruit1.mp4" type="video/mp4">
                    </video>
                </div>
                <h3>Calculateur de calories</h3>
                <p>Estime ton métabolisme de base et ta dépense énergétique totale selon ton niveau d’activité.</p>
                <a href="/calculateurs/calories.php" class="prog-button">Calculer</a>
            </div>

            <div class="calc-card">
                <div class="card-video-container">
                    <video autoplay loop muted playsinline class="calc-video">
                        <source src="/media/videos/animation_fruit2.mp4" type="video/mp4">
                    </video>
                </div>
                <h3>Calculateur de protéines</h3>
                <p>Détermine la quantité idéale de protéines en fonction de ton poids et de ton niveau d’activité.</p>
                <a href="/calculateurs/proteines.php" class="prog-button">Calculer</a>
            </div>

            <div class="calc-card">
                <div class="card-video-container">
                    <video autoplay loop muted playsinline class="calc-video">
                        <source src="/media/videos/animation_form1.mp4" type="video/mp4">
                    </video>
                </div>
                <h3>Indice de Masse Maigre</h3>
                <p>Évalue ton niveau de masse musculaire pour une analyse précise de ta composition corporelle.</p>
                <a href="/calculateurs/imm.php" class="prog-button">Calculer</a>
            </div>
        </div>
    </section>


    <section class="prog-section">
        <h2>Programmes adaptés à ton objectif</h2>
        <p>
            Que tu débutes, que tu cherches à perdre du poids ou à prendre de la masse,
            nos programmes te guident étape par étape avec des bases claires et structurées.
        </p>

        <div class="section-cta">
            <a href="/programme.php" class="prog-button">Voir les programmes</a>
        </div>
    </section>

</main>

<?php require __DIR__ . "/includes/footer.php"; ?>