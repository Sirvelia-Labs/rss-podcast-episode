import { AlpineComponent } from 'alpinejs'

interface Audio {
    title: String
    description: String
    link: String
    guid: String
    pubDate: String
    duration: String
    image: String
    enclosure: String
}

export const AudioCustom = (Alpine: AlpineComponent) =>

    Alpine.data('audioData', (audios: Audio[]) => ({

        currentTime: '00:00',
        showMoreItem: null,
        selectedItem: 0,
        items: audios,
        playing: false,

        init() {
            this.$watch('selectedItem', () => { this.$refs.audioin.play(); this.playing = true })

            var audioElement = this.$refs.audioin;
            var progressBar = this.$refs.progress;

            audioElement.addEventListener("timeupdate", () => {
                this.currentTime = formatSeconds(audioElement.currentTime);
                var progressPercentage = (audioElement.currentTime / audioElement.duration) * 100;
                progressBar.style.width = progressPercentage + "%";
            });
        },

        seek($event: any) {
            var progressBarWidth = this.$refs.progressBar.clientWidth;
            var clickPositionX = $event.offsetX;
            var progressPercentage = (clickPositionX / progressBarWidth) * 100;
            var seekTime = (progressPercentage / 100) * this.$refs.audioin.duration;
            this.$refs.audioin.currentTime = seekTime;
        },


        changePlaying(index: number) {
            this.playing ? this.$refs.audioin.pause() : this.$refs.audioin.play();
            this.playing = !this.playing;
            this.selectedItem = index;
        },

        advanceSeconds() {
            this.$refs.audioin.currentTime = this.$refs.audioin.currentTime + 30;
        },

        moveBackSeconds() {
            this.$refs.audioin.currentTime = this.$refs.audioin.currentTime - 30;
        }


    }))

function formatSeconds(currenTime: number) {
    var hours = Math.floor(currenTime / 3600);
    var minutes = Math.floor((currenTime % 3600) / 60);
    var seconds = Math.floor(currenTime % 60);

    var time = '';

    if (hours > 0) {
        time += hours.toString().padStart(2, '0') + ':';
    }

    time += minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

    return time;
}
