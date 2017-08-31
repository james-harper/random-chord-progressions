<template lang="pug">
  span
    span(
      v-if="showChordNames"
      v-for="(chord, index) in chordShapes"
      :key="index"
      class="tab-label"
    ).
      {{ index > 0 ? ' | ' : ''}}
      {{ chord.name }}

    span(class="tab-line") {{draw(strings.e)}}
    span(class="tab-line") {{draw(strings.B)}}
    span(class="tab-line") {{draw(strings.G)}}
    span(class="tab-line") {{draw(strings.D)}}
    span(class="tab-line") {{draw(strings.A)}}
    span(class="tab-line") {{draw(strings.E)}}
</template>

<script>
import {supportedChords, strings} from '@/constants';
import Bar from '@/utils/bar';
import Pattern from '@/utils/pattern';
import Chord from '@/utils/chord';

export default {
  data() {
    return {
      Chord,
      strings,
      chordShapes: []
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

    let shapes = [];
    this.chordShapes.forEach(chord => { shapes.push(chord.shape) });
    return Bar.draw(shapes, string, this.bar.pattern, this.index);
  }
},
  created() {
  this.bar.chords.forEach(chord => {
    this.chordShapes.push({
      'name': chord,
      'shape': Chord.find(chord)
    });
  });
  }
};
</script>

<style scoped>
.tab-line {
  display: block;
}

.tab-label {
  font-size:11px;
}
</style>
