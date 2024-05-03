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
        if (dialog) {
            dialog.close();
        }
    }
}

function addUpdateMembre() {
    for (let id = 1; id < 1000; id++) {
        let form = document.getElementById('modifier' + id)
        const addBtn = document.getElementById('showModifier' + id)

        if (form && addBtn) {
            addBtn.addEventListener('click', function () {
                let nom = document.createElement('input')
                nom.type = 'text'
                nom.name = 'nom'
                nom.required = true

                let prenom = document.createElement('input')
                prenom.type = 'text'
                prenom.name = 'prenom'
                prenom.required = true

                let mail = document.createElement('input')
                mail.type = 'email'
                mail.name = 'email'
                mail.required = true

                let birth = document.createElement('input')
                birth.type = 'date'
                birth.name = 'birth'
                birth.required = true

                let submit = document.createElement('input')
                submit.type = 'submit'
                submit.name = 'submit'
                submit.value = 'Enregistrer les modifications'

                let btnFermer = document.createElement('button')
                btnFermer.id = 'sup' + id


                let tdNom = document.createElement('td')
                let tdPrenom = document.createElement('td')
                let tdMail = document.createElement('td')
                let tdBirth = document.createElement('td')
                let tdSubmit = document.createElement('td')
                let tdBtnFermer = document.createElement('td')

                tdNom.appendChild(nom)
                form.appendChild(tdNom)

                tdPrenom.appendChild(prenom)
                form.appendChild(tdPrenom)

                tdMail.appendChild(mail)
                form.appendChild(tdMail)

                tdBirth.appendChild(birth)
                form.appendChild(tdBirth)

                tdSubmit.appendChild(submit)
                form.appendChild(tdSubmit)

                tdBtnFermer.appendChild(btnFermer)
                form.appendChild(tdBtnFermer)

            })
        }
    }
}