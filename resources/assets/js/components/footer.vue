<template>
<footer class="footer is-hidden-mobile" :class="{'fixed': !fixed}">
  <div class="container">
    <div class="content has-text-centered">
      <p>
      <strong>Random Chord Progression Generator</strong><br>
         <a href="mailto:james.is@coolasf.uk">
        	 james.is@coolasf.uk
        </a>
      </p>
    </div>
  </div>
</footer>
</template>

<script>
export default {
    props: ['fixed']
}
</script>

<style scoped>
.footer {
    max-height:  10px;
    padding: 30px 5px 60px;
    border-top: 1px solid #d3d6db;
    bottom:0;
    width:100%;
}

.fixed {
    position: fixed;
}
</style>
