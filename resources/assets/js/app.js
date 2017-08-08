import Vue from 'vue';
import axios from 'axios';
import _ from 'lodash';
import chordMap from './chord-map';

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
        mode: 'table',
        progression: false,
        chords: false,
        isLoading: false
    },
    methods: {
        generate() {
            this.isLoading = true;
            this.progression = false;

            axios.post('/generate', {
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
        }
    },
    created() {
        this.root = _.sample(Object.keys(chordMap));
        this.tonality = _.sample(['major', 'minor']);
        this.bars = _.sample([4, 8]);
    }
});