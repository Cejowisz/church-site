export default ({app, store}) => {


        (async () => {

            //Set the token on every request.
            app.$axios.onRequest((config) => {
                if(!localStorage.getItem('token')){
                    // window.location.replace('/login');
                }
                config.headers.common['Authorization'] = `Bearer ${store.getters['auth/token']}`;
            })

            })()

}


/*let arrayA = [
                                        { name: "temperature", data: {"2000-09-26": 82} },
                                        { name: "temperature", data: {"1997-03-08": 71} },
                                        { name: "current", data: {"1993-08-11": 79} },
                                        { name: "frequency", data: {"2004-01-17": 16} },
                                        { name: "current", data: {"1997-02-14": 65} }
                                    ]

                                let arrayB = [
                                    { name: "temperature", data: {"2000-09-26": 82, "1997-03-08": 71} },
                                    { name: "current", data: {"1993-08-11": 79, "1997-02-14": 65} },
                                    { name: "frequency", data: {"2004-01-17": 16} }
                                ]*/