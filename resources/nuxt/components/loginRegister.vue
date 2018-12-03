<template>
    <div class="home-container">

        <h1 class="brand">HELIUM</h1>

        <div v-if="login" class="login">
            <Login/>
        </div>

        <div v-if="register" class="register">
            <Register/>
        </div>

    </div>
</template>

<script>

    import Login from '../components/login'
    import Register from '../components/register'

    export default {

        components: { Login, Register },

        data() {
            return {

            }
        },

        computed: {
            register() {
                return this.$store.getters['common/registerFacet']
            },
            login() {
                return this.$store.getters['common/loginFacet']
            }
        }



    }
</script>


<style>
    body{
        background: url();
        background-size: cover;
    }
    a{
        color: #3C41A5;
        text-decoration: none;
    }
    .the-header{
        background: transparent;
    }

    .home-container{
        width: 450px;
        margin: 0 auto;
        display: grid;
        align-items: center;
    }

    @media (max-width: 767px) {
        .home-container{
            width: 90%;
        }
    }
    .login{
        padding: 20px;
    }
    .brand{
        text-align: center;
        color: #fefefe;
        text-shadow: 2px 2px 5px #D9D9D9;
    }
    input{
        border-bottom: 2px solid #3c0606;
        color: #f6fefe;
        font-size: 1rem;
        transition: 2s ease-in-out;
    }
    input:focus, input:active{
        border-bottom: 2px solid #8E3E39;
        background: transparent !important;
    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        transition: background-color 5000s ease-in-out 0s;
    }
    input:-webkit-autofill {
        -webkit-text-fill-color: #fefefe !important;
    }
    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: #fefefe;
        transition: 2s ease-in-out;
    }
    ::-moz-placeholder { /* Firefox 19+ */
        color: #fefefe;
        transition: 2s ease-in-out;
    }
    :-ms-input-placeholder { /* IE 10+ */
        color: #fefefe;
        transition: 2s ease-in-out;
    }
    :-moz-placeholder { /* Firefox 18- */
        color: #fefefe;
        transition: 2s ease-out;
    }

    button:hover{
        background: #73B5DF;
    }
    .nuxt{
        min-height: 100vh;
    }
    .center-home{
        display: grid;
        align-items: center;
    }

</style>
