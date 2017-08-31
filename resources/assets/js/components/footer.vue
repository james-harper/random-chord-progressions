<template lang="pug">
  footer(class="footer", :class="{'fixed': fixed, 'is-hidden': hideFooter}")
    div(class="container")
      div(class="content has-text-centered")
        p
          strong Random Chord Progression Generator
          a(href="https://github.com/james-harper/random-chord-progressions/", target="_blank")
            span(class="icon") #[i(class="fa fa-github")]
          br
          a(href="mailto:james.is@coolasf.uk") james.is@coolasf.uk
</template>

<script>
import devtools from 'devtools-detect';

export default {
  data() {
    return {
      isMobile: /iPhone|iPad|iPod|Android/i.test(navigator.userAgent),
      devtools
    }
  },
  computed: {
    hideFooter() {
      return (
        this.isMobile ||
        (this.devtools.open && this.devtools.orientation === 'horizontal')
      );
    }
  },
  props: ['fixed']
}
</script>

<style scoped>
.footer {
  max-height: 10px;
  padding: 30px 5px 60px;
  border-top: 1px solid #d3d6db;
  bottom: 0;
  width: 100%;
}

.fixed {
  position: fixed;
}
</style>
