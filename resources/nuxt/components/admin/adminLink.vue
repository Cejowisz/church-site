<template>
    <ul class="nav-list" @click="$store.dispatch('common/sidenavToggle')">
        <li class="nav-item"><nuxt-link to="/admin/gallery">Gallery</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/admin/events">Events</nuxt-link></li>
        <li class="nav-item"><nuxt-link :to="loginLink">{{ loginText }}</nuxt-link></li>
        <!--<li class="nav-item" v-if="!isAuth"><nuxt-link to="/register">Register</nuxt-link></li>-->
    </ul>
</template>

<script>

    import AppLinks from '~/mixins/navigation'

    export default {

        mixins: [AppLinks]

    }

</script>

<style scoped>
    @import '../../assets/css/app-admin-nav.css';
</style>