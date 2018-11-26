<template>
    <form>

        <input type="text" v-model="email" id="email" placeholder="johndoe@example.com" autocomplete="email">
        <label for="email" class="sr-only">email</label>

        <input type="password" v-model="password" id="password" placeholder="password" autocomplete="current-password">
        <label for="password" class="sr-only">password</label>

        <button @click.prevent="login">{{ loginTxt }}</button>
        <small>
            Don't have account?
            <a href="#" @click.prevent="$store.dispatch('common/loginRegisterFacet', true)">
                Register Here
            </a>
        </small>

    </form>
</template>

<script>

    export default {

        data() {
            return {
                email: '',
                password: '',
                allFields: false,
                loginTxt: 'Login'
            }
        },

        methods: {

            async login() {
                if (this.email !== '' && this.password !== '') {

                    this.loginTxt = 'Loading ...'

                    try {
                        let { user, token } = await this.$axios
                            .$post('/api/user-login', {email: this.email, password: this.password})

                        localStorage.setItem('user', JSON.stringify(user))
                        localStorage.setItem('token', token)

                        window.location.href = 'home'

                    }
                    catch (e) {
                        console.log(e)
                    }
                } else {
                    this.allFields = true
                }
            }

        }

    }

</script>

<style>
    form{
        display: grid;
        grid-template-columns: 1fr;
        align-content: center;
        align-items: center;
        grid-gap: 15px;
        z-index: 1000;
    }
    input, button{
        /*grid-column: 1 / -1;*/
    }
</style>