
import './bootstrap';
import './list.js';
import './map.js';
import './section-btn.js';
import './sidebar.js';
import './toggles.js';

import Inputmask from 'inputmask';
document.addEventListener("DOMContentLoaded", function(){
    var cnpjMask = new Inputmask("00.000.000/0000-00");
    cnpjMask.mask(document.querySelector('.cnpj'));
})
