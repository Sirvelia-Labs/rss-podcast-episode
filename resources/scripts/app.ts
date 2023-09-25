import Alpine from 'alpinejs';

import { AudioCustom } from './components/audioCustom';
import { SingleAudioCustom } from './components/singleAudio';

// Load Events
window.addEventListener('DOMContentLoaded', () => {
  window.Alpine = Alpine;
  Alpine.plugin(AudioCustom)
  Alpine.plugin(SingleAudioCustom)
  Alpine.start();
});