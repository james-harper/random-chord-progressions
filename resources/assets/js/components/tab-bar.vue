<template>
<span>
    <span
        v-if="showChordNames"
        v-for="(chord, index) in bar.chords"
        style="font-size:11px"
    >
        {{ index > 0 ? ' | ' : ''}}
        {{!Chord.isNamed(chord) ? Chord.findByShape(chord) : chord}}
    </span>

    <span class="tab-line">{{draw(strings.e)}}</span>
    <span class="tab-line">{{draw(strings.B)}}</span>
    <span class="tab-line">{{draw(strings.G)}}</span>
    <span class="tab-line">{{draw(strings.D)}}</span>
    <span class="tab-line">{{draw(strings.A)}}</span>
    <span class="tab-line">{{draw(strings.E)}}</span>
</span>
</template>

<script>
import _ from 'lodash';
import {supportedChords, strings} from './../constants';
import Bar from './../utils/bar';
import Pattern from './../utils/pattern';
import Chord from './../utils/chord';

export default {
    data() {
        return {
            Chord,
            strings
        };
    },
    props: ['bar', 'index', 'showChordNames'],
    methods: {
    /**
     * Render one bar of tablature for a single string
     *
     * @param {string} string
     * @returns {string}
     */
    draw(string) {
      if (this.bar.pattern.toLowerCase() === 'random') {
        this.bar.pattern = Pattern.random();
      }

      return Bar.draw(this.bar.chords, string, this.bar.pattern, this.index);
    }
  }
};
</script>

<style>
.tab-line {
  display: block;
}
</style>
