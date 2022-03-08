export default ($axios) => {
    return {
        getUsers: async() => {
            const url = '/api/users/'
            return await $axios.get(url)
        },

        getUser: async(id) => {
            const url = '/api/user/' + id
            return await $axios.get(url)
        },
    }
}
