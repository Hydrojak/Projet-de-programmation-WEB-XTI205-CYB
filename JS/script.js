function calculHarrisBenedict(sexe, poids, taille, age) {
  if (sexe === "homme") {
    return 66.5 + 13.75 * poids + 5.003 * taille - 6.755 * age;
<<<<<<< HEAD
  }
  return 655.1 + 9.563 * poids + 1.85 * taille - 4.676 * age;
=======
  } else {
    return 655.1 + 9.563 * poids + 1.850 * taille - 4.676 * age;
  }
>>>>>>> 34b38d71df21ff49c76e0c8ab0b5e6623a4a0fb5
}

function calculMifflinStJeor(sexe, poids, taille, age) {
  if (sexe === "homme") {
<<<<<<< HEAD
    return 10 * poids + 6.25 * taille - 5 * age + 5;
  }
  return 10 * poids + 6.25 * taille - 5 * age - 161;
}

function safeNumber(id) {
  const el = document.getElementById(id);
  if (!el) return NaN;
  const v = Number(el.value);
  return Number.isFinite(v) ? v : NaN;
}

document.addEventListener("DOMContentLoaded", () => {
  //CALORIES 
  const boutonCalories = document.getElementById("calculer");
  if (boutonCalories) {
    boutonCalories.addEventListener("click", () => {
      const poids = safeNumber("poids");
      const taille = safeNumber("taille");
      const age = Math.trunc(safeNumber("age"));
      const sexe = document.getElementById("sexe")?.value;
      const activite = safeNumber("activite");
      const objectif = document.getElementById("objectif")?.value || "maintien";

      if (!Number.isFinite(poids) || !Number.isFinite(taille) || !Number.isFinite(age) || !sexe || !Number.isFinite(activite)) {
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
        resultat.innerHTML = ` <div style="padding:20px; background:#e8f5e9; border-radius:8px;">
            <p><strong>MB :</strong> ${mb.toFixed(0)} kcal/jour</p>
            <p><strong>Dépense totale :</strong> ${det.toFixed(0)} kcal/jour</p>
            <p><strong>Objectif (${objectif}) :</strong> ${cible.toFixed(0)} kcal/jour</p>
          </div> `;
      }

      if (typeof saveLog === "function") {
        saveLog({
          type: "calories",
          sexe,
          poids_kg: poids,
          taille_cm: taille,
          age,
          activite,
          objectif,
          inputs: { sexe, poids, taille, age, activite, objectif },
          results: { mb, det, cible },
        });
      }
    });
  }

  //MACROS 
  const btnMacros = document.getElementById("btnMacros");
  if (btnMacros) {
    btnMacros.addEventListener("click", calculateMacros);
  }
});

function calculateMacros() {
  const weightEl = document.getElementById("weight");
  const goalEl = document.getElementById("goal");

  if (!weightEl || !goalEl) return; 

  const weight = Number(weightEl.value);
  const goal = goalEl.value;

  if (!Number.isFinite(weight) || weight <= 0) {
    alert("Indique ton poids !");
    return;
  }

  const prot = weight * 2;
  const fat = weight * 0.8;

  let carb;
=======
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

>>>>>>> 34b38d71df21ff49c76e0c8ab0b5e6623a4a0fb5
  if (goal === "gain") carb = weight * 5;
  else if (goal === "loss") carb = weight * 2;
  else carb = weight * 3.5;

<<<<<<< HEAD
  const protOut = document.getElementById("prot");
  const fatOut = document.getElementById("fat");
  const carbOut = document.getElementById("carb");
  const resultsBox = document.getElementById("results");

  if (protOut) protOut.innerText = Math.round(prot);
  if (fatOut) fatOut.innerText = Math.round(fat);
  if (carbOut) carbOut.innerText = Math.round(carb);
  if (resultsBox) resultsBox.style.display = "block";

  if (typeof saveLog === "function") {
    saveLog({
      type: "macros",
      poids_kg: weight,
      goal,
      inputs: { weight, goal },
      results: {
        prot_g: Math.round(prot),
        fat_g: Math.round(fat),
        carb_g: Math.round(carb),
      },
    });
  }
}
=======
  document.getElementById("prot").innerText = Math.round(prot);
  document.getElementById("fat").innerText = Math.round(fat);
  document.getElementById("carb").innerText = Math.round(carb);
  document.getElementById("results").style.display = "block";
}
>>>>>>> 34b38d71df21ff49c76e0c8ab0b5e6623a4a0fb5
