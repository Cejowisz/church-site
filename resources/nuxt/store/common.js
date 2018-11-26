
// States
export const state = () =>({
    loginFacet: true,
    registerFacet: false,
    sidenavToggle: false
})

// mutations
export const mutations = {
    REGISTER_FACET (state, payload) {
        if (payload === true) {
            state.registerFacet = payload
            state.loginFacet = !payload
        }

        if (payload === false) {
            state.registerFacet = payload
            state.loginFacet = !payload
        }
    },
    SIDE_NAV_TOGGLE (state) {
        state.sidenavToggle = !state.sidenavToggle
    }
}

// actions

export const actions = {
    loginRegisterFacet ({ commit }, payload) {
        commit ('REGISTER_FACET', payload)
    },
    sidenavToggle ({ commit }) {
        Math.max(document.documentElement.clientWidth, window.innerWidth || 0) <= 767 ?
        commit ('SIDE_NAV_TOGGLE') : ''
    }
}

// Getters
export const getters = {
    loginFacet: state =>  state.loginFacet,
    registerFacet: state =>  state.registerFacet,
    sidenavToggle: state =>  state.sidenavToggle
}
