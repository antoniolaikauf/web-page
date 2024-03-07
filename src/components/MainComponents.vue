<script>
export default {
  name: "Main",
};
</script>

<template>
  <div class="d-inline-block">
    <div id="text-container">
      salve sono cyberia l'intelligenza arificiale di antonio cosa desidera ?
    </div>
  </div>
</template>

<style lang="scss">
@import "./../style/general.scss";

// animazione per testo
@keyframes type {
  0% {
    width: 0%;
  }
  100% {
    width: 100%;
  }
}

// caratteristiche animazione
#text-container {
  // questa proprietà permette di gestire il testo. es. il nowrap non lo fara andare a capo anche se il suo contenitore e piu piccolo e il testo non ci starebbe al suo interno
  white-space: nowrap;
  overflow: hidden;
  border-right: 2px solid #000;
  font-size: 24px;
  // permette di rompere l'animazione in segmenti link per vedere come funziona  https://designmodo.com/steps-css-animations/
  animation: type 6s steps(50);
}
</style>
