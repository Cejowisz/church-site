<template>
<div class="sidenav-container">
  <div
    v-if="displaySidenav"
    class="sidenav-backdrop"
    @click="$store.dispatch('common/sidenavToggle')"></div>
  <transition name="slide-side">
    <div
      v-if="displaySidenav"
      class="sidenav">
      <app-link></app-link>
    </div>
  </transition>
</div>
</template>

<script>

  import AppLink from '../../components/appLink'

export default {

    name: "TheSidenav",

    components: { AppLink },

    props: {
        show: {
            type: Boolean,
            default: false
        }
    },

    computed: {
        displaySidenav() {
            return this.$store.getters['common/sidenavToggle']
        }
    }
}
</script>


<style scoped>
.sidenav-container {
  height: 100%;
  width: 100%;
}

.sidenav-backdrop {
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  z-index: 10000;
  position: fixed;
  top: 0;
  left: 0;
}

.sidenav {
  height: 100%;
  width: 300px;
  background-color: white;
  z-index: 10000;
  position: fixed;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 30px;
}

.slide-side-enter-active,
.slide-side-leave-active {
  transition: all 0.3s ease-out;
}
.slide-side-enter,
.slide-side-leave-to {
  transform: translateX(-100%);
}

</style>
