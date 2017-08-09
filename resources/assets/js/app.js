import Vue from 'vue';
import axios from 'axios';
import _sample from 'lodash/sample';
import chordMap from './chord-map';

Vue.component('page-header', require('./components/header.vue'));
Vue.component('tab', require('./components/tab.vue'));
Vue.component('tab-bar', require('./components/tab-bar.vue'));
Vue.component('results', require('./components/results.vue'));
Vue.component('page-footer', require('./components/footer.vue'));

new Vue({
    el: '#app',
    data: {
        root: 'A',
        tonality: 'major',
        bars: '8',
        mode: window.localStorage.getItem('mode') || 'table',
        progression: false,
        chords: false,
        isLoading: false
    },
    methods: {
        generate() {
            this.isLoading = true;
            this.progression = false;

            axios.post('/api/generate', {
                key: this.root,
                tonality: this.tonality,
                bars: this.bars
            }).then((response) => {
                this.progression = response.data;
                this.chords = response.data.map(bar => bar.chords);
                this.isLoading = false;
            });
        },
        selectMode(mode) {
            this.mode = mode;
            window.localStorage.setItem('mode', mode);
        }
    },
    created() {
        this.root = _sample(Object.keys(chordMap));
        this.tonality = _sample(['major', 'minor']);
        this.bars = _sample([4, 8]);

        document.addEventListener('keydown', e => {
            switch (e.key) {
                case 'Enter':
                    this.generate();
                    break;
                case 't':
                    let m = this.mode === 'table' ? 'tab' : 'table';
                    this.selectMode(m);
                    break;
            }
        });
    }
});
