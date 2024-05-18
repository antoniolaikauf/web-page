<script>
export default {
  name: "forum",
  data() {
    return {
      name: "rr",
      email: "antonio@gmial.com",
      password: "rrr",
    };
  },
  methods: {
      form() {
        
    //   console.log(this.name);
    //   console.log(this.email);
    //   console.log(this.password);
    },
  },
};
</script>
<template>
  <section>
    <div class="dati_utente">
      <form @submit.prevent="form">
        <div>
          <label for="name">Inserire Nome</label> <br />
          <input type="text" id="name" placeholder="Nome" v-model="name" />
        </div>
        <div>
          <label for="email">Inserire email</label> <br />
          <input type="email" id="email" placeholder="Email" v-model="email" />
        </div>
        <div>
          <label for="password"> Inserire password</label> <br />
          <input type="password" id="password" placeholder="Password" v-model="password" />
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
  width: 250px;
  border: 1px solid black;
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
