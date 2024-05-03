function dialog() {
    for (let id = 1; id < 1000; id++) {
        const supDialog = document.getElementById("supDialog" + id)
        const showSupprimer = document.getElementById("showSupprimer" + id)

        if (supDialog && showSupprimer) {
            showSupprimer.addEventListener("click", () => supDialog.showModal())
        }
    }
}

function closeDialog() {
    for (let id = 1; id < 1000; id++) {
        let dialog = document.getElementById('supDialog' + id);
        dialog.close();
    }
}

function add() {
    
}