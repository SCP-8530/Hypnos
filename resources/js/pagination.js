// author : Philippe Bertrand

// Fonction pour ajouter l'animation CSS personnalisée à la pagination
function animatePagination() {
    const paginationItems = document.querySelectorAll('.pagination li');

    paginationItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 100}ms`;
        item.classList.add('pagination-item-animation');
    });
}

// Appelle la fonction d'animation lorsque la page est entièrement chargée
window.addEventListener('load', animatePagination);

// Lorsque le lien de pagination est cliqué
$('.pagination a').on('click', function (event) {
    event.preventDefault();

    // Récupérer l'URL de la page suivante
    var nextPageUrl = $(this).attr('href');

    // Sélectionner les cartes à animer
    var cards = $('.card');

    // Ajouter la classe de transition aux cartes
    cards.addClass('card-transition');

    setTimeout(function () {
        // Rediriger vers la page suivante après la durée de l'animation
        window.location.href = nextPageUrl;
    }, 300);
});
// Fonction qui change l'image du bouton en un icone quand on passe le curseur dessus
function boutonSuppModif(btn) {
    btn.addEventListener('mouseenter', function() {
        this.querySelector('.btn-text').classList.add('d-none');
        this.querySelector('.btn-icon').classList.remove('d-none');
    });

    btn.addEventListener('mouseleave', function() {
        this.querySelector('.btn-text').classList.remove('d-none');
        this.querySelector('.btn-icon').classList.add('d-none');
    });
}

// Afficher la poubelle quand le curseur est sur "Supprimer"
const btnSupprimer = document.querySelector('.btn-danger');
boutonSuppModif(btnSupprimer);

// Afficher l'icône modifier quand le curseur est sur le bouton modifier
const btnModifier = document.querySelector('.btn-warning');
boutonSuppModif(btnModifier);


// Faire en sorte de dérouler le dropdown menu seulement en le hover
const dropdownToggle = document.querySelector('.navbar .dropdown-toggle');
const dropdownMenu = document.querySelector('.navbar .dropdown-menu');


// Dropdown menu animation
dropdownToggle.addEventListener('click', function () {
    if (dropdownMenu.style.display === 'block') {
        dropdownMenu.style.display = 'none';
    } else {
        dropdownMenu.style.display = 'block';
    }
});
