require('./bootstrap');
// require('./index');

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import intersect from '@alpinejs/intersect';
import trap from '@alpinejs/trap';

Alpine.plugin(persist);
Alpine.plugin(intersect);
Alpine.plugin(trap);
// Add any extra packages you want to install here
window.Alpine = Alpine;


Alpine.store('darkMode', {
    on: false,

    toggle() {
        this.on = ! this.on
    }
});


Alpine.start();




