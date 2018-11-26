<template>
    <div class="guest-container">
        <div v-if="$route.path !== '/'">
            <AdminHeader @sidenavToggle="$store.dispatch('common/sidenavToggle')" />
        </div>

        <AdminSidenav :show="displaySidenav"/>

        <div class="nuxt" :class="[{'center-home': centerHome}, {'add-margin-top': addMarginTop}]">
            <nuxt/>
        </div>

    </div>
</template>

<script>
    import AdminHeader from '~/components/admin-layout/header'
    import AdminSidenav from '~/components/admin-layout/sidebar'

    export default {

        middleware: ['check-auth'],

        components: {
            AdminHeader,
            AdminSidenav
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
    input{
        border-bottom: 2px solid #3c0606;
        color: #333;
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
        -webkit-text-fill-color: #333 !important;
    }
    ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: #333;
        transition: 2s ease-in-out;
    }
    ::-moz-placeholder { /* Firefox 19+ */
        color: #333;
        transition: 2s ease-in-out;
    }
    :-ms-input-placeholder { /* IE 10+ */
        color: #333;
        transition: 2s ease-in-out;
    }
    :-moz-placeholder { /* Firefox 18- */
        color: #333;
        transition: 2s ease-out;
    }

    button:hover{
        background: #73B5DF;
    }
</style>
