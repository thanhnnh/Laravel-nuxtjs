export default function ({ app, $axios, redirect, $config }) {
    app.$csrf()
    $axios.setBaseURL("http://localhost:8088")
    $axios.onRequest((config) => {
        console.log('Making request to ' + config.url)
    })

    $axios.onError((error) => {
        const code = parseInt(error.response && error.response.status)
        console.log(code)
        if (code === 400) {
            redirect('/400')
        }
        if (code === 404) {
            redirect('/error/product')
        }
    })
}
