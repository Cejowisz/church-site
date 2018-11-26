<template>
    <div class="guest-container">

        <div class="nuxt" :class="{'center-home': centerHome}">
            <nuxt/>
        </div>

    </div>
</template>

<script>


    export default {

        data() {
            return {
                displaySidenav: false,
                centerHome: false
            }
        },

        methods: {
            alignHome() {
                this.$route.path === '/' ? this.centerHome = true : this.centerHome = false
            }
        },

        mounted() {
            this.alignHome()
        }
    }
</script>

<style>
    @import "../assets/css/style.css";
</style>
