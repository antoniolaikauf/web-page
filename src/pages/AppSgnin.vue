<script>
export default {
  name: "Signin",
};
</script>
<template>
  <div class="dati_utente">
    <form @submit.prevent="" class="my-2">
      <div>
        <label for="name">Inserire Nome</label> <br />
        <input type="text" id="name" placeholder="Nome" />
      </div>
      <div>
        <label for="password"> Inserire password</label> <br />
        <input type="password" id="password" placeholder="Password" />
      </div>
      <input type="submit" class="btn-page" value="Accedi" />
    </form>
  </div>
</template>
<style scoped lang="scss">
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;
.dati_utente {
  width: 250px;
  border: 1px solid grey;
  border-radius: 20px;
  padding: 20px 0px;
  div {
    padding: 10px 0;
    input {
      padding: 5px;
      border-radius: 2px;
      color: black;
    }
  }
}

@media screen and (max-width: 800px) {
  .dati_utente {
    width: 100%;
  }
}
</style>
