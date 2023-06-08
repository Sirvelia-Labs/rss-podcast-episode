import Alpine from 'alpinejs';

export default {
  init() {
    //JavaScript to be fired on all pages, before page specific JS is fired
    window.Alpine = Alpine;
    Alpine.start();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
