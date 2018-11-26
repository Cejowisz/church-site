
export default {

    data() {
        return {
            loginText: 'Login',
            loginLink: '/login',
            register: true
        }
    },

    methods: {
        isLoggedIn() {
            if(this.$store.getters['auth/loginStatus'] === true) {
                this.loginText = 'Logout'
                this.register = false
                return this.loginLink = '/logout'
            }
            this.loginText = 'Login'
            return this.loginLink = '/Login'
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
    }

}