import Alpine from 'alpinejs';
import { AudioCustom } from '../components/audioCustom';
import { SingleAudioCustom } from '../components/singleAudio';

export default {
  init() {
    window.Alpine = Alpine;
    Alpine.plugin(AudioCustom)
    Alpine.plugin(SingleAudioCustom)
    Alpine.start();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
