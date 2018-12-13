<template>
    <div class="events-container">
        <div class="events-intro">
            <h1>Our Events</h1>
        </div>
        <div class="event-tab">
            <span class="special-tab" @click.prevent="specialEvents">Special Events</span>
            <span class="workshop-tab" @click.prevent="workshopEvents">Workshop Series</span>
            <span class="children-tab" @click.prevent="childrenEvents">Children Programs</span>
        </div>

        <div v-if="specialTab" class="events">
            <div v-if="specials.length > 0" class="events-inner">
                <div v-for="special in specials">
                    <h1>{{ special.title }}</h1>
                    <p>{{ special.description }}</p>
                    <span class="events-time">
                        <span v-if="special.start_date">From: {{ formattedDate(special.start_date) }}</span>
                        <span v-if="special.end_date">To: {{ formattedDate(special.end_date) }}</span>
                    </span>
                </div>
            </div>
            <div v-else><p>No upcoming Special program</p></div>
        </div>

        <div v-if="workshopTab" class="events">
            <div v-if="workshops.length > 0" class="events-inner">
                <div v-for="workshop in workshops">
                    <h1>{{ workshop.title }}</h1>
                    <p>{{ workshop.description }}</p>
                    <span class="events-time">
                        <span v-if="workshop.start_date">From: {{ formattedDate(workshop.start_date) }}</span>
                        <span v-if="workshop.end_date">To: {{ formattedDate(workshop.end_date) }}</span>
                    </span>
                </div>
            </div>
            <div v-else><p>No upcoming Workshop program</p></div>
        </div>

        <div v-if="childrenTab" class="events">
            <div v-if="children.length > 0" class="events-inner">
                <div v-for="c in children">
                    <h1>{{ c.title }}</h1>
                    <p>{{ c.description }}</p>
                    <span class="events-time">
                        <span v-if="c.start_date">From: {{ formattedDate(c.start_date) }}</span>
                        <span class="to" v-if="c.end_date">To: {{ formattedDate(c.end_date) }}</span>
                    </span>
                </div>
            </div>
            <div v-else><p>No upcoming Children program</p></div>
        </div>
    </div>
</template>

<script>

    import FormatDates from '~/mixins/formatDates'

    export default {

        mixins: [FormatDates],

        data() {
            return {
                specialTab: true,
                workshopTab: false,
                childrenTab: false,
                specials: [],
                workshops: [],
                children: [],
                allEvents: ''
            }
        },

        methods: {

            async loadEvents(){
                try {
                    this.allEvents = await this.$axios.$get('/api/programs')
                }
                catch (e) {console.log(e)}

                this.allEvents.filter( item => {
                    item.category.title === 'special' ? this.specials.push(item) : ''
                    item.category.title === 'children' ? this.children.push(item) : ''
                    item.category.title === 'workshop' ? this.workshops.push(item) : ''
                })

            },

            specialEvents() {
                this.specialTab = true
                this.workshopTab = false
                this.childrenTab = false
            },

            workshopEvents() {
                this.specialTab = false
                this.workshopTab = true
                this.childrenTab = false
            },

            childrenEvents() {
                this.specialTab = false
                this.workshopTab = false
                this.childrenTab = true
            },

        },

        mounted() {
            this.loadEvents()
            let el = document.getElementsByTagName('header')
            el[0].style.background = '#4d1f56'
        }

    }

</script>

<style>
    .events-container{
        position: relative;
    }
    .events-intro{
        height: 100px;
        width: 100%;
        position: fixed;
        top: 60px;
        padding-left: 30px;
        background: #ccc;
        color: #333;
    }
    .event-tab{
        cursor: pointer;
        color: #333;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        position: fixed;
        top: 160px;
        width: 100%;
        grid-column: 1 / -1;
    }
    .events{
        display: grid;
        justify-content: center;
        padding: 20px;
        margin-top: 150px;
    }
    .to{
        margin-left: 5px;
    }
    .events-inner > div{
        margin: 90px 5px;
        color: #333;
    }
    .special-tab{
        background: #94cd14;
        padding: 20px;
    }
    .workshop-tab{
        background: #FF4081;
        padding: 20px;
    }
    .children-tab{
        background: #ffc100;
        padding: 20px;
    }

</style>