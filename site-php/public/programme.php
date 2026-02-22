<?php

$title = "Programme nutritionnel | NutriThub";
require __DIR__ . "/includes/header.php";
?>

<main class="prog-container">
    <header class="prog-header-hero">
        <div class="hero-overlay">
            <h1>Programme nutritionnel</h1>
            <p>Découvrez des plans alimentaires adaptés à vos objectifs et votre mode de vie.</p>
        </div>
    </header>

    <section class="prog-section section-split">
        <div class="split-text">
            <h2>Qu'est-ce qu'un programme nutritionnel ?</h2>
            <p>
                Un programme nutritionnel est un plan structuré d'alimentation personnalisé qui prend en compte
                vos besoins énergétiques, vos préférences alimentaires et votre mode de vie.
            </p>
        </div>
        <div class="split-img">
            <img src="/media/images/healthy2.avif" alt="Planification alimentaire">
        </div>
    </section>

    <section class="prog-section">
        <h2 style="text-align: center; margin-bottom: 30px;">À quoi ça sert ?</h2>

        <div class="benefits-grid">
            <div class="benefit-item">
                <div class="benefit-video-container">
                    <video autoplay loop muted playsinline class="benefit-video">
                        <source src="/media/videos/animation_objectifs1.mp4" type="video/mp4">
                    </video>
                </div>
                <p>Atteindre tes objectifs de composition corporelle.</p>
            </div>

            <div class="benefit-item">
                <div class="benefit-video-container">
                    <video autoplay loop muted playsinline class="benefit-video">
                        <source src="/media/videos/animation_energy.mp4" type="video/mp4">
                    </video>
                </div>
                <p>Améliorer ton niveau d'énergie et tes performances.</p>
            </div>

            <div class="benefit-item">
                <div class="benefit-video-container">
                    <video autoplay loop muted playsinline class="benefit-video">
                        <source src="/media/videos/animation_health.mp4" type="video/mp4">
                    </video>
                </div>
                <p>Prévenir les carences et mieux manger au quotidien.</p>
            </div>

            <div class="benefit-item">
                <div class="benefit-video-container">
                    <video autoplay loop muted playsinline class="benefit-video">
                        <source src="/media/videos/animation_agenda.mp4" type="video/mp4">
                    </video>
                </div>
                <p>Offrir des repères clairs et durables.</p>
            </div>
        </div>
    </section>

    <section class="prog-section section-cta-final">
        <h2>Prêt à commencer ?</h2>
        <p>Choisissez une catégorie pour voir un exemple de plan détaillé et adapter votre alimentation dès aujourd'hui.</p>

        <div class="cta-buttons">
            <a href="/programme_debutant.php" class="prog-button">Débutant</a>
            <a href="/programme_perte_poids.php" class="prog-button btn-alt">Perte de poids</a>
            <a href="/programme_prise_masse.php" class="prog-button btn-alt">Prise de masse</a>
        </div>
    </section>
</main>

<?php require __DIR__ . "/includes/footer.php"; ?>