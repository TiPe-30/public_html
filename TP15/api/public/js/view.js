// Module de la vue 
// Les éléments DOM 
const button = document.getElementsByTagName("button")[0];  // le boutton du formulaire
// 
///////////////////////////////////////////////////////
// A COMPLETER
///////////////////////////////////////////////////////

// 
const view = {
    // Lire le contenu de la vue
    read: function () {
        // 
        ///////////////////////////////////////////////////////
        // A COMPLETER
        ///////////////////////////////////////////////////////

        // 
    },
    // Met à jour la vue
    update: function (out) {
        // 
        ///////////////////////////////////////////////////////
        // A COMPLETER
        ///////////////////////////////////////////////////////

        // 
    },
    // Accrocher une fonction callback à un événement click du bouton de la vue
    addEventListener: function (callback) { button.addEventListener("click", callback) }
}

export default view;