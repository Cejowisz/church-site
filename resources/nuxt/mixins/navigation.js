
export default {

    data() {
        return {
            loginText: 'Login',
            loginLink: '/login',
            register: true,
            user: ''
        }
    },

    methods: {
        isLoggedIn() {
            if(localStorage.getItem('token')) {
                this.loginText = 'Logout'
                this.register = false
                return this.loginLink = '/logout'
            }
            this.loginText = 'Login'
            return this.loginLink = '/Login'
        },

        navScroll() {

            // Home Page scroll behavior.
            if (this.$route.path === '/' && window.innerWidth > 767) {

                let a = document.querySelectorAll('.nav-item a')
                let brandName = document.querySelectorAll('.logo a')[0]

                brandName.style.color = '#fee0ea'

                for (let el of a) {
                    el.style.color = '#fee0ea'
                }

            }
        },

        dynamicNav() {
            let self =this
            window.onscroll = function () {

                let brandName = document.querySelectorAll('.logo a')[0]
                let headerEl = document.getElementsByTagName('header')[0]
                let a = document.querySelectorAll('.nav-item a')

                if (self.$route.path === '/' && window.scrollY <= 250 && window.innerWidth > 767) {
                    headerEl.style.background = 'transparent'
                    headerEl.style.transition = '2s ease'
                    brandName.style.color = '#fee0ea'

                    for (let el of a) {
                        el.style.color = '#fee0ea'
                    }

                }
                else {

                    headerEl.style.background = '#4d1f56'
                    brandName.style.color = '#fefefe'

                    for (let el of a) {
                        el.style.color = '#fefefe'
                    }

                }

            }
        }
    },

    computed: {
        isAuth() {
            if (localStorage.getItem('token') !== null) {
                this.loginText = 'Logout'
                this.loginLink = '/logout'
                return true
            }
        }
    },

    mounted() {

        this.dynamicNav()
        this.navScroll()
        this.isLoggedIn()

        let brandName = document.querySelectorAll('.logo a')[0]
        let headerEl = document.getElementsByTagName('header')[0]
        let a = document.querySelectorAll('.nav-item a')

        headerEl.style.background = '#4d1f56'
        brandName.style.color = '#fee0ea'

        for (let el of a) {
            el.style.color = '#fee0ea'
        }

        if (localStorage.getItem('user')) {
            this.user = localStorage.getItem('user')
        }

    },

    watch: {
        '$route': function (e) {

            window.onscroll = function () {

                let brandName = document.querySelectorAll('.logo a')[0]
                let headerEl = document.getElementsByTagName('header')[0]
                let a = document.querySelectorAll('.nav-item a')

                if (e.path === '/' && window.scrollY <= 500 && window.innerWidth > 767) {
                    headerEl.style.background = 'transparent'
                    headerEl.style.transition = '2s ease'
                    brandName.style.color = '#fee0ea'

                    for (let el of a) {
                        el.style.color = '#fee0ea'
                    }

                }
                else {

                    headerEl.style.background = '#4d1f56'
                    brandName.style.color = '#fefefe'

                    for (let el of a) {
                        el.style.color = '#fefefe'
                    }

                }

            }
        }
    }

}