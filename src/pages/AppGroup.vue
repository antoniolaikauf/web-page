<script>
import { store } from "../store";
import axios from "axios";
export default {
  name: "Message",
  data() {
    return {
      message: {
        messageUser: "",
        nameUser: store.name,
      },
      messageBack: "",
      name:store.name,
    };
  },
  methods: {
    async invio_message() {
      try {
        const call = await axios.post("http://localhost:8000/api/v1/UserMessage", this.message);
        this.messageUser = "";
        console.log(call.data.risposta);
        this.messageBack = call.data.risposta;
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    console.log(store.name);
  },
};
</script>
<template>
  <section>
    <h3>Gruppo generale</h3>
    <div class="group">
      <div class="messaggi text-start">
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
* {
  color: black;
}
.group {
  margin: auto;
  width: 80%;
  height: 70vh;
  border: 1px solid black;
  border-radius: 8px;
  backdrop-filter: blur(10px);
  .messaggi {
    height: 90%;
    overflow-y: scroll;
    display: flex;
    flex-direction: column-reverse;
  }
  .enter-message {
    height: calc(100% - 90%);
    display: flex;
    padding: 17px;
    justify-content: space-between;
    border-top: 1px solid black;
    input {
      border-radius: 8px;
      width: 70%;
    }
    button {
      width: 5%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  }
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 8px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: purple;
  border-radius: 10px;
}
@media screen and (max-width: 1000px) {
  .group {
    width: 100%;
  }
}

.message-userlog {
  background-color: white;
  border-radius: 10px;
  padding: 5px;
  max-width: 50%;
  div{
    color: black;
  }
}

.position-messageUser{
 display: flex;
 justify-content: end;
}

.position-messageUsers{
  display: flex;
  justify-content: start;
}
</style>
