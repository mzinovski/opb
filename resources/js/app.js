import.meta.glob([
    "../images/**"
]);

import './bootstrap';

import flatpickr from 'flatpickr';
window.flatpickr = flatpickr;
import 'flatpickr/dist/themes/material_blue.css';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import Lightbox from "@edsardio/alpine-lightbox";
 
Alpine.plugin(intersect);

Alpine.plugin(Tooltip);

Alpine.plugin(collapse);

Alpine.plugin(Lightbox);

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// https://github.com/ryangjchandler/alpine-tooltip
import Tooltip from "@ryangjchandler/alpine-tooltip";

// https://github.com/biati-digital/glightbox
import GLightbox from 'glightbox';

const lightbox = GLightbox({ 
    openEffect: 'zoom',
    closeEffect: 'zoom',
    slideEffect: 'zoom'
});