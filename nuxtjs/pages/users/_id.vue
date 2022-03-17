<template>
    <div class="container mx-auto mt-16">
        <div class="flex space-x-6 mx-auto">
            <div class="flex flex-col items-end w-1/3">
                <h2 class="text-3xl">{{ user.name }}</h2>

                <template v-if="friendRequestSentFrom">
                    <div class="flex">
                        <form @submit.prevent="getUpdateFriend">
                            <green-button type="submit">
                                Accept
                                <svg aria-hidden="true" data-prefix="fas" data-icon="user-plus" class="fill-current w-4 h-4 ml-1 text-white svg-inline--fa fa-user-plus fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
                                </svg>
                            </green-button>
                        </form>
                        <form @submit.prevent="getDenyFriend" class="ml-3">
                            <red-button type="submit">
                                Ignore
                                <svg aria-hidden="true" data-prefix="fas" data-icon="user-minus" class="fill-current w-4 h-4 ml-1 text-white svg-inline--fa fa-user-minus fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path d="M624 208H432c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h192c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
                                </svg>
                            </red-button>
                        </form>
                    </div>
                </template>

                <template v-else-if="friendRequestSentTo">
                    <span>Pending</span>
                </template>

                <template v-else-if="isFriendsWith">
                    <form @submit.prevent="getDeleteFriend">
                        <red-button type="submit">
                            Unfriend
                            <svg aria-hidden="true" data-prefix="fas" data-icon="user-minus" class="fill-current w-4 h-4 ml-1 text-white svg-inline--fa fa-user-minus fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path d="M624 208H432c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h192c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
                            </svg>
                        </red-button>
                    </form>
                </template>

                <template v-else-if="this.$auth.user.id != this.user.id">
                    <form @submit.prevent="getFriend">
                        <blue-button type="submit">
                            Add Friend
                            <svg aria-hidden="true" data-prefix="fas" data-icon="user-plus" class="fill-current w-4 h-4 ml-1 text-white svg-inline--fa fa-user-plus fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/>
                            </svg>
                        </blue-button>
                    </form>
                </template>
            </div>
            <div class="flex border-l mt-3 w-2/3">
                <div class="flex mb-3 ml-3">
                    <img src="https://images.unsplash.com/photo-1511367461989-f85a21fda167?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8c2lsaG91ZXR0ZXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="" class="w-8 h-8 rounded-full object-cover">
                    <div class="flex flex-col">
                        <span class="text-xl ml-2">{{ user.name }}</span>
                        <span class="text-xl ml-2">{{ user.email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        middleware: 'auth',

        async asyncData({app, params}) {
            const { data } = await app.$get(params.id)
            return {
                user: data.user,
                isFriendsWith: data.isFriendsWith,
                friendRequestSentTo: data.friendRequestSentTo,
                friendRequestSentFrom: data.friendRequestSentFrom
            }
        },

        methods: {
            async getFriend () {
                const {data} = await this.$getFriend(this.$route.params.id)
                this.user = data.user
                this.isFriendsWith = data.isFriendsWith
                this.friendRequestSentTo = data.friendRequestSentTo
                this.friendRequestSentFrom = data.friendRequestSentFrom
            },

            async getUpdateFriend () {
                const {data} = await this.$getUpdateFriend(this.$route.params.id)
                this.user = data.user
                this.isFriendsWith = data.isFriendsWith
                this.friendRequestSentTo = data.friendRequestSentTo
                this.friendRequestSentFrom = data.friendRequestSentFrom
            },

            async getDenyFriend () {
                const {data} = await this.$getDenyFriend(this.$route.params.id)
                this.user = data.user
                this.isFriendsWith = data.isFriendsWith
                this.friendRequestSentTo = data.friendRequestSentTo
                this.friendRequestSentFrom = data.friendRequestSentFrom
            },

            async getDeleteFriend () {
                const {data} = await this.$getDeleteFriend(this.$route.params.id)
                this.user = data.user
                this.isFriendsWith = data.isFriendsWith
                this.friendRequestSentTo = data.friendRequestSentTo
                this.friendRequestSentFrom = data.friendRequestSentFrom
            }
        },
    }
</script>
