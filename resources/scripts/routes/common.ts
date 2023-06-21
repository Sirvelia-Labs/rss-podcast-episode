import Alpine from 'alpinejs';
import { AudioCustom } from '../components/audioCustom';
import { SingleAudioCustom } from '../components/singleAudio';

export default {
  init() {
    AudioCustom();
    SingleAudioCustom();
    //JavaScript to be fired on all pages, before page specific JS is fired
    window.Alpine = Alpine;
    Alpine.start();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
