<template>
    <form>
        <div v-for="(field, i) in details">
            <input type="text" v-model="field.title">
            <input type="text" v-model="field.description">

            <button @click.prevent="addFields">Add Fields</button>
        </div>
    </form>
</template>

<script>

    export default {

        methods: {
            addFields() {
                this.details.push({
                    title: '',
                    description: ''
                })
            }

        }

    }

</script>