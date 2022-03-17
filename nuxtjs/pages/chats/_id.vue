<template>
    <div class="mesgs">
        <div class="msg_history" v-for="message in messages" :key="message.id">
            <template v-if="userId = message.user_id">
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p>{{ message.chats }}</p>
                        <span class="time_date"> {{ message.created_at }}</span> </div>
                </div>
            </template>
            <template v-if="friendId = message.friend_id">
                <div class="incoming_msg">
                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>{{ message.chats }}</p>
                            <span class="time_date">{{ (message.created_at) }}</span></div>
                    </div>
                </div>
            </template>
        </div>
        <div class="type_msg">
            <div class="input_msg_write">
                <input v-model="message" @keyup.enter="sendChat" type="text" class="write_msg" placeholder="Type a message" />
                <button class="msg_send_btn" @click="sendChat" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
      middleware: 'auth',
      // props: ['chats', 'userid', 'friendid'],
      data() {
          return {
              message:'',
              messages:'',
              friendId: '',
              userId:'',
          }
      },

      async asyncData({app, params}) {
          console.log(params)
          const { data } = await app.$getHistoryMessageApi(params.id)
          return {
              messages: data.messages,
              friendId: data.friend_id,
              userId: data.user_id
          }
      },

      methods: {
          async  sendChat() {
              let data = {
                  message: this.message,
                  user_id: this.userId,
                  friend_id: this.friendId
              }
              await this.$sendMessageApi(data)
              console.log(data)
              this.friend = data.friend
          }
      }

  }
</script>
