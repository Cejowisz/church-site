<template>

    <form class="role-form" @submit.prevent="submit">

        <h5>Add Role</h5>

        <span class="cancel-modal" @click.prevent="$store.dispatch('roles/toggleAddRoleModal')">
            <i class="role-fa fa fa-asterisk fa-2x"></i>
        </span>

        <label class="sr-only" for="name">Name of Role</label>

        <input type="text" v-model="role.name" placeholder="Role name" id="name">

        <multiselect
                v-model="selectedPermissions"
                :options="role.permissions"
                :multiple="true"
                :close-on-select="true"
                :clear-on-select="false"
                :hide-selected="true"
                label="name"
                track-by="name"
                :preserve-search="false">
        </multiselect>

        <button type="submit" class="btn">{{ submitTxt }}</button>

    </form>

</template>

<script>

    import Multiselect from 'vue-multiselect'

    export default {

        components: { Multiselect },

        data() {
            return {
                submitTxt: 'Save',
                role: {
                    permissions: []
                },
                selectedPermissions: [],
                errors: null
            }
        },

        methods: {

            allPermissions() {
                this.$store.state.permissions.allPermissions.filter( item => {
                    this.role.permissions.push({name: item.name})
                })
            },

            async submit() {

                if (this.$route.params.id) {
                    try {
                        let data = await this.$axios.$put(`/api/role/${this.$route.params.id}`, this.payload())
                        this.$store.dispatch('roles/setRoles', data)
                        this.$store.dispatch('roles/toggleAddRoleModal')
                    } catch (e) {
                        this.errors = e
                    }
                } else {
                    try {
                        let data = await this.$axios.$post('/api/role', this.payload())
                        this.$store.dispatch('roles/setRoles', data)
                        this.$store.dispatch('roles/toggleAddRoleModal')
                    } catch (e) {
                        this.errors = e
                    }
                }
            },

            async loadRole() {
                let role = await this.$axios.$get(`/api/role/${this.$route.params.id}`)
                this.name = role[0].name
            },

            payload() {
                let permissions = []
                for (let i in this.selectedPermissions) {
                    permissions[i] = this.selectedPermissions[i].name
                }
                return {
                    name: this.role.name,
                    permissions: permissions
                }
            }
        },

        computed: {

        },

        mounted() {
            this.allPermissions()

            if(this.$route.params.id && this.$store.state.roles.allRoles) {
                let self = this
                this.$store.state.roles.allRoles.filter(role => {
                    if(role.id == this.$route.params.id) {
                        self.name = role.name
                    }
                })
            } else if(this.$route.params.id) {
                this.loadRole()
            }
        }
    }
</script>

<style>
    @import '../../../../node_modules/vue-multiselect/dist/vue-multiselect.min.css';

    .role-form{
        position: relative;
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(auto-fit, 380px 1fr);
    }

    .role-fa{
        cursor: pointer;
        position: absolute;
        top: -90px;
        right: -30px;
        color: indianred;
    }

</style>
