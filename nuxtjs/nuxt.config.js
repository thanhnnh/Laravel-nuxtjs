export default {
    // Global page headers: https://go.nuxtjs.dev/config-head
    head: {
        title: process.env.npm_package_name || '',
        titleTemplate: 'Friendzy %s',
        htmlAttrs: {
            lang: 'en'
        },
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { hid: 'description', name: 'description', content: '' }
        ],
        link: [
            { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
            { rel: 'stylesheet', type: 'text/css', href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'},
            { rel: 'stylesheet', id: 'bootstrap-css', href: '//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'},
        ],
        script: [
            { src: 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' },
            { src: 'maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js' },
        ],
    },

    loading: false,

    // Global CSS: https://go.nuxtjs.dev/config-css
    css: [
        // CSS file in the project
        '@/assets/css/main.css',
        // SCSS file in the project
        // '@/assets/css/main.css'
    ],

    // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
    plugins: [
        '~/plugins/request',
        '~/plugins/axios'
    ],

    // Auto import components: https://go.nuxtjs.dev/config-components
    components: true,

    // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
    buildModules: [
        // https://go.nuxtjs.dev/tailwindcss
        '@nuxtjs/tailwindcss',
    ],

    // Modules: https://go.nuxtjs.dev/config-modules
    modules: [
        // https://go.nuxtjs.dev/axios
        '@nuxtjs/axios',
        '@nuxtjs/auth-next'
    ],

    // Axios module configuration: https://go.nuxtjs.dev/config-axios
    axios: {
        baseURL: 'http://localhost:8088/',
        credentials: true
    },

    auth: {
        strategies: {
            'laravelSanctum': {
                provider: 'laravel/sanctum',
                url: 'http://localhost:8088',
                endpoints: {
                    login: {
                        url: '/login'
                    },
                    logout: {
                        url: '/logout'
                    },
                    user: {
                        url: '/api/user'
                    }
                },
                user: {
                    property: false
                }
            },
        },
        redirect: {
            login: '/auth/login',
            logout: '/',
            home: '/dashboard',
        }
    },

    // Build Configuration: https://go.nuxtjs.dev/config-build
    build: {}
}
