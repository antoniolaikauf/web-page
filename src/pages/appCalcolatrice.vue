<script>
export default {
  name: "calculator",

  data() {
    return {
      pulsanti: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
      operazione: ["+", "-", "x", "/"],
    };
  },
};
</script>
<template>
  <section>
    <div class="calculator">
      <div v-for="(pulsante, i) in pulsanti">{{ pulsante }}</div>
    </div>
  </section>
</template>
<style lang="scss" scoped>
.calculator {
  width: 50%;
  margin: auto;
  border: 1px solid black;
  display: flex;
  flex-wrap: wrap;
  div {
    width: 20%;
  }
}
</style>
