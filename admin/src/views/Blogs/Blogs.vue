<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="view_title">Blogs</h1>
    <RouterLink :to="{name:'app.blogs.create'}"
      class="create_button">
      Add new Blog
    </RouterLink>
  </div>
    <BlogsTable></BlogsTable>
</template>
<script setup>
import BlogsTable from "./BlogsTable.vue";
</script>

<style scoped></style>
