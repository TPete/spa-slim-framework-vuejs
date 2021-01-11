<template>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ title }}</h5>
        <p class="card-text">{{ description }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MovieDetails",
  props: ["title", "description"]
}
</script>
