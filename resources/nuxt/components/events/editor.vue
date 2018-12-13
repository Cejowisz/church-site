<template>
    <form id="galleryForm">
        <span @click.prevent="resetForm"><i class="fa fa-asterisk fa-3x"></i></span>

        <input type="text" id="title" v-model="field.title" placeholder="Title" autocomplete="title">
        <input type="text" id="desc" v-model="field.description" placeholder="Description" autocomplete="description">

        <input
                type="text"
                id="datepicker-trigger"
                placeholder="Select departure date"
                :value="formattedDate(startDate)"
                @focus="clearField"
        >

        <AirbnbStyleDatepicker
                :trigger-element-id="'datepicker-trigger'"
                :mode="'single'"
                :fullscreen-mobile="true"
                :date-one="startDate"
                :months-to-show="1"
                @date-one-selected="val => { startDate = val }"
        />

        <input
                type="text"
                id="datepicker-trigger"
                placeholder="Select departure date"
                :value="formattedDate(endDate)"
                @focus="clearField"
        >

        <AirbnbStyleDatepicker
                :trigger-element-id="'datepicker-trigger'"
                :mode="'single'"
                :fullscreen-mobile="true"
                :date-one="endDate"
                :months-to-show="1"
                @date-one-selected="val => { endDate = val }"
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
                    image: ''},
            }
        },

        methods: {

            onImageChange(e) {
                if (! e.target.files.length) return

                this.details.image = e.target.files[0]

            },

            resetForm() {

                item.title = ''
                item.description = ''

                this.$emit('cancelForm')
            },

            async submitForm() {

                try {
                    let res = await this.$axios.$post('/api/galleries', this.details)
                    console.log(res)
                }
                catch (e) {console.log(e)}
            }

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