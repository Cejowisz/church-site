<template>
    <div class="gallery-container">

        <div class="gallery-lists">
            <button @click.prevent="addEvent = !addEvent">Add Program</button>
            <event-list></event-list>
        </div>

        <div :class="{'backdrop': addEvent}">
            <div v-if="addEvent" class="gallery-editor" :class="{'show-modal': addEvent}">
                <event-editor @cancelForm="addEvent = false" :addEvent="addEvent"></event-editor>
            </div>
        </div>
    </div>
</template>

<script>

    import EventList from '~/components/events/list'
    import EventEditor from '~/components/events/editor'

    export default {

        layout: 'admin',

        components: { EventList, EventEditor },

        data() {
            return {
                addEvent: false
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
        padding: 50px;
    }
    .backdrop {
        width: 100%;
        height: 100%;
        background-color: rgba(122, 122, 122, 0.8);
        z-index: 1000;
        position: fixed;
        top: 0;
        left: 0;
    }
    .gallery-lists{
        margin: 10px auto;
        width: 60%;
        display: grid;
    }
    .gallery-lists button{
        margin-bottom: 10px;
    }

    @media(max-width: 767px) {
        .gallery-lists{
            width: 100%;
        }
        .show-modal {
            width: 100%;
        }
    }
</style>