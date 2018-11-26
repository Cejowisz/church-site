<template>
    <div>
        <div v-for="(permission, i) in permissions">
            <span>{{ permission.name }}</span>
            <span>
                <a href="#" class="" @click.prevent="editPermission(perm.id)">Edit</a>
                <a href="#" class="" @click.prevent="deletePermission(perm.id)">Delete</a>
            </span>
        </div>
    </div>
</template>

<script>
    export default {

        methods: {
            editPermission(id) {

            },
            deletePermission(id) {

            }
        },

        computed: {
            permissions() {
                return this.$store.getters['permissions/allPermissions']
            }
        }

    }
</script>