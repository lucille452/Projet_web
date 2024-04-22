function addFormJeu() {
    let form = document.getElementById('add_jeu')
    const addBtn = document.getElementById('add_jeu_btn')

    addBtn.addEventListener('click', function() {
        let labelNom = document.createElement('label')
        labelNom.textContent = 'Nom :'

        let nom = document.createElement('input')
        nom.type = 'text'
        nom.name = 'nom'
        nom.required = true

        let labelDescription = document.createElement('label')
        labelDescription.textContent = 'Description :'

        let description = document.createElement('input')
        description.type = 'text'
        description.name = 'description'
        description.required = true

        let labelQuantite = document.createElement('label')
        labelQuantite.textContent = 'Quantité :'

        let quantite = document.createElement('input')
        quantite.type = 'number'
        quantite.name = 'quantite'
        quantite.required = true

        let labelPrix = document.createElement('label')
        labelPrix.textContent = 'Prix :'

        let prix = document.createElement('input')
        prix.type = 'number'
        prix.name = 'prix'
        prix.required = true
        prix.step = '0.01'

        let submit = document.createElement('input')
        submit.type = 'submit'
        submit.name = 'submit'
        submit.value = 'Ajouter le jeu'

        form.appendChild(labelNom)
        form.appendChild(nom)
        form.appendChild(labelDescription)
        form.appendChild(description)
        form.appendChild(labelQuantite)
        form.appendChild(quantite)
        form.appendChild(labelPrix)
        form.appendChild(prix)
        form.appendChild(submit)
    });
}


function dialogSupprimer() {
    for (let id = 1; id < 1000; id++) {
        const supDialog = document.getElementById("supDialog" + id)
        const showSupprimer = document.getElementById("showSupprimer" + id)

        if (supDialog && showSupprimer) {
            showSupprimer.addEventListener("click", () => supDialog.showModal())
        }
    }
}


function dialogModifier() {
    for (let id = 1; id < 1000; id++) {
        const modDialog = document.getElementById("modDialog" + id)
        const showModifier = document.getElementById("showModifier" + id)

        if (modDialog && showModifier) {
            showModifier.addEventListener("click", () => modDialog.showModal())
        }
    }
}


function closeSupDialog() {
    for (let id = 1; id < 1000; id++) {
        let dialog = document.getElementById('supDialog' + id);
        dialog.close();
    }
}


function closeModDialog() {
    for (let id = 1; id < 1000; id++) {
        let dialog = document.getElementById('supDialog' + id);
        dialog.close();
    }
}