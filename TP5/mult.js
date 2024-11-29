let nombre;
do{
    nombre = prompt("Entrez un nombre pour la table de multiplication",3);
}while(isNaN(nombre));

for(let i = 0; i <= 10;i++)
    console.log(i+" x "+nombre+" = "+(i*nombre));

