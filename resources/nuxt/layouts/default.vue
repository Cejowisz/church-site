<template>
    <div class="guest-container">
        <!--<div v-if="$route.path !== '/'">-->
            <TheHeader @sidenavToggle="$store.dispatch('common/sidenavToggle')" />
        <!--</div>-->

        <TheSidenav :show="displaySidenav"/>

        <div class="nuxt" :class="[{'add-margin-top': addMarginTop}]">
            <nuxt/>
        </div>

        <div>
            <TheFooter/>
        </div>
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
            this.addMargin()
        }
    }
</script>

<style>
    @import "../assets/css/style.css";
</style>
