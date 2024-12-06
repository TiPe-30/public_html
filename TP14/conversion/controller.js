//////////////// Partie Contrôleur /////////////////

import { view } from "./view.js";
import {convert} from "./model.js";


view.addEventListener(()=>{
    
    let modeleNumber = convert.convertToFarenheit(view.read());

    view.update(modeleNumber);
});