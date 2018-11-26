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
            localStorage.setItem('timeLoggedIn', Date.now());
            localStorage.setItem('tokenRefreshTime', Date.now());
        } else if(localStorage.getItem('token')){
            commit('SET_TOKEN', localStorage.getItem('token'));
        }
        // else{
        //     window.location = "/logout";
        // }
        
    },

    setUser ({ commit }, user) {
        

        if (user) {
            commit('SET_USER', user);
            localStorage.setObj('user',user);
        } else if(localStorage.getObj('user')) {
            commit('SET_USER', localStorage.getObj('user'));
        }
        // else{
        //     window.location = "/logout";
        // }
        console.log(localStorage.getObj('user'))
        
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