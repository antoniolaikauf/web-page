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
      // console.log(this.message);
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
        <div v-for="(singleMessage, i) in messageBack">
          <span>
            <p v-for="(MessageUser, i) in singleMessage.messages">
              <div class="message-userlog">
                <div>
                  {{ singleMessage.name }}
                </div>
                <div>
                  {{ MessageUser.content }}
                </div>
              </div>
            </p>
          </span>
        </div>
      </div>
      <div class="enter">
        <input type="text" v-model="message.messageUser" />
        <button class="btn-page" @click="invio_message">Enter</button>
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
  padding: 20px;
  backdrop-filter: blur(10px);
  overflow-y: scroll;
  .messaggi {
    height: 95%;
  }
  .enter {
    height: calc(100% - 95%);
    display: flex;
    justify-content: space-between;
    input {
      width: 70%;
    }
    button {
      width: 10%;
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
  .messaggi {
    width: 100%;
  }
}

.message-userlog {
  background-color: white;
  border-radius: 10px;
  padding: 5px;
  width: 40%;
  div{
    color: black;
  }
}
</style>
