import format from 'date-fns/format'

export default {
    data() {
        return {
            dateFormat: 'D, MMM h a'
        }
    },

    methods: {
        formattedDate(dirtyDate) {
            let formattedDates = ''
            if(dirtyDate) {
                formattedDates = format(dirtyDate, this.dateFormat)
            }
            return formattedDates
        },
    }
}