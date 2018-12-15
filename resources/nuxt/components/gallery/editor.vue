<template>
    <form id="galleryForm">
        <span v-if="errors">Error occured. Try again.</span>
        <span @click.prevent="resetForm"><i class="fa fa-asterisk fa-3x"></i></span>
        <div v-for="(field, i) in details" class="fields">
            <input type="text" id="title" v-model="field.title" placeholder="Title" autocomplete="title">
            <input type="text" id="desc" v-model="field.description" placeholder="Description" autocomplete="description">
            <input type="file" accept="image/*" @change="onImageChange(i, $event)" id="file">
        </div>

        <button v-if="!$route.params.id" @click.prevent="addFields">Add Fields</button>
        <button :class="{'full-btn': $route.params.id}" @click.prevent="submitForm">{{ submitTxt }}</button>
    </form>
</template>

<script>

    export default {

        layout: 'admin',

        data() {
            return {
                submitTxt: 'Submit',
                details: [{title: '', description: '', image: ''}],
                image: '',
                errors: ''
            }
        },

        methods: {

            onImageChange(i, e) {
                if (! e.target.files.length) return

                this.details[i].image = e.target.files[0]

            },

            addFields() {
                this.details.push({
                    title: '',
                    description: ''
                })
            },

            resetForm() {

                this.details.forEach( item => {
                    item.title = ''
                    item.description = ''
                })

                this.$emit('cancelForm')
            },

            async submitForm() {

                this.submitTxt = 'Submitting'

                if (this.$route.params.id) {

                    try {
                        let res = await this.$axios.$put(`/api/galleries/${this.$route.params.id}`, {
                            title: this.details[0].title,
                            description: this.details[0].description,
                            images: this.details[0].image
                        })
                        this.$store.dispatch('galleries/allGalleries', res)
                    }
                    catch (e) {console.log(e)}

                } else {

                    let fd = new FormData()

                    for (let index in this.details) {
                        if (this.details.hasOwnProperty(index)) {
                            fd.append('details[' + index + '][title]', this.details[index].title)
                            fd.append('details[' + index + '][description]', this.details[index].description)
                            fd.append('details[' + index + '][image]', this.details[index].image)
                        }
                    }

                    try {
                        let res = await this.$axios.$post('/api/galleries', fd)
                        this.$store.dispatch('galleries/allGalleries', res)
                    }
                    catch (e) {console.log(e)}
                }

                this.resetForm()

            },

            getGallery() {
                if (this.$route.params.id && this.$store.state.galleries.allGalleries) {
                    this.details = this.$store.state.galleries.allGalleries.filter( item => {
                        if (item.id == this.$route.params.id) {
                            return {
                                title: item.title,
                                description: item.description,
                                image: ''
                            }
                        }
                    })
                } else if (this.$route.params.id) {
                    this.loadGallery()
                }
            },

            async loadGallery() {
                try {
                    let res = await this.$axios.$get(`/api/galleries/${this.$route.params.id}`)
                    this.details.forEach(item => {
                        item.title = res.title
                        item.description = res.description
                        item.image = ''
                    })
                }
                catch (e) {this.errors = e}

            }
        },

        mounted() {
//            this.$store.dispatch('galleries/allGalleries')
            this.getGallery()
        }

    }

</script>

<style scoped>
    form, .fields{
        display: grid;
        grid-gap: 15px;
        grid-template-columns: 1fr 1fr;

    }
    .fields, .full-btn{
        grid-column: 1 / -1;
    }
    #title{
        grid-column: 1 / 2;
    }
    #desc{
        grid-column: 2 / 3;
    }
    #file{
        grid-column: 1 / -1;
    }
    .fa{
        cursor: pointer;
        color: indianred;
        position: absolute;
        top: -60px;
        right: 10px;
    }
    @media(max-width: 767px) {
        form, .fields{
            grid-template-columns: 1fr;
        }
        .fields, #title, #desc, #file{
            grid-column: 1 / -1;
        }
        .fa{
            top: 0;
            right: 60px;
            font-size: 2em;
        }

    }
</style>