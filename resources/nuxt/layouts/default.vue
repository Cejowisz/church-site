<template>
    <div class="guest-container">
        <!--<div v-if="$route.path !== '/'">-->
            <TheHeader @sidenavToggle="$store.dispatch('common/sidenavToggle')" />
        <!--</div>-->

        <TheSidenav :show="displaySidenav"/>

        <div class="nuxt" :class="[{'center-home': centerHome}, {'add-margin-top': addMarginTop}]">
            <nuxt/>
        </div>

        <!--<div v-show="$route.path !== '/'">
            <TheFooter/>
        </div>-->
    </div>
</template>

<script>
    import TheHeader from '~/components/guest-layout/TheHeader'
    import TheFooter from '~/components/guest-layout/TheFooter'
    import TheSidenav from '~/components/guest-layout/TheSidenav'

    export default {

        middleware: ['check-auth'],

        components: {
            TheHeader,
            TheSidenav,
            TheFooter
        },

        data() {
            return {
                addMarginTop: false,
                centerHome: false
            }
        },

        methods: {
            alignHome() {
                this.$route.path === '/' ? this.centerHome = true : this.centerHome = false
            },
            addMargin() {

                if
                (
                    this.$route.path !== '/' ||
                    this.$route.path !== '/login'

                ) {
                    this.addMarginTop = true
                }
            }
        },

        computed: {
            displaySidenav() {
                return this.$store.getters['common/sidenavToggle']
            }
        },

        mounted() {
            this.alignHome();
            this.addMargin()
        }
    }
</script>

<style>
    @import "../assets/css/style.css";
</style>
