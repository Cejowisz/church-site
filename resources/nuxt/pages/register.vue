<template>
    <div class="register-page">
        <LoginRegister/>
    </div>
</template>

<script>

    import LoginRegister from '../components/loginRegister'

    export default {

        layout: 'headless',

        components: { LoginRegister },

        mounted() {
            this.$store.dispatch('common/loginRegisterFacet', true)
        }

    }
</script>


<style>
    .register-page{
        display: grid;
        align-items: center;
        min-height: 100vh;
    }
</style>

