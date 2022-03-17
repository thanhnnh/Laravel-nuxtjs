export default ($axios) => {
    return {
        showFriendChat: async() => {
            const url = '/api/chats'
            return await $axios.get(url)
        },

        getMessageApi: async(id) => {
            const url = '/api/chats/' + id
            return await $axios.get(url)
        },

        getHistoryMessageApi: async (id) => {
            const url = '/api/chats/history/' + id
            return await $axios.post(url)
        },

        sendMessageApi: async (data) => {
            const url = 'api/chats/send-chat'
            return await $axios.post(url, data)
        }
    }
}
