
export default {

    data() {
        return {
            modalTxt: 'ADD',
            showModal: '',
            showPermModal: ''
        }
    },

    computed: {
        toggleModal() {
            if (this.$route.path === '/admin/access-control') {
                return this.$store.getters['roles/toggleAddRoleModal']
            }
            if (this.$route.path === '/devices') {
                return this.$store.getters['devices/toggleAddDeviceModal']
            }
        },
        togglePermModal() {
            return this.$store.getters['permissions/toggleAddPermissionModal']
        }
    },

    watch: {
        toggleModal: function(e) {
            if (e === true) {
                this.showModal = true
                this.modalTxt= 'Cancel'
            } else {
                this.modalTxt= 'Add'
                this.showModal = false
            }
        },
        togglePermModal: function(e) {
            if (e === true) {
                this.showPermModal = true
                this.modalTxt= 'Cancel'
            } else {
                this.modalTxt= 'Add'
                this.showPermModal = false
            }
        }
    },


}