<template>
    <div class="gallery-container">
        <div v-for="gallery in galleries" class="gallery-item">
            <img :src="`/${gallery.image_path}`" alt="bfa image">
            <h4>{{ gallery.title }}</h4>
            <p>{{ gallery.description }}</p>
        </div>
    </div>
</template>

<script>

    export default {

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

<style scoped>
    .gallery-container{
        display: grid;
        grid-gap: 30px;
        width: 80%;
        margin: 50px auto;
        background: #fefefe;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-template-rows: 300px;
    }
    .gallery-item{
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 200px 20px 20px;

    }
    img{
        /*width: auto;*/
    }
</style>