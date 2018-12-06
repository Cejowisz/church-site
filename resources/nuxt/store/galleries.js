
// States
export const state = () =>({
    allGalleries: ''
})

// mutations
export const mutations = {

    GALLERIES (state, payload) {
        alert(JSON.stringify(payload))
        state.allGalleries = payload
    }
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
    }
}

// Getters
export const getters = {
    allGalleries: state =>  state.allGalleries
}
