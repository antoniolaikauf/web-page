<script>
export default {
  name: "forum",
  data() {
    return {};
  },
};
</script>
<template>
  <section>
    <div class="dati_utente">
      <form action="Get">
        <div>
          <label for="name">Inserire Nome</label> <br />
          <input type="text" id="name" placeholder="Nome" />
        </div>
        <div>
          <label for="email">Inserire email</label> <br />
          <input type="email" id="email" placeholder="Email" />
        </div>
        <div>
          <label for="password"> Inserire password</label> <br />
          <input type="password" id="password" placeholder="Password" />
        </div>
        <input type="submit" class="btn-page" value="Accedi" />
      </form>
    </div>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;

.dati_utente {
  width: 25%;
  border: 1px solid black;
  border-radius: 20px;
  padding: 20px 0px;
  div {
    padding: 10px 0;
    input {
      padding: 5px;
      border-radius: 2px;
    }
  }
}

@media screen and (max-width: 800px) {
  .dati_utente {
    width: 100%;
  }
}
</style>
