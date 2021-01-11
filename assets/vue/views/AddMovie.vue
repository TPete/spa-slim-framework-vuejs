<template>
  <div>
    <h1>Add Movie</h1>
    <div v-if="saved" class="alert alert-success" role="alert">
      Movie saved
    </div>
    <div class="form-group">
      <label for="title">
        Title
      </label>
      <input type="text" class="form-control" id="title" v-model="title" @input="saved = false"/>
    </div>
    <div class="form-group">
      <label for="description">
        Description
      </label>
      <input type="text" class="form-control" id="description" v-model="description" @input="saved = false"/>
    </div>
    <button class="btn btn-primary" @click="submit">
      Submit
    </button>
  </div>
</template>

<script>
import axios from "axios"

export default {
  name: "AddMovie",
  data() {
    return {
      title: null,
      description: null,
      saved: false
    }
  },
  methods: {
    submit() {
      this.saved = false
      if (this.title && this.description) {
        axios
            .post('api/movies', {
              title: this.title,
              description: this.description
            })
            .then(() => {
              this.saved = true
              this.title = null
              this.description = null
            })
      }
    }
  }
}
</script>
