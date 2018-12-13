<template>
    <div class="gallery-list">
        <p>Galleries</p>
        <div class="gallery-item" v-for="gallery in galleries">
            <div>
                <span class="title">{{ gallery.title }}</span>
                <span class="desc">{{ gallery.description }}</span>
            </div>
            <img :src="`/${gallery.image_path}`" alt="bfa image">
            <div>
                <ItemAction
                        :item="gallery"
                        :route="route"
                        :deleteApi="deleteApi"
                        :selectedItemStore="selectedItemStore"
                        :dispatchAction="dispatchAction"
                        :redirectUser="route"
                        :selectedItem="selectedItem"/>
            </div>
        </div>
    </div>
</template>

<script>

    import ItemAction from '~/components/itemAction'

    export default {

        components: { ItemAction },

        data() {
            return {
                route: '/admin/gallery',
                deleteApi: '/api/galleries',
                selectedItemStore: 'galleries/selectedItem',
                dispatchAction: 'user/deviceNodes'
            }
        },

        computed: {
            galleries() {
                return this.$store.getters['galleries/allGalleries']
            },
            selectedItem() {
                return this.$store.getters['galleries/selectedItem']
            }
        },

        mounted() {
            this.$store.dispatch('galleries/allGalleries')
        }

    }

</script>

<style scoped>
    .gallery-list{
        /*margin: 20px auto;
        width: 60%;*/
    }
    .gallery-item{
        color: #333;
        width: 50%;
        margin: 10px 20px;
        display: grid;
        grid-gap: 15px;
        grid-template-columns: 1fr 1fr 100px;
        align-items: center;
    }
    .title{
        margin: 0;
        font-weight: 700;
        display: block;
    }
    .desc{
        margin-top: 5px;

    }
    .gallery-item img{
        width: 100px;
    }
    @media(max-width: 767px) {
        .gallery-item{

            grid-gap: 15px;
            grid-template-columns: 70% 20% 100px;

        }
    }
</style>