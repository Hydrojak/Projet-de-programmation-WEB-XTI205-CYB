<?php

$title = "Contact | NutriThub";
require __DIR__ . "/includes/header.php";
?>

<main class="prog-container">
    <section class="prog-section">
        <div class="prog-header">
            <h1>Contacte-nous</h1>
            <p>Une question ? Un retour ? On est là pour t'aider.</p>
        </div>

        <form class="contact-form">
            <div class="input-group">
                <input type="text" id="name" class="input-field" placeholder=" " required>
                <label for="name" class="input-label">Ton nom</label>
            </div>

            <div class="input-group">
                <input type="email" id="email" class="input-field" placeholder=" " required>
                <label for="email" class="input-label">Ton email</label>
            </div>

            <div class="input-group">
                <textarea id="message" class="input-field" rows="5" placeholder=" " required></textarea>
                <label for="message" class="input-label">Ton message...</label>
            </div>

            <button type="submit" class="prog-button" style="width: 100%; border: none; cursor: pointer;">
                Envoyer le message
            </button>
        </form>
    </section>

    <section class="faq-section">
        <h2 style="text-align: center; margin-bottom: 30px;">Questions Fréquentes</h2>

        <details>
            <summary>En combien de temps vais-je recevoir une réponse ?</summary>
            <p>Notre équipe répond généralement en moins de 24h, du lundi au vendredi.</p>
        </details>

        <details>
            <summary>Proposez-vous des programmes personnalisés ?</summary>
            <p>Pour l'instant, nous proposons des guides gratuits pour débutants. Le coaching personnalisé arrive bientôt !</p>
        </details>

        <details>
            <summary>Puis-je modifier mes données dans le calculateur ?</summary>
            <p>Bien sûr ! Le calculateur est libre d'accès. Tu peux refaire tes calculs autant de fois que nécessaire selon l'évolution de ton poids.</p>
        </details>
    </section>
</main>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  if (!form) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const nom = document.getElementById("name")?.value?.trim() || "";
    const email = document.getElementById("email")?.value?.trim() || "";
    const message = document.getElementById("message")?.value?.trim() || "";

    // saveLog est défini par /JS/api_logger.js (chargé dans footer.php)
    await saveLog({
      type: "contact",
      nom, email, message,
      inputs: { nom, email, message }
    });

    alert("Message enregistré ");
    form.reset();
  });
});
</script>

<?php require __DIR__ . "/includes/footer.php"; ?>