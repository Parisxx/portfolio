<script setup>
</script>

<template>
  <section class="portfolio">
    <h2>Portfolio</h2>
    <div class="projects">
      <div class="project">Portfolio Website</div>
      <div class="project">BSS Graph</div>
      <div class="project">Lawnstation</div>
    </div>
  </section>
</template>

<style scoped>
.portfolio {
  text-align: center;
  padding: 20px;
}
.projects {
  display: flex;
  justify-content: center;
  gap: 10px;
}
.project {
  background: gray;
  padding: 10px;
  border-radius: 5px;
}
</style>