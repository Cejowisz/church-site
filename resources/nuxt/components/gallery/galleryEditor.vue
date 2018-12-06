<template>
    <form id="galleryForm">
        <span @click.prevent="resetForm"><i class="fa fa-asterisk fa-3x"></i></span>
        <div v-for="(field, i) in details" class="fields">
            <input type="text" id="title" v-model="field.title" placeholder="Title" autocomplete="title">
            <input type="text" id="desc" v-model="field.description" placeholder="Description" autocomplete="description">
            <input type="file" accept="image/*" @change="onImageChange(i, $event)" id="file">

        </div>

        <button @click.prevent="addFields">Add Fields</button>
        <button @click.prevent="submitForm">Submit</button>
    </form>
</template>

<script>

    export default {

        data() {
            return {
                details: [{title: '', description: '', image: ''}],
                image: ''
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