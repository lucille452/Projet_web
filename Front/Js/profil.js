// Variable globale pour stocker le solde
let solde = 0;

// Fonction pour afficher le solde
function afficherSolde() {
    document.getElementById('solde').textContent = solde;
}

// Fonction pour ajouter du solde
function ajouterSolde(montant) {
    solde += montant;
    afficherSolde();
}

// Fonction pour recharger le solde avec confirmation
function rechargerSolde(montant) {
    // Demande de confirmation à l'utilisateur
    if (confirm("Êtes-vous sûr de vouloir recharger votre solde de " + montant + " € ?")) {
        ajouterSolde(montant); // Si l'utilisateur confirme, ajoute le montant au solde
    }
}

// Attendre que le DOM soit entièrement chargé
document.addEventListener("DOMContentLoaded", function() {
    // Fonction pour afficher les champs de modification
    document.getElementById('btnModifier').addEventListener('click', function() {
        document.getElementById('sectionModifier').style.display = 'block';
    });
});
