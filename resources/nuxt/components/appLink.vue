<template>
    <ul class="nav-list" @click="$store.dispatch('common/sidenavToggle')">
        <li class="nav-item"><nuxt-link to="/">Home</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/events">Events</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/gallery">Gallery</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/prayer-request">Prayer Request</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/contact">Contact</nuxt-link></li>
        <!--<li v-if="user" class="nav-item"><nuxt-link :to="loginLink">{{ loginText }}</nuxt-link></li>-->
        <!--<li class="nav-item" v-if="!isAuth"><nuxt-link to="/register">Register</nuxt-link></li>-->
    </ul>
</template>

<script>

    import AppLinks from '~/mixins/navigation'

    export default {

        mixins: [AppLinks],

        data() {
            return {
                addHomeLink: false
            }
        },

        mounted() {
            if (window.innerWidth < 768) {
                this.addHomeLink = true
            }
        }

    }

</script>

<style scoped>
    @import '../assets/css/app-admin-nav.css';
    .nav-colored { background-color:#000; }
    .nav-transparent { background-color:transparent;}
</style>