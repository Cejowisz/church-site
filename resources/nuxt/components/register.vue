<template>
    <form>
        <small class="errors" :class="{'hide-errors': hideErrors}">
            <span v-if="errors" v-for="error in errors">{{ error }}</span>
        </small>

        <input type="text" id="fullname" v-model="fullname" placeholder="John Doe" autocomplete="fullname">
        <label for="fullname" class="sr-only">fullname</label>

        <input type="text" id="email" v-model="email" placeholder="johndoe@example.com" autocomplete="email">
        <label for="email" class="sr-only">email</label>

        <input
                type="password"
                id="password"
                v-model="password"
                placeholder="password"
                autocomplete="current-password"
        />
        <label for="password" class="sr-only">password</label>

        <input
                type="password"
                id="confirm_password"
                v-model="confirmPassword"
                placeholder="confirm password"
                autocomplete="current-password"
        />
        <label for="confirm_password" class="sr-only">confirm password</label>

        <button @click.prevent="register">{{ registerText }}</button>
        <small>Already have an account?
            <a href="#" @click.prevent="$store.dispatch('common/loginRegisterFacet', false)">Login</a>
        </small>

    </form>
</template>

<script>

    export default {

        data() {
            return {
                errors: [],
                email: '',
                fullname: '',
                password: '',
                confirmPassword: '',
                registerText: 'Register',
                hideErrors: false
            }
        },

        methods: {

            validateFields() {
                if (this.fullname === '') {
                    this.errors.push('Full name is required')
                }
                if (this.email === '') {
                    this.errors.push('Email is required')
                }
                if (this.password !== this.confirmPassword) {
                    this.errors.push('Password does not match')
                }
            },

            async register() {

                this.hideErrors = false
                this.validateFields()

                if (this.errors.length === 0) {

                    this.registerText = 'Registering ...'

                    try {

                        let { token } = await this.$axios
                            .$post('/api/register', {
                                fullname: this.fullname,
                                email: this.email,
                                password: this.password,
                                password_confirmation: this.confirmPassword
                            })

                        localStorage.setItem('token', token)
                        window.location.href = '/login'
                    }

                    catch (e) {
                        this.registerText = 'Register'
                        console.log('error from server:' + e)
                    }

                }
            }
        },

        watch: {
            errors: function(e) {
                if (e) {
                    setTimeout(() => {
                        this.hideErrors = true
                        this.errors = []
                    }, 2000)
                }
            }
        }

    }

</script>

<style>
    .errors span{
        display: block;
        color: rgb(197, 203, 232);
    }
    .hide-errors{
        display: none;
        transition: 1s ease;
    }
</style>