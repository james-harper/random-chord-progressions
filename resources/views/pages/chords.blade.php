<!DOCTYPE html>
<html>
<head>
	@include('layouts.parts.meta')
	<title>Random Chord Progression Generator</title>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	@include('layouts.parts.css')
</head>
<body class="main">
	@include('pages.header')

    <div id="app">
	    @include('pages.form')
        <section class="section" v-if="chords" style="padding-top:5px">
            <hr>
            <div class="container flex-center">
                <div class="field is-grouped" style="margin-top: -20px; padding-bottom: 20px">
                    <a class="button" :class="{'is-info': mode==='table'}" @click="selectMode('table')">
                    Table
                    </a>
                    <a class="button" :class="{'is-info': mode==='tab'}" @click="selectMode('tab')">
                    Tab
                    </a>
                </div>

                <results :progression="chords" v-show="mode==='table'"></results>
                <tab :progression="progression" :show-chord-names="true" v-show="mode==='tab'"></tab>
            </div>
        </section>

        <page-footer :fixed="!!progression && mode==='tab'"></page-footer>
    </div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@include('layouts.parts.js')
</body>
</html>