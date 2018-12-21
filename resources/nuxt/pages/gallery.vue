<template>
    <div class="gallerries-container">
        <div v-if="galleries">
            <lightbox :images="galleries" :caption="true"></lightbox>
        </div>
    </div>
</template>

<script>

    export default {

        computed: {
            galleries() {
                let arr = []

                if (this.$store.getters['galleries/allGalleries']) {
                    this.$store.getters['galleries/allGalleries'].forEach( item => {
                        arr.push({src: item.image_path, caption: item.title})
                    })
                }

                return arr
            }
        },

        mounted() {
            this.$store.dispatch('galleries/allGalleries')
        }

    }

</script>

<style>
    .gallerries-container{
        margin-top: 50px;
    }
    .holder{
        margin-top: 100px !important;
    }
</style>