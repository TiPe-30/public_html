//////////////// Partie Vue  ///////////////////////

const entree = document.querySelector("input");

const sortie = document.querySelector("output");

const view = {

    read: ()=>{return entree.value},

    update: (number)=>{
        sortie.textContent = number.toString();
    },

    addEventListener: (callback) => { document.querySelector("button").addEventListener("click", callback); }
};

export {view};