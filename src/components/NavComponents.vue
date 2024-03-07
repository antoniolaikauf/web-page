<script>
export default {
  name: "NavBar",
};
</script>

<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../../public/img/cyberia.png" alt="#" class="logo-img"
      /></a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse justify-content-end"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"
              ><router-link :to="{ name: 'home' }"> home </router-link></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"
              ><router-link :to="{ name: 'about' }"> about us </router-link></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <router-link :to="{ name: 'skils' }"> tags </router-link></a
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style>
@import "./../style/general.scss";
.logo-img {
  width: 15%;
}
</style>
