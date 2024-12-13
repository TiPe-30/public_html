//////////////// Module contrôleur ///////////////// 
// On a besoin de la vue et du modèle
import view from "./view.js";
import model from "./model.js";

// Callback pour la réaction du modèle
function onAnswser(text) {
    
    ///////////////////////////////////////////////////////
    // A COMPLETER
    ///////////////////////////////////////////////////////
    
    // 
}

// Callback pour la réaction au click
function onSaluer() {
    // 
    ///////////////////////////////////////////////////////
    // A COMPLETER
    ///////////////////////////////////////////////////////

    // 
}

// Attache le controleur au bouton
view.addEventListener(onSaluer);
model.saluer("onAnswer",onAnswser);