function addFormJeu() {
    const form = document.getElementById('add_jeu')
    const addBtn = document.getElementById('add_jeu_btn')

    addBtn.addEventListener('click', function() {
        const labelNom = document.createElement('label')
        labelNom.textContent = 'Nom :'

        const nom = document.createElement('input')
        nom.type = 'text'
        nom.name = 'nom'

        const labelDescription = document.createElement('label')
        labelDescription.textContent = 'Description :'

        const description = document.createElement('input')
        description.type = 'text'
        description.name = 'description'

        const labelQuantite = document.createElement('label')
        labelQuantite.textContent = 'Quantité :'

        const quantite = document.createElement('input')
        quantite.type = 'number'
        quantite.name = 'quantite'

        const labelPrix = document.createElement('label')
        labelPrix.textContent = 'Prix :'

        const prix = document.createElement('input')
        prix.type = 'number'
        prix.name = 'prix'

        const labelCode = document.createElement('label')
        labelCode.textContent = "Code d'activation"

        const code = document.createElement('input')
        code.type = 'number'
        code.name = 'code'

        const submit = document.createElement('input')
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
        form.appendChild(labelCode)
        form.appendChild(code)
        form.appendChild(submit)
    });
}