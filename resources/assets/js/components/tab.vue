<template lang="pug">
  div
    div(class="tab-section courier-new flex-center")
      span(v-for="(chunk,index) in chunked", :key="index", class="tab-row row")
        span(v-for="(bar, index) in chunk", :key="index", class="bar")
          tab-bar(:index="index" :bar="bar" :showChordNames="showChordNames")
</template>

<script>
import _chunk from 'lodash/chunk'
import {constants} from '@/constants';

export default {
  props: ['progression', 'showChordNames'],
  computed: {
    chunked() {
      return _chunk(this.progression,constants.BEATS_PER_BAR);
    }
  }
};
</script>

<style scoped>
.tab-section {
  width: 100%;
  padding: 0 10px;
}

.tab-row {
  padding-bottom: 10px;
}

.tab-row .bar {
  float: left;
}
</style>
