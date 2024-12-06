//////////////// Partie Modèle //////////////////////
// formule (nombre * 1.8) + 32

const convert = {
    convertToFarenheit: (nombre)=>{
        return Math.floor((nombre * 1.8)+32);
    }
};

export {convert};