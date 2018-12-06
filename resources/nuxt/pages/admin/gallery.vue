<template>
    <div>
        <button @click.prevent="addGallery = !addGallery">Add Gallery</button>

        <div class="gallery-list">
            <gallery-list></gallery-list>
        </div>

        <div :class="{'backdrop': addGallery}">
            <div v-if="addGallery" class="gallery-editor" :class="{'show-modal': addGallery}">
                <gallery-editor @cancelForm="addGallery = false" :addGallery="addGallery"></gallery-editor>
            </div>
        </div>
    </div>
</template>

<script>

    import GalleryList from '~/components/gallery/galleryList'
    import GalleryEditor from '~/components/gallery/galleryEditor'

    export default {

        components: { GalleryList, GalleryEditor },

        data() {
            return {
                addGallery: false
            }
        },

        methods: {
            addGallerddy() {

            }
        }

    }

</script>

<style>
    .show-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 30%;
        background: #fefefe;
        padding: 50px;
    }
    .backdrop {
        width: 100%;
        height: 100%;
        background-color: rgba(221, 221, 221, 0.45);
        z-index: 1000;
        position: fixed;
        top: 0;
        left: 0;
    }
</style>