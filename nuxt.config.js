const laravelNuxt = require("laravel-nuxt");

module.exports = laravelNuxt({
    // Options such as mode, srcDir and generate.dir are already handled for you.
    head: {
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { hid: 'description', name: 'description', content: 'Device control anywhere anytime' },
            { hid: 'keywords', name: 'keywords', content: 'digital metering, iot, embedded systems' }
        ],
    },
    css: [
        '~/assets/font-awesome/css/font-awesome.min.css',
        '~/assets/css/animate.min.css'
    ],
    build:{
    	extractCSS: true
    },
    modules: ['@nuxtjs/axios'],

    plugins: [
        { src: '~/plugins/axios' },
        { src: '~plugins/gallery.js', ssr: false },
        { src: '~plugins/datetime.js', ssr: false },
        { src: '~/plugins/capitalize', ssr: false },
        {src:'~/plugins/map', ssr: false},
    ],

    // loading: '~/components/loader/custom_loader.vue'

});
