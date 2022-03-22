<template>
    <div class="container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar"  placeholder="Search" >
                                <span class="input-group-addon">
                                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="inbox_chat">
                        <div class="chat_list" v-for="friend in friends" :key="friend.id">
                            <NuxtLink :to="`/chats/${friend.id}`">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>{{ friend.name }} <span class="chat_date">Dec 25</span></h5>
                                        <p>Test, which is a new approach to have all solutions
                                            astrology under one roof.
                                        </p>
                                    </div>
                                </div>
                            </NuxtLink>
                        </div>
                    </div>
                </div>
                <div>
                    <Nuxt></Nuxt>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        middleware: 'auth',
        data() {
            return {
                friends: []
            }
        },

        async asyncData({app}) {
            // console.log(params)
            const { data } = await app.$showFriendChat()
            // const {dataUser} = await app.$getUser(this.$route.params.id)
            console.log(data)
            return {
                friends: data.friends,
                users: data.user,
            }
        },

        methods: {

        }
    }
</script>
