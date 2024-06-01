<script>
export default {
  name: "NavBar",
};
</script>

<template>
  <section>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-4 mb-5">
      <div class="container-fluid">
        <a class="navbar-brand container-img" href="#"> <img src="../../public/img/logo.png" alt="#" class="logo-img" /></a>
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
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'home' }"> Home </router-link></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'Traslate' }"> Traslate </router-link></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'calcolatrice' }"> Calculator </router-link></a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link active fs-4" aria-current="page" href="#"><router-link :to="{ name: 'login' }">Login</router-link></a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active fs-4" aria-current="page" href="#"> <router-link :to="{ name: 'gioco' }"> Games </router-link></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fs-4 text-white" aria-current="page" target="_blank" href="https://github.com/antoniolaikauf"> Github </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active text-white fs-4"
                aria-current="page"
                target="_blank"
                href="https://www.linkedin.com/in/antonio-laikauf-8239892b8/"
                >Linkedin
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
</template>

<style lang="scss" scoped>
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;
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
</style>
