<template>
  <div>
    <h1>Movie List</h1>
    <div class="row">
      <MovieDetails
          v-for="movie in movies"
          :title="movie.title"
          :description="movie.description"
          :key="movie.id"
      />
    </div>
  </div>
</template>

<script>
import MovieDetails from "../components/MovieDetails"
import axios from "axios"
export default {
  name: "MovieList",
  components: {MovieDetails},
  data() {
    return {
      movies: []
    }
  },
  created: function () {
    axios
    .get('/api/movies')
    .then(response => (this.movies = response.data))
  }
}
</script>