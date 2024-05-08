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
