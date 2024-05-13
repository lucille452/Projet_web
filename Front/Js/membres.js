function dialogSup() {
    for (let id = 1; id < 1000; id++) {
        const supDialog = document.getElementById("supDialog" + id)
        const showSupprimer = document.getElementById("showSupprimer" + id)

        if (supDialog && showSupprimer) {
            showSupprimer.addEventListener("click", () => supDialog.showModal())
        }
    }
}

function closeSup() {
    for (let id = 1; id < 1000; id++) {
        let dialog = document.getElementById('supDialog' + id);
        if (dialog) {
            dialog.close();
        }
    }
}

function dialogMod() {
    for (let id = 1; id < 1000; id++) {
        const modDialog = document.getElementById("modDialog" + id)
        const swhoModifier = document.getElementById("showModifier" + id)

        if (modDialog && swhoModifier) {
            swhoModifier.addEventListener("click", () => modDialog.showModal())
        }
    }
}

function closeMod() {
    for (let id = 1; id < 1000; id++) {
        let dialog = document.getElementById('modDialog' + id);
        if (dialog) {
            dialog.close();
        }
    }
}

function openDetailsPage() {
    let tableau = document.getElementById("tableau");

    tableau.addEventListener("click", function(event) {
        let row = event.target.closest("tr");
        let clickedCell = event.target.closest("td");
        let lastCellIndex = row.cells.length - 1;
        let clickedCellIndex = Array.from(row.cells).indexOf(clickedCell);
        if (row && clickedCellIndex !== lastCellIndex) {
            let id = row.dataset.id;

            // Crée l'URL avec les paramètres de requête
            let url = `detailsMembre.php?id=${id}`;

            // Redirige vers la page avec les paramètres
            window.location.href = url;
        }
    });
}
