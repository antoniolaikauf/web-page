<script>
import axios from "axios";
export default {
  name: "Message",
  data() {
    return {
      // dati da inviare a database per creazione messaggio
      message: {
        messageUser: "",
        nameUser: window.localStorage.getItem('name') // con session i dati vengono rimossi quando chiudi la pagina
      },
      messageBack: "", // variabile contenente messaggi
      date: {  
        name:window.localStorage.getItem('name') // nome da inviare a database per far riferimento allo user e crezione messaggio
      }
    };
  },
  methods: {
    async deleteAccaunt() {
      try {
        const call = await axios.post("http://localhost:8000/api/v1/DeleteAccount", this.date);
        this.date_store()
      } catch (error) {
        console.log(error);
      }
    },
    async invio_message() { // chiamata creazione messaggio
      console.log(this.message.nameUser);
      try {
        const call = await axios.post("http://localhost:8000/api/v1/UserMessage", this.message);
        this.message.messageUser = "";
        this.messageBack = call.data.risposta;
      } catch (error) {
        console.log(error);
      }
    },
    async call_back() {  // chiamata caricamento pagina
      try {
       const call = await axios.get('http://localhost:8000/api/v1/MessageAll')
       console.log(call.data);
       this.messageBack=call.data.risposta
      } catch (error) {
        console.log(error);
      }
    },
    Logout() {
      this.date_store()
    },
    date_store() {
       // impostazioni per storage svuotamento 
      localStorage.setItem('remember_me_L', 'null')
      sessionStorage.setItem('remember_me_S', 'null')
       // eseguire eventi
      window.dispatchEvent(new Event("storage"))
      window.dispatchEvent(new Event('storage_accesso'))
      //dispatchEvent esegue un evento su un elemento in questo caso su windows, new Event('storage') crea un evento storage
      this.$router.push({name:'home'}) // porta alla pagina home è l'equivalente delle rotte nella navbar 
    }
  },
  mounted() {
    this.call_back() // chiamata caricamento pagina
  },
};
</script>
<template>
  <section>
    <h5>General group</h5>
       
      <button type="button" class="btn-page my-1" @click="Logout">Logout</button><br>
      <!-- Button trigger modal -->
      <button type="button" class="btn-page my-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">deleteAccaunt</button>
      <!-- Modal -->
      <div
        class="modal fade"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-black">Sei sicuro di voler eliminare l'account {{ date.name }}</div>
            <div class="modal-footer">
              <a type="button" class="btn btn-primary" @click="deleteAccaunt" data-bs-dismiss="modal">Delete</a>
            </div>
          </div>
        </div>
      </div>
    <div class="group">
      <!-- lettura messaggi -->
      <div class="messagge d-flex">
        <div v-for="(singleMessage, i) in messageBack" class="mx-3" :index="i">
            <p  :class="singleMessage.user.name === date.name ?'position-messageUser' :'position-messageUsers'">
              <div class="message-userlog">

                  <small class="name">{{ singleMessage.user.name }}</small>
                  <small class="date" >{{ new Date(singleMessage.created_at).toLocaleString('nl-NL') }}</small>
            
                <div>
                  {{ singleMessage.content }}
                </div>
              </div>
            </p>
        </div>
      </div>
      <!-- invio messaggi -->
      <div class="enter-message">
        <input type="text" v-model="message.messageUser" />
        <button class="btn-page" @click="invio_message"> &#8593</button>
      </div>
    </div>
  </section>
</template>
<style scoped lang="scss">
@use "./../style/partials/mixins" as *;
@use "./../style/general.scss" as *;
@use "./../style/partials/variable" as *;
.group {
  margin: auto;
  width: 80%;
  height: 70vh;
  border: 1px solid $black;
  border-radius: 8px;
  backdrop-filter: blur(10px);
  .messagge { // class messagg
    height: 90%;
    overflow-y: scroll;
    flex-direction: column-reverse;
    .message-userlog {
      background-color: white;
      border-radius: 10px;
      padding: 5px;
      max-width: 50%;
      div, .name,.date{
        color: $black;
      }
      .date{
        font-size: 10px;
        padding: 0px 4px;
      }
    }
  }
  .enter-message { // enter messagges
    height: calc(100% - 90%);
    display: flex;
    padding: 17px;
    justify-content: space-between;
    border-top: 1px solid $black;
    input {
      border-radius: 8px;
      width: 70%;
      color: $black;
    }
    button {
      width: 5%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  }
}
// class scrollbar
::-webkit-scrollbar {
  width: 10px;
}

::-webkit-scrollbar-thumb {
  background: purple;
  border-radius: 10px;
}
// messaggi user loggato
.position-messageUser{
  display: flex;
  justify-content: end;
  text-align: end;
}
// messggio altri users
.position-messageUsers{
  display: flex;
  justify-content: start;
  text-align: start;
}

@media screen and (max-width: 1000px) {
  .group {
    width: 100%;
  }
}
</style>
