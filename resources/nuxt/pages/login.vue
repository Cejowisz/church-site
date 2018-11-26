<template>
    <div class="login-page">
        <LoginRegister/>
    </div>
</template>

<script>

    import LoginRegister from '../components/loginRegister'

    export default {

        layout: 'headless',

        components: { LoginRegister }

    }
</script>


<style>
    .login-page{
        display: grid;
        align-items: center;
        min-height: 100vh;
    }
</style>

