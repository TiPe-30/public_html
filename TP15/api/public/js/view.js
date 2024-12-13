// Module de la vue 
// Les éléments DOM 
const button = document.getElementsByTagName("button")[0];  // le boutton du formulaire
const input = document.querySelector("input");
const output = document.querySelector("output");


// 
const view = {
    // Lire le contenu de la vue
    read: function () {
        // 
        ///////////////////////////////////////////////////////
        // A COMPLETER
        ///////////////////////////////////////////////////////
            return input.value;
        // 
    },
    // Met à jour la vue
    update: function (out) {
        output.textContent = out.toString();
    },
    // Accrocher une fonction callback à un événement click du bouton de la vue
    addEventListener: function (callback) { button.addEventListener("click", callback); }
}

export default view;