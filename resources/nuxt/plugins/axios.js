

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


}

