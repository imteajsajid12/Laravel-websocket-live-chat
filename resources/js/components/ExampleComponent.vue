<template>
  <!-- <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">Chat</div>
          <div
            v-for="messages in messege"
            :key="messages"
          >
                <div v-if="messages.user == authu" class="card-body" id="you" style=" background-color:antiquewhite; border-radius: 7%; float-right;">
              <div>
                <div class="title">
                  <span>{{ messages.user }}</span>
                </div>
                <p>{{ messages.message }}</p>
              </div>
            </div>
            <div v-else class="card-body" id="you" style=" background-color:antiquewhite; border-radius: 7%;">
              <div style="float-right">
                <div class="title">
                  <span>{{ messages.user }}</span>
                </div>
                <p>{{ messages.message }}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="futtre">
          <form method="get" @submit.prevent="Send">
            <div class="form-row align-items-center">
              <div class="col-md-10">
                <label class="sr-only" for="inlineFormInput">Message</label>
                <input
                  type="text"
                  class="form-control mb-10"
                  id="inlineFormInput"
                  required
                  v-model="messages.messege"
                  placeholder="Message"
                />
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary mb-2">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-header">Aktive Pepole</div>
          <div class="overflow-auto">
            <ul>
              <li v-for="user in users" :key="user">
                {{ user.name }}
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <main class="content">
    <div class="container p-0">
      <h1 class="h3 mb-3">Messages</h1>

      <div class="card">
        <div class="row g-0">
          <div class="col-12 col-lg-5 col-xl-3 border-right">
            <div class="px-4 d-none d-md-block">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                  <input
                    type="text"
                    class="form-control my-3"
                    placeholder="Search..."
                  />
                </div>
              </div>
            </div>
            <div class="aktive" v-for="user in users" :key="user">
              <a
                href="#"
                class="list-group-item list-group-item-action border-0"
              >
                <div class="badge bg-success float-right">5</div>
                <div class="d-flex align-items-start">
                  <img
                    src="https://bootdey.com/img/Content/avatar/avatar5.png"
                    class="rounded-circle mr-1"
                    alt="Vanessa Tucker"
                    width="40"
                    height="40"
                  />
                  <div class="flex-grow-1 ml-3">
                    {{user.name}}
                    <div class="small">
                      <span class="fas fa-circle chat-online"></span> Online
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <hr class="d-block d-lg-none mt-1 mb-0" />
          </div>
          <div class="col-12 col-lg-7 col-xl-9">
            <div class="py-2 px-4 border-bottom d-none d-lg-block">
              <div class="d-flex align-items-center py-1">
                <div class="position-relative">
                  <img
                    src="https://bootdey.com/img/Content/avatar/avatar3.png"
                    class="rounded-circle mr-1"
                    alt="Sharon Lessman"
                    width="40"
                    height="40"
                  />
                </div>
                <div class="flex-grow-1 pl-3">
                  <strong>MY chat</strong>
                  <div class="text-muted small"><em></em></div>
                </div>
                <div>
                  <button class="btn btn-primary btn-lg mr-1 px-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-phone feather-lg"
                    >
                      <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                      ></path>
                    </svg>
                  </button>
                  <button
                    class="
                      btn btn-info btn-lg
                      mr-1
                      px-3
                      d-none d-md-inline-block
                    "
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-video feather-lg"
                    >
                      <polygon points="23 7 16 12 23 17 23 7"></polygon>
                      <rect
                        x="1"
                        y="5"
                        width="15"
                        height="14"
                        rx="2"
                        ry="2"
                      ></rect>
                    </svg>
                  </button>
                  <button class="btn btn-light border btn-lg px-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-more-horizontal feather-lg"
                    >
                      <circle cx="12" cy="12" r="1"></circle>
                      <circle cx="19" cy="12" r="1"></circle>
                      <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="position-relative">
              <div
                class="chat-messages p-4"
                v-for="messages in messege"
                :key="messages"
              >
                <div
                  class="chat-message-right pb-4"
                  v-if="messages.user == authu"
                >
                  <div>
                    <img
                      src="https://bootdey.com/img/Content/avatar/avatar1.png"
                      class="rounded-circle mr-1"
                      alt="Chris Wood"
                      width="40"
                      height="40"
                    />
                    <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                  </div>
                  <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                    <div class="font-weight-bold mb-1">You</div>
                    {{ messages.message }}
                  </div>
                </div>

                <div class="chat-message-left pb-4" v-else>
                  <div>
                    <img
                      src="https://bootdey.com/img/Content/avatar/avatar3.png"
                      class="rounded-circle mr-1"
                      alt="Sharon Lessman"
                      width="40"
                      height="40"
                    />
                    <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                  </div>
                  <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                    <div class="font-weight-bold mb-1">{{ messages.user }}</div>
                    {{ messages.message }}
                  </div>
                </div>
              </div>
            </div>

            <div class="flex-grow-0 py-3 px-4 border-top">
              <form @submit.prevent="Send">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                   @click="typeing" v-model="messages.messege"
                    placeholder="Type your message"
                  />
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<style>
body {
  margin-top: 20px;
}

.chat-online {
  color: #34ce57;
}

.chat-offline {
  color: #e4606d;
}

.chat-messages {
  display: flex;
  flex-direction: column;
  max-height: 800px;
  overflow-y: scroll;
}

.chat-message-left,
.chat-message-right {
  display: flex;
  flex-shrink: 0;
}

.chat-message-left {
  margin-right: auto;
}

.chat-message-right {
  flex-direction: row-reverse;
  margin-left: auto;
}
.py-3 {
  padding-top: 1rem !important;
  padding-bottom: 1rem !important;
}
.px-4 {
  padding-right: 1.5rem !important;
  padding-left: 1.5rem !important;
}
.flex-grow-0 {
  flex-grow: 0 !important;
}
.border-top {
  border-top: 1px solid #dee2e6 !important;
}
</style>

<script>
export default {
  data() {
    return {
      users: [],
      messege: [],
      messages: {
        messege: "",
      },
      authu: "",
    };
  },
  methods: {
    //send
    Send() {
      axios
        .post("/send", this.messages)
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    typeing() {
      //  alert("typing");
        Echo.public(`chatify`)
    .whisper('typing', {
        name: 'imteaj'
    });
    },
    audio() {
      const audio = new Audio("/asset/iphone.mp3");
      audio.play();
    },
    join1() {
      Echo.join(`chatify`).here((users) => {
        this.users = users;
      });
    },
  },

  mounted() {
    axios
      .post(`/authu`)
      .then(({ data }) => {
        this.authu = data;
      })
      .catch((err) => ocnsole.error(err));
  },
  created() {
    Echo.channel("chatify").listen("EventNotify", (e) => {
      this.messege.push(e.message);
      this.messages.messege = "";
      this.audio();
      if (this.authu == e.message.user) {
      } else {
        this.$toast.success({
          title: e.message.user,
          message: "Send A new Messege",
        });
      }
    });
    Echo.join(`chatify`)
      .here((users) => {
        console.log(users);
        this.users = users;
      })
      .joining((user) => {
        // this.users=user;
        this.users.push(user);
        console.log(user);
      })
      .leaving((user) => {
        this.users.splice(user);

        console.log(user);
      })
      .error((error) => {
        console.error(error);
      });

  },
};
</script>
