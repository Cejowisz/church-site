<template>
    <div>
        <p>dddddddd</p>
        <div v-for="gallery in galleries">
            <img :src="`/${gallery.image_path}`" alt="">
        </div>
    </div>
</template>

<script>

    export default {

        data() {
            return {
//                galleries: ''
            }
        },

        computed: {
            galleries() {
                return this.$store.getters['galleries/allGalleries']
            }
        },

        mounted() {
            this.$store.dispatch('galleries/allGalleries')
        }

    }

</script>