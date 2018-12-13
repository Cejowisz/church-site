<template>
    <div class="device-editor-container">
        <div>
            <editor></editor>
        </div>
    </div>
</template>

<script>

    import Editor from '~/components/gallery/editor'

    export default {

        components: { Editor }

    }
</script>

<style>
    .device-editor-container{
        min-height: 100vh;
        display: grid;
        align-content: center;
    }
    .device-editor-container div{
        width: 40%;
        margin: 0 auto;
    }
    .add-margin-top{
        margin-top: 0;
    }
</style>