<script>
export default {
  name: "NavBar",
};
</script>

<template>
  <section>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4">
      <div class="container-fluid">
        <a class="navbar-brand container-img" href="#">
          <img src="../../public/img/cyberia.png" alt="#" class="logo-img"
        /></a>
        <button
          class="navbar-toggler button"
          id="drop-bottone"
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
              <a class="nav-link active fs-4 text-font" aria-current="page" href="#"
                ><router-link :to="{ name: 'home' }"> Home </router-link></a
              >
            </li>
            <li class="nav-item fs-4">
              <a class="nav-link active text-font" aria-current="page" href="#">
                <router-link :to="{ name: 'gioco' }"> Giochi </router-link></a
              >
            </li>
            <li class="nav-item fs-4">
              <a
                class="nav-link active"
                aria-current="page"
                target="_blank"
                href="https://github.com/antoniolaikauf"
                ><i class="fa-brands fa-github"></i>
              </a>
            </li>
            <li class="nav-item fs-4">
              <a
                class="nav-link active"
                aria-current="page"
                target="_blank"
                href="https://www.linkedin.com/in/antonio-laikauf-8239892b8/"
                ><i class="fa-brands fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
</template>

<style lang="scss">
@import "./../style/general.scss";
@import "./../style/partials/_variable.scss";
.container-img {
  width: 100px;
  height: 100px;

  .logo-img {
    width: 100%;
  }
}

#drop-bottone {
  background-color: ghostwhite;
}

.text-font {
  font-family: $font_cyberia;
}
</style>
