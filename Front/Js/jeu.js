function addFormJeu() {
    const form = document.getElementById('add_jeu')
    const addBtn = document.getElementById('add_jeu_btn')

    addBtn.addEventListener('click', function() {
        const labelNom = document.createElement('label')
        labelNom.textContent = 'Nom :'

        const nom = document.createElement('input')
        nom.type = 'text'
        nom.name = 'nom'
        nom.required = true

        const labelDescription = document.createElement('label')
        labelDescription.textContent = 'Description :'

        const description = document.createElement('input')
        description.type = 'text'
        description.name = 'description'
        description.required = true

        const labelQuantite = document.createElement('label')
        labelQuantite.textContent = 'Quantité :'

        const quantite = document.createElement('input')
        quantite.type = 'number'
        quantite.name = 'quantite'
        quantite.required = true

        const labelPrix = document.createElement('label')
        labelPrix.textContent = 'Prix :'

        const prix = document.createElement('input')
        prix.type = 'number'
        prix.name = 'prix'
        prix.required = true
        prix.step = '0.01'

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
        form.appendChild(submit)
    });
}