<template>
    <div class="item-action">
        <div
                v-if="selectedItem"
                :class="[{'selected-item': selectedItem}, {'unselected-item': !selectedItem}]">

            <div>
                <span v-if="selectedItem.id == item.id" class="selected-item-action">
                    <a
                            href="#"
                            @click.prevent="$router.push(`${route}/${item.id}`)">
                            <i class="fa fa-eye"></i>
                    </a>
                    <a
                            href="#"
                            @click.prevent="$router.push(`${route}/${item.id}/edit`)">
                            <i class="fa fa-pencil"></i>
                    </a>
                    <a
                            href="#"
                            @click.prevent="$router.push({
                                path: `${route}/${item.id}/delete`,
                                params: item.id,
                                query: {deleteApi, redirectUser}}
                            )">
                            <i class="fa fa-trash"></i>
                    </a>
                </span>
            </div>
        </div>

        <span class="ellipsis" @click="setSelected(item)">
            <i v-if="selectedItem && selectedItem.id == item.id"
               @click.stop="unsetSelected"
               @mouseout.stop=""
               class="fa fa-times-circle fa-2x">
            </i>
            <i v-else="" class="fa fa-ellipsis-v fa-2x"></i>
        </span>

    </div>

</template>

<script>

    export default {

        props: [
            'selectedItem',
            'item',
            'route',
            'deleteApi',
            'selectedItemStore', // The module to store the selected item.
            'dispatchAction', // The module to store the response.
            'redirectUser' // Route to go after deleting a user.
        ],

        methods: {
            unsetSelected() {
                this.$store.dispatch(this.selectedItemStore, null)
            },

            setSelected(){
                this.$store.dispatch(this.selectedItemStore, this.item)
            }

        },


    }

</script>

<style scoped>
    .item-action{
        position: relative;

    }
    .ellipsis{
        cursor: pointer;
        transition: 1s ease;
        color: #4d1f56;
        position: absolute;
        top: 50%;
        right: 0;

    }
    .fa-times-circle{
        position: absolute;
        top: 50%;
        right: -15px;
        transform: translate(-50%, -50%);
    }

    .selected-item-action i{
        margin: 0 5px;
        font-size: 1.2rem;
        cursor: pointer;
    }
    .fa-eye{
        color: #24bf83;
    }
    .fa-pencil{
        color: #333
    }
    .fa-trash{
        color: indianred;
    }
</style>