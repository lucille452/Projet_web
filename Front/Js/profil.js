
// Attendre que le DOM soit entièrement chargé
document.addEventListener("DOMContentLoaded", function() {
    dialogSup2();
    // Fonction pour afficher les champs de modification
    document.getElementById('btnModifier').addEventListener('click', function() {
        document.getElementById('sectionModifier').style.display = 'block';
    });
});

function dialogSup2() {
        const supDialog = document.getElementById("supDialog")
        const showSupprimer = document.getElementById("btnSupprimer")

        if (supDialog && showSupprimer) {
            showSupprimer.addEventListener("click", () => supDialog.showModal())
        }
}

function closeSup2() {
        let dialog = document.getElementById('supDialog');
        if (dialog) {
            dialog.close();
        }
}

