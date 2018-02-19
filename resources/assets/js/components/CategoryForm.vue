<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div v-if="success" class="alert alert-success" role="alert">
          Category created!
          <span class="close" @click="success = false">X</span>
        </div>
      </div>
    </div>
    <form @submit.prevent="addCategory()">
      <div class="row">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-6">
            <input v-model="name" type="text" class="form-control" placeholder="Enter a Category Name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-6">
            <input v-model="description" type="text" class="form-control" placeholder="Enter a Category Description">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-6 offset-sm-2">
            <button class="btn btn-admin" type="submit">Create Category</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  import { mapActions } from 'vuex'
  export default {
    name: 'category-form',
    data() {
      return {
        name: null,
        description: null,
        success: false
      }
    },
    methods: {
      ...mapActions(['setCategories']),
      addCategory() {
        axios.post('/categories', { name: this.name, description: this.description })
          .then(response => {
            this.name = null
            this.description = null
            this.success = true
            this.setCategories(response.data)
          }).catch((e) => console.log(e))
      }
    }
  }
</script>