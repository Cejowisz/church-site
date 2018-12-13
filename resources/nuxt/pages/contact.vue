<template>
    <div class="contact-container">

        <contact-form :apiRoute="apiRoute">

            <h3 class="underline">CONTACT INFO</h3>
            <h4>Address</h4>
            <p>
                32, Eket Oron Rd <br> Akwa Ibom State <br>
                <b>Branch: </b>Nekede, Owerri. Imo State
            </p>
            <h4>Phone</h4>
            <p>+234 703 533 0756 <br>+234 905 089 6842</p>
            <h4>Email</h4>
            <p>info@wisemandesigns.com</p>

        </contact-form>

    </div>
</template>

<script>

    import ContactForm from '~/components/contact'

    export default {

        data() {
            return {
                apiRoute: '/api/contact'
            }
        },

        components: { ContactForm }

    }

</script>