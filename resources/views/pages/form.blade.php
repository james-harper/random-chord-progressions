<section class="section has-pb0">
	<div class="container">
	    <h2 class="subtitle">
	    Choose the key and duration of your progression.
	    </h2>

        <div class="is-horizontal">
            <div class="control is-grouped">
                <p class="control is-expanded">
                    <span class="select is-fullwidth">
                        <select name="key" v-model="root">
                        @foreach($notes as $note)
                            <option value="{{$note}}">{{ $note }}</option>
                        @endforeach
                        </select>
                    </span>
                </p>
                <p class="control is-expanded">
                    <span class="select is-fullwidth">
                        <select name="tonality" v-model="tonality">
                            <option value="major">Major</option>
                            <option value="minor">Minor</option>
                        </select>
                    </span>
                </p>
                <p class="control is-expanded">
                    <span class="select is-fullwidth">
                        <select name="bars" v-model="bars">
                            <option value="4">4 Bars</option>
                            <option value="8">8 Bars</option>
                            <option value="16">16 Bars</option>
                        </select>
                    </span>
                </p>

                <p class="control">
                    <button class="button is-info" @click="generate()" :class="{'is-loading': isLoading}">
                        Generate
                    </button>
                </p>
            </div>
        </div>
	</div>
</section>
