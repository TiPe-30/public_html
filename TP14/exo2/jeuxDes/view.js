const sortie_output = document.getElementsByTagName("output")[0];
const button = document.getElementsByTagName("button")[0];

const view = {
    update: function(value){sortie_output.textContent = value.toString();},
    
    addEventListener: function (callback){button.addEventListener("click",callback);}
};


export {view};