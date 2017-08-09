<!DOCTYPE html>
<html>
<head>
    @include('layouts.parts.meta')
    <title>Random Chord Progression Generator</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    @include('layouts.parts.css')
</head>
<body class="main">
    <div id="app">
        <page-header></page-header>
        @include('pages.form')
        <section class="section results" v-if="chords">
            <hr>
            <div class="container flex-center">
                <div class="field is-grouped mode-select">
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

        <page-footer :fixed="!!progression && (mode==='tab' || bars >= 12)"></page-footer>
    </div>
@include('layouts.parts.js')
</body>
</html>
