

// States
export const state = () =>({
    devices: null,
    selectedDevice: null

})

// mutations
export const mutations = {
    DEVICES (state, data) {
        state.devices = data
    },

    SELECTED_DEVICE (state, data) {
        state.selectedDevice = data
    }
  }

// actions

export const actions = {

    async devices ({ commit }, data) {
        if (data) {
            commit ('DEVICES', data)
        } else {

            try {
                let { devices } = await this.$axios.$get('/api/devices')
                commit ('DEVICES', devices)

            } catch (e) {
                console.log('Error from store: '+ e)
            }

        }
    },

    selectedDevice ({ commit }, data) {
        commit ('SELECTED_DEVICE', data)
    }

}

// Getters
export const getters = {
    devices: state => state.devices,
    selectedDevice: state => state.selectedDevice,

}
