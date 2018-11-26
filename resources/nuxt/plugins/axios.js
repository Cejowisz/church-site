

export default function ({ $axios, store }) {

    $axios.onError(error => {
        if (error.response.data.message === 'Token has expired') {
            $axios.$post('/api/refresh', {token: localStorage.getItem('token')})
                .then(res => {
                    localStorage.setItem('token', res)
                    location.reload()
                })
        }
    })



    // Check if the token has expired. If so refresh first.
    const timeDiff = (Math.floor(Date.now() / 1000)) - (Math.floor(localStorage.getItem('tokenRefreshTime') / 1000));
    // let token = localStorage.getItem('token');


    
    // if (timeDiff > 3600) {
    //             let fd = new FormData();
    //             fd.append('token', token);

    //             this.$axios.$post('/api/refresh?token=' + token, fd)
    //                 .then(response => {
    //                     token = response.data;
    //                     localStorage.setItem('token', token);
    //                     localStorage.setItem('tokenRefreshTime', Date.now());

    //                     // return apiCall(token);
    //                 })
    //             }

    // Set the token on every request.
    $axios.onRequest((config) => {
        config.headers.common['Authorization'] = `Bearer ${store.getters['auth/token']}`
        return config

    })

}

