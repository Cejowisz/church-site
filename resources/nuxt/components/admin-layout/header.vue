
<template>
    <header class="the-header">
        <TheSideNavToggle @toggle="$store.dispatch('common/sidenavToggle')" />
        <div class="logo">
            <nuxt-link to="/">HELIUM</nuxt-link>
        </div>
        <div class="spacer"></div>
        <div class="navigation-items">
            <admin-link></admin-link>
        </div>
    </header>
</template>

<script>

    import TheSideNavToggle from "~/components/guest-layout/TheSideNavToggle"
    import AdminLink from '~/components/admin/adminLink'

    export default {
        name: "TheHeader",

        components: {
            TheSideNavToggle,
            AdminLink
        },

        data() {
            return {
                homeHeader: false,
                addMargin: false
            }
        },

        methods: {
            navScroll() {
                let headerEl = document.getElementsByTagName('header')

                window.onscroll = function () {
                    if (window.scrollY >= 500 ) {
                        headerEl[0].style.background = '#4d1f56'
                    }
                    else {

                        headerEl[0].style.background = 'transparent'
                        headerEl[0].style.color = '#4d1f56'
                    }
                }
            }
        },

        mounted() {
//            this.navScroll()
            let headerEl = document.getElementsByTagName('header')

            window.onscroll = function () {
                if (window.scrollY >= 500 ) {
                    headerEl[0].style.background = '#4d1f56'
                }
                else {
                    alert('hh')
                    headerEl[0].style.background = 'transparent'
                    headerEl[0].style.color = '#4d1f56'
                }
            }
        }

    }
</script>


<style>

    .the-header {
        width: 100%;
        position: fixed;
        height: 60px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        background: #4d1f56;
        z-index: 100;
        box-sizing: border-box;
        padding: 0 20px;
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
