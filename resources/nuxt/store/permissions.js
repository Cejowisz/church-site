export const state = () => ({
    allPermissions: null,
    toggleAddPermissionModal: false
})

export const mutations = {

    SET_PERMISSIONS (state, payload) {
        state.allPermissions = payload
    },
    TOGGLE_ADD_PERMISSION_MODAL (state) {
        state.toggleAddPermissionModal = !state.toggleAddPermissionModal
    },
}

export const actions = {

    toggleAddPermissionModal ({ commit }) {
        commit ('TOGGLE_ADD_PERMISSION_MODAL')
    },

    setPermissions ({ commit }, payload) {
        if(payload) {
            commit('SET_PERMISSIONS', payload)
        } else {
            this.$axios.$get('/api/permissions').then(
                response =>{
                    console.log(response);
                    commit('SET_PERMISSIONS', response);
                }
            );
        }
    }
}

export const getters = {
    allPermissions: state => state.allPermissions,
    toggleAddPermissionModal: state =>  state.toggleAddPermissionModal,
}
