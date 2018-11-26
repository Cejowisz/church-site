<template>

        <form class="">
            <small v-if="fieldsAlert">All Fields are required</small>

            <span class="cancel-modal" @click.prevent="$store.dispatch('devices/toggleAddDeviceModal')">
                <i class="fa fa-asterisk fa-2x"></i>
            </span>

            <label for="label" class="sr-only">label</label>
            <input
                    type="text"
                    v-model="details.label"
                    id="label"
                    placeholder="Device label"
                    autocomplete="label"
            />

            <label for="description" class="sr-only">description</label>
            <input
                    type="text"
                    v-model="details.description"
                    id="description"
                    placeholder="Device description"
                    autocomplete="description"
            />

            <label for="specification" class="sr-only">specification</label>
            <input
                    type="text"
                    v-model="details.specification"
                    id="specification"
                    placeholder="Device specification"
                    autocomplete="specification"
            />

            <label for="deviceAddress" class="sr-only">device address</label>
            <input
                    type="text"
                    v-model="details.device_address"
                    id="deviceAddress"
                    placeholder="Device address"
                    autocomplete="device address"
            />

            <label for="deviceNodes" class="sr-only">device nodes</label>
            <select id="deviceNodes" v-model="details.device_node_id">
                <option>Select device node</option>
                <option v-for="dn in deviceNodes" :value="dn.id">{{ dn.label }}</option>
            </select>

            <label for="deviceTypes" class="sr-only">device types</label>
            <select id="deviceTypes" v-model="details.device_type">
                <option>Select device type</option>
                <option v-for="dt in deviceTypes" :value="dt">{{ dt }}</option>
            </select>

            <button class="add-device" @click.prevent="addDevice">{{ buttonTxt }}</button>
        </form>

</template>

<script>

    export default {

        data() {
            return {
                buttonTxt: 'ADD',
                deviceNodes: '',
                details: {
                    label: '',
                    description: '',
                    specification: '',
                    device_node_id: 'Select device node',
                    device_type: 'Select device type',
                    device_address: ''
                },

                deviceTypes: [
                    'power meter',
                    'vibration meter',
                    'frequency meter',
                    'liquid level meter',
                    'light switch meter',
                    'low power socket meter',
                    'high power socket meter',
                ],
                fieldsAlert: false
            }
        },

        methods: {
            async loadDeviceNodes() {

                try {
                    this.deviceNodes = await this.$axios.$get('/api/device-nodes')
                }

                catch (e) {
                    console.log(e)
                }

            },

            async addDevice() {

                if (
                    this.details.label !== '' &&
                    this.details.description !== '' &&
                    this.details.specification !== '' &&
                    this.details.deviceNodeId !== '' &&
                    this.details.deviceType !== '' &&
                    this.details.deviceAddress !== ''
                )
                {
                    // Device edit route.
                    if (this.$route.params.id) {

                        try {
                            let { devices } = await this.$axios
                                .$put(`/api/devices/${this.$route.params.id}`, this.details)
                            this.$store.dispatch('user/devices', devices)
                            this.$router.push('/devices')
                        }

                        catch (e) {
                            console.log(e)
                        }

                    } else {

                        // Device add route.
                        try {
                            let { devices } = await this.$axios.$post('/api/devices', this.details)
                            this.$store.dispatch('devices/toggleAddDeviceModal')
                            this.$store.dispatch('user/devices', devices)
                        }

                        catch (e) {
                            console.log(e)
                        }

                    }
                } else {
                    this.fieldsAlert = true
                }
            },

            async loadDevice() {
                try {
                    this.details = await this.$axios.$get(`/api/devices/${this.$route.params.id}`)
                }
                catch (e) {
                    console.log(e)
                }
            },

            getDevice() {
                if (this.$store.state.user.devices && this.$route.params.id) {
                    this.buttonTxt = 'UPDATE'
                    this.details = this.$store.state.user.devices
                        .filter( device => device.id == this.$route.params.id)[0]
                } else if (this.$route.params.id) {
                    this.buttonTxt = 'UPDATE'
                    this.loadDevice()
                }
            }
        },

        mounted() {
            this.loadDeviceNodes()
            this.getDevice()
        }

    }

</script>

<style scoped>
    form{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
    }
    .cancel-modal{
        position: absolute;
        right: 0;
        top: -30px;
        cursor: pointer;
        color: indianred;
    }
    input, .add-device{
        grid-column: 1 / -1;
    }
    #deviceNodes{
        grid-column: 1 / 2;
        width: 100%;
    }
    #deviceTypes{
        grid-column: 2 / 3;
        width: 100%;
    }
    input{
        border-bottom: 2px solid #3c0606;
        color: #333;
        font-size: 1rem;
        transition: 2s ease-in-out;
    }
    select{
        padding: 10px;
    }
</style>
