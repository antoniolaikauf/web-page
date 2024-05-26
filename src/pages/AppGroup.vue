<script>
import { store } from "../store";
import axios from "axios";
export default {
  name: "Message",
  data() {
    return {
      // dati da inviare a database per creazione messaggio
      message: {
        messageUser: "",
        nameUser: store.name,
      },
      messageBack: "",
      name:store.name, // nome da inviare a database per far riferimento allo user e crezione messaggio
    };
  },
  methods: {
    async invio_message() { // chiamata creazione messaggio
      try {
        const call = await axios.post("http://localhost:8000/api/v1/UserMessage", this.message);
        this.messageUser = "";
        console.log(call.data.risposta);
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
    }
  },
  mounted() {
    this.call_back() // chiamata caricamento pagina
  },
};
</script>
<template>
  <section>
    <h3>Gruppo generale</h3>
    <div class="group">
      <!-- lettura messaggi -->
      <div class="messagge d-flex">
        <div v-for="(singleMessage, i) in messageBack" class="mx-3" >
            <p  :class="singleMessage.user.name === name?'position-messageUser' :'position-messageUsers'">
              <div class="message-userlog">
                <small>
                  {{ singleMessage.user.name }}
                </small>
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
      div, small{
        color: $black;
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
