
<template>
    <header class="the-header"
            :class="[
                {'home-header': homeHeader},
                {'add-margin': addMargin},
                {'add-shadow': addShadow}]">

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

        components: {
            TheSideNavToggle,
            AppLink
        },

        data() {
            return {
                addMargin: false,
                homeHeader: '',
                windowHeight: '',
                addShadow: ''
            }
        },

        methods: {
            addBackground() {
                window.innerWidth < 768 ? this.homeHeader = true : this.homeHeader = false
            }
        },

        mounted() {
            this.addBackground()


            window.addEventListener('scroll', () => {
                this.windowHeight = window.scrollY

            })
        },

        watch: {
            windowHeight(height) {
                height > 90 ? this.addShadow = true : this.addShadow = false
            }
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
        background: #4d1f56 !important;
    }
    .add-shadow{
        box-shadow: 0 2px 5px -2px rgba(0,0,0,.9);
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
