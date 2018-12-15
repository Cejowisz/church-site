<template>
    <div class="device-node-container">
        <span class="span"><span>Title: </span>{{ gallery.title }}</span>
        <span class="span"><span>Description: </span>{{ gallery.description }}</span>

    </div>
</template>

<script>

    export default {

        layout: 'admin',

        data() {
            return {
                gallery: ''
            }
        },

        methods: {
            async loadGallery() {
                try {
                    let res = await this.$axios.$get(`/api/galleries/${this.$route.params.id}`)
                    this.gallery = res
                }
                catch (e) {console.log(e)}
            },

            getGallery() {
                if (this.$store.state.user.allDeviceNodes === null) {
                    return this.loadGallery()
                }
                this.gallery = this.$store.state.gallery.allGalleries
                    .filter( item => item.id == this.$route.params.id)[0]
            }
        },

        mounted() {
            this.getGallery()
        }

    }

</script>

<style scoped>
    .span{
        display: block;
    }
    .span span{
        font-weight: 700;
        color: #333;
    }
</style>