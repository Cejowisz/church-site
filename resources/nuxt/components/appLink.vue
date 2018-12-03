<template>
    <ul class="nav-list" @click="$store.dispatch('common/sidenavToggle')">
        <li class="nav-item"><nuxt-link to="/about">Prayer Request</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/devices">Events</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/contact">Contact</nuxt-link></li>
        <li class="nav-item"><nuxt-link :to="loginLink">{{ loginText }}</nuxt-link></li>
        <li class="nav-item" v-if="!isAuth"><nuxt-link to="/register">Register</nuxt-link></li>
    </ul>
</template>

<script>

    import AppLinks from '~/mixins/navigation'

    export default {

        mixins: [AppLinks],

        methods: {
            navScroll() {

                if (this.$route.path === '/' && window.innerWidth > 767) {

                    let headerEl = document.getElementsByTagName('header')[0]
                    let a = document.querySelectorAll('.nav-item a')
                    let brandName = document.querySelectorAll('.logo a')[0]

                    brandName.style.color = '#4d1f56'

                    for (let el of a) {
                        el.style.color = '#4d1f56'
                    }

                    window.onscroll = function () {

                        if (window.scrollY <= 500) {

                            headerEl.style.background = 'transparent'
                            headerEl.style.transition = '2s ease'
                            brandName.style.color = '#4d1f56'

                            for (let el of a) {
                                el.style.color = '#4d1f56'
                            }

                        }
                        else {

                            headerEl.style.background = '#4d1f56'
                            brandName.style.color = '#fefefe'

                            for (let el of a) {
                                el.style.color = '#fefefe'
                            }

                        }

                    }
                }
            },
        },


        mounted() {

            this.navScroll()

        }


    }

</script>

<style scoped>
    @import '../assets/css/app-admin-nav.css';
    .nav-colored { background-color:#000; }
    .nav-transparent { background-color:transparent;}
</style>