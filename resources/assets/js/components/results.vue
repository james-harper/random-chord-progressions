<template lang="pug">
  div
    table(class="table is-bordered is-striped")
      tr(v-for="bar in bars")
        td(
          v-for="chords in bar",
          class="is-centered",
          :class="{'p20': progression.length <= 8}"
        )
          span {{ chords.join(' | ') }}
</template>

<script>
import _chunk from 'lodash/chunk';
import {constants} from '@/constants';

export default {
  computed: {
    bars() {
      return _chunk(this.progression, constants.BEATS_PER_BAR);
    }
  },
  props: ['progression']
}
</script>

<style scoped>
td {
  width: 220px;
}

.p20 {
  padding: 20px;
}
</style>
