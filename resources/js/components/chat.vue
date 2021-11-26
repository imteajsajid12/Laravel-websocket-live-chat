<template>
    <div class="" id="#app">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100">
                <div class="col-md-4 col-xl-3 chat">
                    <div class="card mb-sm-3 mb-md-0 contacts_card">
                        <div class="card-header">
                            <div class="input-group">
                                <input
                                    type="text"
                                    placeholder="Search..."
                                    name=""
                                    class="form-control search"
                                />
                                <div class="input-group-prepend">
                                    <span class="input-group-text search_btn"
                                        ><i class="fas fa-search"></i
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body contacts_body">
                            <ui
                                class="contacts"
                                v-for="user in users"
                                :key="user"
                            >
                                <li class="active">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img
                                                :src="`/image/${user.image}`"
                                                alt=""
                                                style="
                                                    width: 110%;
                                                    height: 110%;
                                                    border-radius: 50%;
                                                "
                                            />
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span>{{ user.name }}</span>
                                            <p>{{ user.name }} is online</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- <li>
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg" class="rounded-circle user_img">
									<span class="online_icon offline"></span>
								</div>
								<div class="user_info">
									<span>Taherah Big</span>
									<p>Taherah left 7 mins ago</p>
								</div>
							</div>
						</li> -->
                            </ui>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="col-md-8 col-xl-6 chat">
                    <div class="card">
                        <div class="card-header msg_head">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img
                                        :src="`/image/${authu.image}`"
                                        alt=""
                                        style="
                                            width: 110%;
                                            height: 110%;
                                            border-radius: 50%;
                                        "
                                    />
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    <span>Chat with </span>
                                    <p>{{ type }}</p>
                                </div>
                                <div class="video_cam">
                                    <span><i class="fas fa-video"></i></span>
                                    <span><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            <span id="action_menu_btn"
                                ><i class="fas fa-ellipsis-v"></i
                            ></span>
                            <div class="action_menu">
                                <ul>
                                    <li>
                                        <i class="fas fa-user-circle"></i> View
                                        profile
                                    </li>
                                    <li>
                                        <i class="fas fa-users"></i> Add to
                                        close friends
                                    </li>
                                    <li>
                                        <i class="fas fa-plus"></i> Add to group
                                    </li>
                                    <li><i class="fas fa-ban"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body">
                            <div
                                class="d"
                                v-for="messages in messege"
                                :key="messages"
                            >
                                <div
                                    class="d-flex justify-content-start mb-4"
                                    v-if="messages.user.name == authu.name"
                                >
                                    <div class="img_cont_msg">
                                        <img
                                            :src="`/image/${messages.auth.image}`"
                                            alt=""
                                            style="
                                                width: 110%;
                                                height: 110%;
                                                border-radius: 50%;
                                            "
                                        />
                                    </div>
                                    <div class="msg_cotainer" v-if="messages.message">
                                        {{ messages.message }}

                                    </div>

                                    <div class="msg_cotainer" v-else>
                                        <img
                                            :src="`/chat/${messages.image}`"
                                            alt=""
                                            style="width: 80%; height: 50%"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="d-flex justify-content-end mb-4"
                                    v-else
                                >
                                    <div class="msg_cotainer_send" v-if="messages.message">

                                        {{ messages.message }}

                                    </div>

                                    <div class="msg_cotainer_send" v-else>
                                        <img
                                            :src="`/chat/${messages.image}`"
                                            alt=""
                                            style="width: 80%; height: 50%"
                                        />
                                    </div>
                                

                                    <div class="img_cont_msg">
                                        <img
                                            :src="`/image/${messages.auth.image}`"
                                            alt=""
                                            style="
                                                width: 110%;
                                                height: 110%;
                                                border-radius: 50%;
                                            "
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form
                                @submit.prevent="Send"
                                enctype="multipart/form-data"
                            >
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <!--img-->
                                        <input
                                            type="file"
                                            ref="file"
                                            name="image"
                                            v-on:change="onImageChange"
                                            style="display: none"
                                        />
                                        <a
                                            class="btn btn-primary"
                                            @click="$refs.file.click().prevent"
                                        >
                                            <i class="fas fa-paperclip"></i
                                        ></a>
                                        <!--img-->
                                    </div>
                                    <input
                                        @keypress="typeing"
                                        name=""
                                        v-model="messages.messege"

                                        class="form-control type_msg"
                                        placeholder="Type your message..."
                                    />
                                    <div class="input-group-append">
                                        <button
                                            name=""
                                            id=""
                                            class="btn btn-primary"
                                            type="submit"
                                            role="button"
                                        >
                                            <i
                                                class="fas fa-location-arrow"
                                            ></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tesr:"/chat/1637848931.jpg",
            image_show: false,
            image: "",
            type: "",
            users: [],
            messege: [],
            messages: {
                messege: "",
            },
            authu: {},
        };
    },

    methods: {
        //image
        onImageChange(e) {
            console.log(e.target.files[0]);
            this.image = e.target.files[0];
        },

        //send
        Send(e) {
            e.preventDefault();
            let currentObj = this;
            const config = {
                headers: { "content-type": "multipart/form-data" },
            };
            let formData = new FormData();
            formData.append("image", this.image);
            formData.append("messege", this.messages.messege);
            //axios
            axios
                .post("/send", formData, config)
                .then(function (response) {

                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
                 this.image = null;
        },
        typeing() {
            //  alert("typing");
            Echo.private(`chatify`).whisper("typing", {
                name: this.authu.name,
            });
        },
        audio() {
            const audio = new Audio("/asset/iphone.mp3");
            audio.play();
        },
        typesund() {
            const audio = new Audio("/asset/type.mp3");
            audio.play();
        },
        join1() {
            Echo.joining(`chatify`).here((users) => {
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
            console.log(e.message);
            this.messege.push(e.message);
            this.messages.messege = "";
            if (this.authu.name == e.message.auth.name) {
            } else {
                this.type = "";
                this.audio();
                this.$toast.success({
                    title: e.message.user.name,
                    message: "Send A new Messege",
                });
            }
            if (e.message.image == null) {
                this.image_show = false;
                //alert("hide");
            }
            else {
                this.image_show = true;
                //alert("show");
            }
        });
        Echo.join(`chatify`)
            .here((users) => {
                console.log(users);
                this.users = users;
            })
            .joining((user) => {
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
        Echo.private(`chatify`).listenForWhisper("typing", (e) => {
            this.type = "typing....";
            setTimeout(() => (this.type = ""), 5000);
            console.log(e.name);
        });
        if (this.type == "typing....") {
            alert("typing");
        }
    },
};
</script>

<style>
body,
html {
    height: 100%;
    margin: 0;
    background: #7f7fd5;
    background: -webkit-linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
    background: linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
}

.chat {
    margin-top: auto;
    margin-bottom: auto;
}
.card {
    height: 500px;
    border-radius: 15px !important;
    background-color: rgba(0, 0, 0, 0.4) !important;
}
.contacts_body {
    padding: 0.75rem 0 !important;
    overflow-y: auto;
    white-space: nowrap;
}
.msg_card_body {
    overflow-y: auto;
}
.card-header {
    border-radius: 15px 15px 0 0 !important;
    border-bottom: 0 !important;
}
.card-footer {
    border-radius: 0 0 15px 15px !important;
    border-top: 0 !important;
}
.container {
    align-content: center;
}
.search {
    border-radius: 15px 0 0 15px !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
}
.search:focus {
    box-shadow: none !important;
    outline: 0px !important;
}
.type_msg {
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    height: 60px !important;
    overflow-y: auto;
}
.type_msg:focus {
    box-shadow: none !important;
    outline: 0px !important;
}
.attach_btn {
    border-radius: 15px 0 0 15px !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    cursor: pointer;
}
.send_btn {
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    cursor: pointer;
}
.search_btn {
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0, 0, 0, 0.3) !important;
    border: 0 !important;
    color: white !important;
    cursor: pointer;
}
.contacts {
    list-style: none;
    padding: 0;
}
.contacts li {
    width: 100% !important;
    padding: 5px 10px;
    margin-bottom: 15px !important;
}
.active {
    background-color: rgba(0, 0, 0, 0.3);
}
.user_img {
    height: 70px;
    width: 70px;
    border: 1.5px solid #f5f6fa;
}
.user_img_msg {
    height: 40px;
    width: 40px;
    border: 1.5px solid #f5f6fa;
}
.img_cont {
    position: relative;
    height: 70px;
    width: 70px;
}
.img_cont_msg {
    height: 40px;
    width: 40px;
}
.online_icon {
    position: absolute;
    height: 15px;
    width: 15px;
    background-color: #4cd137;
    border-radius: 50%;
    bottom: 0.2em;
    right: 0.4em;
    border: 1.5px solid white;
}
.offline {
    background-color: #c23616 !important;
}
.user_info {
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 15px;
}
.user_info span {
    font-size: 20px;
    color: white;
}
.user_info p {
    font-size: 10px;
    color: rgba(255, 255, 255, 0.6);
}
.video_cam {
    margin-left: 50px;
    margin-top: 5px;
}
.video_cam span {
    color: white;
    font-size: 20px;
    cursor: pointer;
    margin-right: 20px;
}
.msg_cotainer {
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 10px;
    border-radius: 25px;
    background-color: #82ccdd;
    padding: 10px;
    position: relative;
}
.msg_cotainer_send {
    margin-top: auto;
    margin-bottom: auto;
    margin-right: 10px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
    position: relative;
}
.msg_time {
    position: absolute;
    left: 0;
    bottom: -15px;
    color: rgba(255, 255, 255, 0.5);
    font-size: 10px;
}
.msg_time_send {
    position: absolute;
    right: 0;
    bottom: -15px;
    color: rgba(255, 255, 255, 0.5);
    font-size: 10px;
}
.msg_head {
    position: relative;
}
#action_menu_btn {
    position: absolute;
    right: 10px;
    top: 10px;
    color: white;
    cursor: pointer;
    font-size: 20px;
}
.action_menu {
    z-index: 1;
    position: absolute;
    padding: 15px 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border-radius: 15px;
    top: 30px;
    right: 15px;
    display: none;
}
.action_menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}
.action_menu ul li {
    width: 100%;
    padding: 10px 15px;
    margin-bottom: 5px;
}
.action_menu ul li i {
    padding-right: 10px;
}
.action_menu ul li:hover {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.2);
}
@media (max-width: 576px) {
    .contacts_card {
        margin-bottom: 15px !important;
    }
}
</style>
