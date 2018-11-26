
// States
export const state = () =>({
    toggleAddDeviceModal: false,
    measurements: ''
})

// mutations
export const mutations = {
    TOGGLE_ADD_DEVICE_MODAL (state) {
        state.toggleAddDeviceModal = !state.toggleAddDeviceModal
    },

    MEASUREMENTS (state, payload) {
        state.measurements = payload
    }
}

// actions

export const actions = {

    toggleAddDeviceModal ({ commit }) {
        commit ('TOGGLE_ADD_DEVICE_MODAL')
    },

    async measurements ({commit}, payload) {
        if (payload) {
            commit ('MEASUREMENTS', payload)
        } else {
            try {
                let res = await this.$axios.$get('/api/measurements')
                commit ('MEASUREMENTS', res)

            } catch (e) {
                console.log('Error from store: '+ e)
            }
        }
    }
}

// Getters
export const getters = {
    toggleAddDeviceModal: state =>  state.toggleAddDeviceModal,
    measurements: state =>  state.measurements
}
