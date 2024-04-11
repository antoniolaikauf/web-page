<script>
export default {
  name: "NotFound",
};
</script>

<template>
  <h1>404 - Pagina Non Trovata</h1>
  <p>Spiacente, la pagina che stai cercando non esiste o è stata rimossa.</p>
  <a class="nav-link active fs-4 text-font" aria-current="page" href="#"><router-link :to="{ name: 'home' }"> Home </router-link></a>
</template>

<style scoped lang="scss"></style>
