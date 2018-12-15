<template>
    <div></div>
</template>

<script>

    import DeleteItem from '~/mixins/deleteItem'

    export default {

        mixins: [DeleteItem],

        mounted() {

            this.deleteItem(this.$route.query.deleteApi, this.$route.params.id, this.$route.query.redirectUser)

        }

    }

</script>
