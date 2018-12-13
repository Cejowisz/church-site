export default {

    methods: {

        async deleteItem(deleteApi, paramsId, redirectAfterDeleete) {

            try {
                let res = await this.$axios.$delete(`${deleteApi}/${paramsId}`)
                this.$router.push(redirectAfterDeleete)

                // window.location.href = redirectAfterDeleete
            }
            catch (e) {
                console.log(e)
            }
        }
    },

    mounted() {

        let query = window.location.href.match(/^(.*)\?/);
        if (query){
            history.pushState(null, "", query[1]);
        }

    }

}