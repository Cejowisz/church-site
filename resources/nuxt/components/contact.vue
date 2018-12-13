<template>
    <div class="contact-container">
        <form ref="form">
            <p v-if="feedback" :class="{'hide-feedback': hideFeedback}">Message delivered successfully!</p>
            <p v-if="fieldsAlert" :class="{'hide-field-alert': hideFieldAlert}">All Fields are required</p>
            <p v-if="error">Our bad. An error occured. Try again</p>

            <h3 class="underline"><slot name="contact-heading">GET IN TOUCH</slot></h3>

            <p>Please fill out form and we will get back to you as soon as possible</p>

            <input type="text" @input="clearField" v-model="details.fullname" placeholder="Fullname" id="fullname">
            <label for="fullname" class="sr-only">fullname</label>

            <input type="email" @input="clearField" v-model="details.email" placeholder="Email" id="email">
            <label for="email" class="sr-only">email</label>

            <input type="text" @input="clearField" v-model="details.phone" placeholder="Phone" id="phone">
            <label for="phone"></label>

            <textarea  @input="clearField" v-model="details.message" :placeholder="messagePlaceHolder" id="message" cols="30" rows="3"></textarea>
            <label for="message"></label>

            <button @click.prevent="send">{{ sendText }}</button>
        </form>
        <div class="contact-left">

            <slot></slot>

        </div>
    </div>
</template>

<script>

    import _ from 'lodash'

    export default {

        props: ['apiRoute'],

        data() {
            return {
                details: {
                    fullname: '',
                    email: '',
                    phone: '',
                    message: ''
                },
                messagePlaceHolder: '',
                feedback: false,
                hideFeedback: false,
                hideFieldAlert: false,
                fieldsAlert: false,
                sendText: 'SEND',
                error: false
            }
        },


        methods: {

            async send() {

                this.sendText = 'SENDING ...'

                if (

                    this.details.fullname !== '' &&
                    this.details.email !== '' &&
                    this.details.phone !== '' &&
                    this.details.message !== ''

                ) {

                    try {
                        let res = await this.$axios.$post(`${this.apiRoute}`, this.details)

                        if(res) {
                            this.sendText = 'SEND'
                            this.details.fullname = ''
                            this.details.email = ''
                            this.details.phone = ''
                            this.details.message = ''

                            return this.feedback = true
                        }

                    }
                    catch (e) {
                        this.$refs.form.reset()
                        this.sendText = 'SEND'
                        this.error = true
                    }

                } else {

                    this.fieldsAlert = true
                    this.sendText = 'SEND'

                }
            },

            clearField() {

            },

        },
        watch: {
            feedback: function(e) {
                if (e === true) {
                    setTimeout(() => {
                        this.hideFeedback = true
                    }, 3000)
                    this.hideFeedback = false
                }

            }
        },

        mounted() {
            this.$route.path === '/contact' ?
                this.messagePlaceHolder = 'message' : this.messagePlaceHolder = 'Prayer request'
        }
    }
</script>


<style scoped>
    .contact-container{
        /*min-height: 100vh;*/
        display: grid;
        grid-template-columns: 50% 50%;
        /*background: #1A2462;*/
        color: #333;
        padding: 100px;
    }
    form{
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 10px;
        align-content: center;
    }
    form p, form h1, #fullname, #message{
        grid-column: 1 / -1;
    }
    .contact-left{
        padding-left: 100px;
        align-items: center;
        display: grid;
    }
    h4{
        margin-top: 35px;
    }
    p{
        color: #ccc;
    }
    button{
        border-radius: 3%;
        padding: 10px;
        color: #fefefe;
        border: 1px solid #fefefe;
        grid-column: 1 / -1;
        cursor: pointer;
    }
    button:hover{
        background: rgba(142, 133, 255, 0.86);
        color: #1A2462;
        transition: .9s ease-in-out;
    }
    input[type="email"], input[type="text"], textarea{
        padding: 10px;
    }
    .hide-feedback{
        display: none;
        transition: 4s ease-in;
    }

    @media (max-width: 767px) {
        .contact-container{
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr;
            padding: 10px;
        }
        form{
            display: grid;
            grid-template-columns: 1fr;
        }
        .contact-left{
            padding-left: 1px;
            margin-top: 50px;
        }
    }
</style>