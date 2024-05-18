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
    <div>
      <form action="Get">
        <div>
          <label for="name">Inserire Nome</label> <br />
          <input type="text" id="name" />
        </div>
        <div>
          <label for="email">Inserire email</label> <br />
          <input type="email" id="email" />
        </div>
        <div>
          <label for="password"> Inserire password</label> <br />
          <input type="password" id="password" />
        </div>
        <input type="submit" value="Accedi" />
      </form>
    </div>
  </section>
</template>
<style lang="scss" scoped>
@use "./../style/general.scss" as *;
@use "./../style/partials/mixins" as *;
@use "./../style/partials/variable" as *;
</style>
