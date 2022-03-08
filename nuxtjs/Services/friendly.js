export default ($axios) => {
    return {
        getInfoFriends: async() => {
            const url = '/api/friends'
            return await $axios.get(url)
        },

        getFriend: async (id) => {
            const url = '/api/friends/' + id
            return await $axios.post(url)
        },

        getUpdateFriend: async (id) => {
            const url = '/api/friends/' + id
            return await $axios.patch(url)
        },

        getDenyFriend: async (id) => {
            const url = '/api/friends/' + id
            return await $axios.get(url)
        },

        getDeleteFriend: async (id) => {
            const url = '/api/friends/' + id
            return await $axios.delete(url)
        },
    }
}
