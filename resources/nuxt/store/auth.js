export const state = () => ({
    user: localStorage.getItem('user'),
    token: localStorage.getItem('token')
})

export const mutations = {
    SET_TOKEN (state, token) {
        state.token = token;
    },
    SET_USER (state, user) {
        state.user = user
    }
}

export const actions = {
    setToken ({ commit }, { token, remember}) {
        if (token) {
            commit('SET_TOKEN', token);
            localStorage.setItem('token', token);

        } else if(localStorage.getItem('token')){
            commit('SET_TOKEN', localStorage.getItem('token'));
        }
        
    },

    setUser ({ commit }, user) {

        commit('SET_USER', user);
        
    },

    unsetAll ({ commit }) {
        state.user = null;
        state.token = null;
        localStorage.clear();
        window.location = "/login";
    }
}

// getters
export const getters = {
    user: state => state.user,
    token: state => state.token,
    check: state => state.user !== null
}