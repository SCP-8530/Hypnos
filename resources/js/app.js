import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(".chosen-select").chosen({no_results_text: "Ajouter au moins un prof"});



