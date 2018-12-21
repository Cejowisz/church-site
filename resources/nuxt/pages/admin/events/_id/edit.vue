<template>
    <div class="device-editor-container">
        <div>
            <editor></editor>
        </div>
    </div>
</template>

<script>

    import Editor from '~/components/events/editor'

    export default {

        layout: 'admin',

        components: { Editor }

    }
</script>

<style>
    .device-editor-container{
        min-height: 100vh;
        display: grid;
        align-content: center;
        background: #333;
    }
    .device-editor-container div{
        margin: 0 auto;
    }

</style>