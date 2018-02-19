<template>
  <transition name="fade">
    <div v-if="visible" class="portfolio-modal custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
        <div class="close-modal" @click="close()">
          <div class="lr">
            <div class="rl">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="modal-body">
                <h2>{{ heading }}</h2>
                <slot></slot>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
  export default {
    name: 'modal',
    props: {
      heading: String,
      visible: Boolean
    },
    methods: {
      close() {
        this.$emit('update:visible', false)
      }
    }
  }
</script>

<style lang="scss" scoped>
  .custom-modal {
    background: #fff;
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    z-index: 9999;
    transition: 0.3s;
    overflow-x: hidden;
    overflow-y: auto;
  }

  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
  }
</style>