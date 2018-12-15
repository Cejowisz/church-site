
// States
export const state = () =>({
    allEvents: '',
    selectedItem: ''
})

// mutations
export const mutations = {

    EVENTS (state, payload) {
        state.allEvents = payload
    },

    SELECTED_ITEM (state, data) {
        state.selectedItem = data
    },
}

// actions

export const actions = {

    async allEvents ({commit}, payload) {
        if (payload) {
            commit ('EVENTS', payload)
        } else {
            try {
                let res = await this.$axios.$get('/api/programs')
                commit ('EVENTS', res)

            } catch (e) {
                console.log('Error from store: '+ e)
            }
        }
    },

    selectedItem ({ commit }, data) {
        commit ('SELECTED_ITEM', data)
    },
}

// Getters
export const getters = {
    allEvents: state =>  state.allEvents,
    selectedItem: state => state.selectedItem,
}
