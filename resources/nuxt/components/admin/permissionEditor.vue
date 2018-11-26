<template>
    <div class="container">

        <h5>Permission</h5>

        <span class="cancel-modal" @click.prevent="$store.dispatch('permissions/toggleAddPermissionModal')">
            <i class="fa fa-asterisk fa-2x"></i>
        </span>

        <form @submit.prevent="submit">
            <label for="name">Name</label>

            <input type="text" id="name" v-model="name" placeholder="Permission label">

            <button type="submit" class="">{{ submitTxt }}</button>
        </form>

    </div>
</template>

<script>
    export default {

        data() {
            return {
                submitTxt: 'Submit',
                name: '',
                errors: null
            }
        },

        methods: {
            async submit() {
                if(this.$route.params.id) {
                    try {
                        this.submitTxt = 'submitting'

                        let data = await this.$axios.$put(`/api/permissions/${this.$route.params.id}`, {name: this.name })
                        this.$store.dispatch('permissions/setPermissions', data)
                        this.$router.push({path: '/admin/access-control'})
                    } catch (e) {
                        this.errors = e
                    }
                } else {
                    try {
                        this.submitTxt = 'submitting'

                        let data = await this.$axios.$post('/api/permissions', {name: this.name })
                        this.$store.dispatch('permissions/setPermissions', data)
                        this.$store.dispatch('permissions/toggleAddPermissionModal')
            
                    } catch (e) {
                        this.errors = e
                    }
                }
            },
            async loadPermission() {
                let perm = await this.$axios.$get(`/api/permissions/${this.$route.params.id}`)
                this.name = perm[0].name
            }
        },

        mounted() {
            if(this.$route.params.id && this.$store.state.permissions.allPermissions) {
                let self = this
                this.$store.state.permissions.allPermissions.filter(perm => {
                    if(perm.id == this.$route.params.id) {
                        self.name = perm.name
                    }
                })
            } else if(this.$route.params.id) {
                this.loadPermission()
            }

            /*if(!this.isSuperAdmin()){
                history.back(-1);
            }*/
        }
    }
</script>

<style scoped>

    form{
        position: relative;
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(auto-fit, 380px 1fr);
    }

    .fa-asterisk{
        cursor: pointer;
        position: absolute;
        top: -60px;
        right: -10px;
        color: indianred;
    }

</style>