<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reparation et lavage de climatiseur - KMD Services</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <a href="index.php" class="back">← Retour</a>
    <h1>Travaux de terrain - KMD Services</h1>
  </header>

<div class="profile"> 
  <img src="kassim.jpg" alt="Photo de Kassim">
  <h2>Kassim Sayed Mahamoud</h2>
  <p class="role">Reparation et lavage de Climatiseur</p>
<p>Installation, réparation et entretien de climatiseurs SPLIT et Centraux.
    Nettoyage des filtres, recharge de gaz et detection de fuites.
</p>

  <!-- Formulaire -->
  <form id="appointmentForm">
    <p>Choisir le type :</p>
    <label><input type="radio" name="type" value="Projet"> Projet</label>
    <label><input type="radio" name="type" value="Réparation"> Réparation</label>
    <label><input type="radio" name="type" value="Réparation"> lavage</label>

    <p>Date du rendez-vous :</p>
    <input type="date" id="rendezVous">

    <br><br>
    <button type="submit">Envoyer</button>
  </form>

  <!-- Résumé -->
  <div id="summary" style="display:none; margin-top:20px;">
    <h3>Résume de votre demande</h3>
    <p id="summaryText"></p>
    <button id="whatsappBtn">Envoyer sur WhatsApp</button>
  </div>
</div>

<script>
const form = document.getElementById('appointmentForm');
const summaryDiv = document.getElementById('summary');
const summaryText = document.getElementById('summaryText');
const whatsappBtn = document.getElementById('whatsappBtn');

form.addEventListener('submit', function(e) {
  e.preventDefault();

  const typeSelected = document.querySelector('input[name="type"]:checked');
  const dateInput = document.getElementById('rendezVous').value;
  const today = new Date().toISOString().split('T')[0]; 

  if (!typeSelected) {
    alert("Veuillez choisir 'Projet' ou 'Réparation'.");
    return;
  }

  if (!dateInput) {
    alert("Veuillez renseigner une date.");
    return;
  }

  if (dateInput <= today) {
    alert("Veuillez choisir une date future.");
    return;
  }

  // Affiche le résumé
  summaryDiv.style.display = "block";
  summaryText.textContent = `Type choisi : ${typeSelected.value} 
Date du rendez-vous : ${dateInput}`;
  
  // Masque le formulaire
  form.style.display = "none";
});

// Bouton WhatsApp
whatsappBtn.addEventListener('click', function() {
  const phone = "25377190864"; // numéro de Kassim
  const message = encodeURIComponent(summaryText.textContent + "\nC'est pour les travaux du climatiseur, Merci de confirmer rapidement");
  const url = `https://wa.me/${phone}?text=${message}`;
  window.open(url, '_blank');
});
</script>


</body>
</html>


