<template>

    <div class="prayer-container animated fadeInUp">

        <prayer-form :apiRoute="apiRoute">
            <h3 class="underline" slot="contact-heading">Prayer request</h3>

            <p>From prayer
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commod
                i consequuntur cum fugiat harum, illum maiores,
                porro quasi repudiandae temporibus veniam voluptate. Harum id illo,
                magni nobis nostrum placeat repudiandae!
            </p>

        </prayer-form>

    </div>

</template>

<script>

    import PrayerForm from '~/components/contact'

    export default {

        data() {
            return {
                apiRoute: '/api/prayer-request'
            }
        },

        components: { PrayerForm }

    }

</script>