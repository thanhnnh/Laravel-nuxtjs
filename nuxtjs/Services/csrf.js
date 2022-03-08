export default ($axios) => {
    return {
        csrf: async () => {
            return await $axios.get('/sanctum/csrf-cookie')
        },
    }
}
