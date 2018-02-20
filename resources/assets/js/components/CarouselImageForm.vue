<template>
  <ul class="slider-list" id="columns">
    <draggable v-model="images" :options="{group:'people'}" @start="drag=true" @end="updateOrder(images)">
      <li v-for="(image, index) in images"
          :key="index"
          class="slider-list__item column"
          :style="{backgroundImage: `url('storage/sliders/${image.image}')`}"
      >
        <span class="delete" @click="deleteImage(image.id)">X</span>
        {{ image.name }}
      </li>
    </draggable>

    <form enctype="multipart/form-data" novalidate>
      <div class="cp-dropbox">
        <input type="file" accept="image/*" class="input-file" @change="uploadImage($event)">
        <p>Drag your image here to upload</p>
      </div>
    </form>
  </ul>
</template>

<script>
  import { mapActions } from 'vuex'
  import axios from 'axios'
  import draggable from 'vuedraggable'

  export default {
    name: 'image-form',
    props: {
      images: Array,
      resourceUrl: String
    },
    methods: {
      ...mapActions(['addSlider', 'removeSlider', 'updateOrder']),
      uploadImage: function(event) {
        const formData = new FormData();
        formData.append('image', event.target.files[0]);

        axios.post('/sliders', formData).then((response) => {
          this.addSlider(response.data)
        }).catch(e => console.log(e))
      },

      deleteImage: function(id) {
        axios.delete(`/sliders/${id}`).then((response) => {
          this.removeSlider(response.data)
        }).catch(e => console.log(e))
      }
    },
    components: {
      draggable
    }
  }
</script>

<style lang="scss" scoped>
  @import "../../sass/variables";

  .slider-list {
    list-style: none;
    text-align: left;

    .slider-list__item {
      display: inline-block;
      padding: 3px;
      margin: 3px;
      border: solid 1px #ccc;
      width: 180px;
      height: 180px;
      background-size: cover;
      background-repeat: no-repeat;

      .delete {
        font-size: 18px;
        display: inline-block;
        float: right;
        margin: 3px;
        cursor: pointer;
      }
    }
  }

  $dropSize: 240px;
  .cp-dropbox {
    outline: 2px dashed #fff;
    outline-offset: -10px;
    background: $grey;
    padding: 1.6rem;
    height: $dropSize;
    width: 100%;
    position: relative;
    width: 100%;
    border-radius: 0.4rem;
    p {
      position: absolute;
      right: 0;
      bottom: 1.6rem;
      left: 0;
      padding: 0 1.6rem;
      font-size: 1.8em;
      font-weight: 300;
      text-align: center;
      color: #fff;
    }
  }

  .input-file {
    opacity: 0;
    height: $dropSize;
    width: 100%;
  }
</style>