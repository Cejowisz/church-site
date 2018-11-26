
<template>
    <header class="the-header" :class="[{'home-header': homeHeader}, {'add-margin': addMargin}]">
        <TheSideNavToggle @toggle="$store.dispatch('common/sidenavToggle')" />
        <div class="logo">
            <nuxt-link to="/">HELIUM</nuxt-link>
        </div>
        <div class="spacer"></div>
        <div class="navigation-items">
            <app-link></app-link>
        </div>
    </header>
</template>

<script>

    import TheSideNavToggle from "~/components/guest-layout/TheSideNavToggle"
    import AppLink from '~/components/appLink'

export default {
    name: "TheHeader",

    components: {
        TheSideNavToggle,
        AppLink
    },

    data() {
        return {
            homeHeader: false,
            addMargin: false
        }
    },

    mounted() {
         this.$route.path === '/' || this.$route.path === '/login' ?
             this.homeHeader = true : this.homeHeader = false
    }

}
</script>


<style scoped>

    .the-header {
        width: 100%;
        position: fixed;
        height: 60px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: #4d1f56;
        z-index: 100;
        box-sizing: border-box;
        padding: 0 20px;
    }

    .home-header{
        /*background: transparent;*/
    }

    .logo {
        margin: 0 10px;
        font-size: 1.3rem;
    }

    .logo a {
        text-decoration: none;
        color: white;
    }

    .spacer {
        flex: 1;
    }

    @media (max-width: 767px) {
        .navigation-items {
            display: none;
        }
        .the-header{
            overflow-x: hidden;
        }
    }

    @media (min-width: 768px) {
        .navigation-items {
            display: block;
        }
    }

</style>
