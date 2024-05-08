
// Attendre que le DOM soit entièrement chargé
document.addEventListener("DOMContentLoaded", function() {
    // Fonction pour afficher les champs de modification
    document.getElementById('btnModifier').addEventListener('click', function() {
        document.getElementById('sectionModifier').style.display = 'block';
    });
});
