// controleur

let nombre_mult = prompt("Entrez un nombre, pour la table de multiplication : ");

let affiche = ("Voici la table du "+nombre_mult+" : \n").toString();

for(let i = 1;i <= 10;i++){
    affiche += (i+" x "+nombre_mult+" = "+(i*nombre_mult)+"\n").toString();
}

document.getElementsByTagName("pre")[0].textContent = affiche;

