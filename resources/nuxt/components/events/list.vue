<template>
    <div class="gallery-list">
        <div class="gallery-item" v-for="event in events">
            <div>
                <span class="title">{{ event.title }}</span>
                <span class="desc">{{ event.description }}</span>
            </div>
            <img :src="`/${event.image_path}`" alt="bfa image">
            <div>
                <ItemAction
                        :item="event"
                        :route="route"
                        :deleteApi="deleteApi"
                        :selectedItemStore="selectedItemStore"
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
                route: '/admin/events',
                deleteApi: '/api/programs',
                selectedItemStore: 'events/selectedItem'
            }
        },

        computed: {
            events() {
                return this.$store.getters['events/allEvents']
            },
            selectedItem() {
                return this.$store.getters['events/selectedItem']
            }
        },

        mounted() {
            this.$store.dispatch('events/allEvents')
        }

    }

</script>

<style scoped>
    .gallery-list{
        background: #f9f9f9;
    }
    .gallery-item{
        color: #333;
        margin: 10px 20px;
        display: grid;
        grid-gap: 15px;
        grid-template-columns: 1fr 1fr 200px;
        align-items: center;
        border-bottom: 1px solid #ccc;
        padding: 20px 10px;
    }
    .gallery-item:last-child{
        border-bottom: none;
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
            grid-template-columns: 1fr 1fr 10px;
            margin: 10px 0;
        }
        .gallery-item img{
            width: 100px;
        }
    }
</style>