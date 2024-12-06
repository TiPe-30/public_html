// PARTIE CONTROLLER

import { view } from "./view.js";
import { RandomDe } from "./model.js";

view.addEventListener(() => {
    view.update(RandomDe.genere())
});

