// La vue 
const input = document.querySelector("header input");       // La zone input du header
const tbody =  document.querySelector("main table tbody");  // La zone de sortie, juste le body de la table dans le main
const rowTemplate = document.querySelector("#rowTemplate");    // le template d'une ligne de la table

const view = {
    read: function () {
        // 
        ///////////////////////////////////////////////////////
        // A COMPLETER
        ///////////////////////////////////////////////////////
        return input.value;
        // 
    },
    // Fonction qui affiche tous les contacts dans la table tbody
    update: function (contacts) {
       // 
       const nbContacts = contacts.length;
       // Demande le bon nombre de ligne dans la table
       this.setTableSize(nbContacts);
       // Remplit tous les contacts
       for (let i = 0; i < nbContacts; i++) {
           // Récupère tous les td la ligne (tr)
           const td = tbody.children[i].children;
           let contact = contacts[i];
           // Remplit les colonnes
           td[0].textContent = contact.prenom;
           td[1].textContent = contact.nom;
           td[2].textContent = contact.mobile;
       }
       //
    },

    // 
    // Fonction qui ajuste le nombre de ligne (tr) de la partie body de la table 
    // Il faut au moins 1 lignes : le titre et une ligne vide à cloner
    // NB: cette méthode fonctionne sur un nombre indéfini de colonnes
    setTableSize: function (size) {
        // Regarde la taille actuelle de la table
        let actualSize = tbody.children.length;
        // Si c'est la taille demandée, on ne fait rien
        if (size == actualSize) {
            return;
        }
        // Si c'est trop petit, on ajoute des lignes en clonant le contenu du template de ligne
        if (actualSize < size) {
            for (let i = actualSize; i < size; i++) {
                // Duplique le template d'une ligne de tableau
                let n = rowTemplate.content.cloneNode(true);
                // l'ajoute à la partie body de la table
                tbody.appendChild(n);
            }
        } else {
            // La table est trop grande, il faut supprimer des lignes
            for (let i = actualSize; i > size; i--) {
                // Supprime le dernier fils
                tbody.removeChild(tbody.lastElementChild);
            }
        }
    },

    //  
     // Accrocher une fonction callback à un événement click du bouton de la vue
     addEventListener: function (callback) {
        // 
        ///////////////////////////////////////////////////////
        // A COMPLETER
        ///////////////////////////////////////////////////////
        input.addEventListener("input",callback);
        // 
    }
};

export default view;