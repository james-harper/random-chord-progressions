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
import _ from 'lodash';
import {constants} from './../constants';

export default {
    props: ['progression', 'showChordNames'],
    computed: {
        chunked() {
            return _.chunk(this.progression,constants.BEATS_PER_BAR);
        }
    }
};
</script>

<style>
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

.flex-center {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
}

.courier-new {
  font-family: courier new;
  font-size: 15px;
}
</style>