<template>
    <form id="galleryForm">
        <span @click.prevent="resetForm"><i class="fa fa-asterisk fa-3x"></i></span>

        <input type="text" id="title" v-model="details.title" placeholder="Title" autocomplete="title">
        <input type="text" id="desc" v-model="details.description" placeholder="Description" autocomplete="description">

        <input
                type="text"
                id="datepicker-trigger"
                placeholder="Select start date"
                :value="formattedDate(details.start_date)"
                @focus="clearField"
        >

        <AirbnbStyleDatepicker
                :trigger-element-id="'datepicker-trigger'"
                :mode="'single'"
                :fullscreen-mobile="true"
                :date-one="details.start_date"
                :months-to-show="1"
                @date-one-selected="val => { details.start_date = val }"
        />

        <input
                type="text"
                id="datepicker-trigger1"
                placeholder="Select end date"
                :value="formattedDate(details.end_date)"
                @focus="clearField"
        >

        <AirbnbStyleDatepicker
                :trigger-element-id="'datepicker-trigger1'"
                :mode="'single'"
                :fullscreen-mobile="true"
                :date-one="details.end_date"
                :months-to-show="1"
                @date-one-selected="val => { details.end_date = val }"
        />

        <select v-model="details.category_id" id="category">
            <option>Select category</option>
            <option v-if="categories" v-for="category in categories" :value="category.id">
                {{ category.title }}
            </option>
        </select>

        <input type="file" accept="image/*" @change="onImageChange" id="file">

        <button @click.prevent="submitForm">{{ submitTxt }}</button>
    </form>
</template>

<script>

    import formatDates from '~/mixins/formatDates'

    export default {

        mixins: [formatDates],

        data() {
            return {
                details: {
                    title: '',
                    description: '',
                    start_date: '',
                    end_date: '',
                    category_id: 'Select category',
                    image: ''
                },
                categories: '',
                invalidArrivalDate: null,
                invalidDepartureDate: null,
                submitTxt: 'Submit'
            }
        },

        methods: {

            onImageChange(e) {
                if (! e.target.files.length) return

                this.details.image = e.target.files[0]

            },

            resetForm() {

                this.details.title = ''
                this.details.description = ''
                this.details.start_date = ''
                this.details.end_date = ''
                this.details.category_id = ''
                this.details.image = ''

                this.$emit('cancelForm')
            },

            getEvents() {
                if (this.$route.params.id && this.$store.state.events.allEvents) {
                    this.details = this.$store.state.events.allEvents
                        .filter( item => item.id == this.$route.params.id)[0]
                } else if (this.$route.params.id) {
                    this.loadGallery()
                }
            },

            async submitForm() {
                this.submitTxt = 'Submitting ...'

                const fd = new FormData()
                fd.append('title', this.details.title)
                fd.append('description', this.details.description)
                fd.append('image', this.details.image)
                fd.append('start_date', this.details.start_date)
                fd.append('end_date', this.details.end_date)
                fd.append('category_id', this.details.category_id)

                if (this.$route.params.id) {

                    try {
                        let res = await this.$axios.$put(`/api/programs/${this.$route.params.id}`, this.details)
                        return console.log(res)
                        this.$store.dispatch('events/allEvents', res)
//                        this.$emit('cancelForm')
                    }
                    catch (e) {console.log(e)}
                } else {
                    try {
                        let res = await this.$axios.$post('/api/programs', fd)
                        this.$store.dispatch('events/allEvents', res)
                        this.$emit('cancelForm')

                    }
                    catch (e) {console.log(e)}
                }


            },

            clearField() {
                this.invalidArrivalDate = this.invalidDepartureDate = ''
            },

            async getCategories() {
                try {
                    this.categories = await this.$axios.$get('/api/categories')
                }
                catch (e) {console.log(e)}
            },

            async loadGallery() {
                try {
                    this.details = await this.$axios.$get(`/api/programs/${this.$route.params.id}`)
                }
                catch (e) {this.errors = e}

            }

        },

        mounted() {
            this.getEvents()
            this.getCategories()
        }

    }

</script>

<style scoped>
    form{
        display: grid;
        grid-gap: 15px;
        grid-template-columns: 50% 50%;

    }

    #title, #category{
        grid-column: 1 / 2;
    }
    #desc, #file{
        grid-column: 2 / 3;
    }
    button{
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
        form{
            grid-template-columns: 100%;
        }
        #title, #category, #desc, #file, button{
            grid-column: 1 / -1;
        }
    }
</style>