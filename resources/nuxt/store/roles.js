export const state = () => ({
    allRoles: null,
    toggleAddRoleModal: false
})

export const mutations = {

    SET_ROLES (state, payload) {
        state.allRoles = payload
    },
    TOGGLE_ADD_ROLE_MODAL (state) {
        state.toggleAddRoleModal = !state.toggleAddRoleModal
    },
}

export const actions = {

    toggleAddRoleModal ({ commit }) {
        commit ('TOGGLE_ADD_ROLE_MODAL')
    },

    setRoles ({ commit }, roles) {
        if(roles) {
            commit('SET_ROLES', roles)
        } else {
            this.$axios.$get('/api/role').then(
                response =>{
                    console.log(response);
                    commit('SET_ROLES', response);
                }
            );
        }
    }
}

export const getters = {
    roles: state => state.allRoles,
    toggleAddRoleModal: state =>  state.toggleAddRoleModal,
}
