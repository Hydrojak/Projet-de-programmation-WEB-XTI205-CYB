function calculHarrisBenedict(sexe, poids, taille, age) {
  if (sexe === "homme") {
    return 66.5 + 13.75 * poids + 5.003 * taille - 6.755 * age;
  } else {
    return 655.1 + 9.563 * poids + 1.850 * taille - 4.676 * age;
  }
}

function calculMifflinStJeor(sexe, poids, taille, age) {
  if (sexe === "homme") {
    return (10 * poids) + (6.25 * taille) - (5 * age) + 5;
  } else {
    return (10 * poids) + (6.25 * taille) - (5 * age) - 161;
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const bouton = document.getElementById("calculer");
  if (!bouton) return;

  bouton.addEventListener("click", () => {
    const poids = parseFloat(document.getElementById("poids")?.value);
    const taille = parseFloat(document.getElementById("taille")?.value);
    const age = parseInt(document.getElementById("age")?.value);
    const sexe = document.getElementById("sexe")?.value;
    const activite = parseFloat(document.getElementById("activite")?.value);

    const objectifSelect = document.getElementById("objectif");
    const objectif = objectifSelect ? objectifSelect.value : "maintien";

    if (!poids || !taille || !age || !sexe || !activite) {
      alert("Veuillez remplir tous les champs.");
      return;
    }

    const mb = calculMifflinStJeor(sexe, poids, taille, age);
    const det = mb * activite;

    let cible = det;
    if (objectif === "prise") cible = det + 250;
    if (objectif === "perte") cible = det - 400;

    const resultat = document.getElementById("resultat");
    if (resultat) {
      resultat.innerHTML = `
        <div style="padding:20px; background:#e8f5e9; border-radius:8px;">
          <p><strong>MB :</strong> ${mb.toFixed(0)} kcal/jour</p>
          <p><strong>Dépense totale :</strong> ${det.toFixed(0)} kcal/jour</p>
          <p><strong>Objectif (${objectif}) :</strong> ${cible.toFixed(0)} kcal/jour</p>
        </div>
      `;
    }
  }); 
}); 

function calculateMacros() {
  const weight = document.getElementById("weight").value;
  const goal = document.getElementById("goal").value;

  if (!weight) return alert("Indique ton poids !");

  let prot, fat, carb;

  prot = weight * 2;
  fat = weight * 0.8;

  if (goal === "gain") carb = weight * 5;
  else if (goal === "loss") carb = weight * 2;
  else carb = weight * 3.5;

  document.getElementById("prot").innerText = Math.round(prot);
  document.getElementById("fat").innerText = Math.round(fat);
  document.getElementById("carb").innerText = Math.round(carb);
  document.getElementById("results").style.display = "block";
}
