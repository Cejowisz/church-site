<template>
    <form id="galleryForm">
        <span @click.prevent="resetForm"><i class="fa fa-asterisk fa-3x"></i></span>

        <input type="text" id="title" v-model="details.title" placeholder="Title" autocomplete="title">
        <input type="text" id="desc" v-model="details.description" placeholder="Description" autocomplete="description">

        <input
                type="text"
                id="datepicker-trigger"
                placeholder="Select departure date"
                :value="formattedDate(details.startDate)"
                @focus="clearField"
        >

        <AirbnbStyleDatepicker
                :trigger-element-id="'datepicker-trigger'"
                :mode="'single'"
                :fullscreen-mobile="true"
                :date-one="details.startDate"
                :months-to-show="1"
                @date-one-selected="val => { details.startDate = val }"
        />

        <input
                type="text"
                id="datepicker-trigger"
                placeholder="Select departure date"
                :value="formattedDate(details.endDate)"
                @focus="clearField"
        >

        <AirbnbStyleDatepicker
                :trigger-element-id="'datepicker-trigger'"
                :mode="'single'"
                :fullscreen-mobile="true"
                :date-one="details.endDate"
                :months-to-show="1"
                @date-one-selected="val => { details.endDate = val }"
        />

        <input type="file" accept="image/*" @change="onImageChange" id="file">

        <button @click.prevent="submitForm">Submit</button>
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
                    startDate: '',
                    endDate: '',
                    image: ''
                },

                invalidArrivalDate: null,
                invalidDepartureDate: null,
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
                this.details.startDate = ''
                this.details.endDate = ''

                this.$emit('cancelForm')
            },

            getEvents() {
                if (this.$route.params.id && this.$store.state.events.allEvents) {
                    this.details = this.$store.state.events.allEvents.filter( item => item.id == this.$route.params.id)
                } else if (this.$route.params.id) {
                    this.loadGallery()
                }
            },

            async submitForm() {

                if (this.$route.params.id) {
                    try {
                        let res = await this.$axios.$put(`/api/programs/${this.$route.params.id}`, this.details)
                        this.$store.dispatch('events/allEvents', res)
                    }
                    catch (e) {console.log(e)}
                }

                try {
                    let res = await this.$axios.$post('/api/programs', this.details)
                    console.log(res)
                }
                catch (e) {console.log(e)}
            },

            clearField() {
                this.invalidArrivalDate = this.invalidDepartureDate = ''
            },

        },

        mounted() {
            this.getEvents()
        }

    }

</script>

<style scoped>
    form, .fields{
        display: grid;
        grid-gap: 15px;
        grid-template-columns: 1fr 1fr;

    }
    .fields{
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
</style>