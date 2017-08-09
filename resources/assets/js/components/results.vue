<template>
<div>
    <table class="table is-bordered is-striped">
        <tr v-for="bar in bars">
            <td class="is-centered"  v-for="chords in bar">
                <span>
                    {{chords.join(' | ')}}
                </span>
            </td>
        </tr>
    </table>
</div>
</template>

<script>
import _chunk from 'lodash/chunk';
import {constants} from './../constants';

export default {
    computed: {
        bars() {
            return _chunk(this.progression, constants.BEATS_PER_BAR);
        }
    },
    props: ['progression']
}
</script>
