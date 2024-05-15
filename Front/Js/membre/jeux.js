function openDetailsPage() {
    let tableau = document.getElementById("list");

    tableau.addEventListener("click", function(event) {
        let row = event.target.closest("li");
        if (row) {
            let id = row.dataset.id;

            // Crée l'URL avec les paramètres de requête
            let url = `jeu.php?id=${id}`;

            // Redirige vers la page avec les paramètres
            window.location.href = url;
        }
    });
}

