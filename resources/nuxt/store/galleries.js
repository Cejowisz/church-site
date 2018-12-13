
// States
export const state = () =>({
    allGalleries: '',
    selectedItem: ''
})

// mutations
export const mutations = {

    GALLERIES (state, payload) {
        state.allGalleries = payload
    },

    SELECTED_ITEM (state, data) {
        state.selectedItem = data
    },
}

// actions

export const actions = {

    async allGalleries ({commit}, payload) {
        if (payload) {
            commit ('GALLERIES', payload)
        } else {
            try {
                let res = await this.$axios.$get('/api/galleries')
                commit ('GALLERIES', res)

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
    allGalleries: state =>  state.allGalleries,
    selectedItem: state => state.selectedItem,
}
