<template>
<div>
    <div class="tab-section courier-new flex-center">
        <span class="tab-row row" v-for="(chunk, index) in chunked">
            <span v-for="(bar, index) in chunk" class="bar">
                <tab-bar :index="index" :bar="bar" :showChordNames="showChordNames" />
            </span>
        </span>
    </div>
</div>
</template>

<script>
import _chunk from 'lodash/chunk'
import {constants} from './../constants';

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
