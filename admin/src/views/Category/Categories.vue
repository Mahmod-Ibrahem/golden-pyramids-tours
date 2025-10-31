<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="view_title">Tour Categories</h1>
    <RouterLink :to="{name:'app.categories.create'}"
      class="create_button">
      Add new Categories
    </RouterLink>
  </div>
  <CategoriesTable @click-edit="EditProduct"></CategoriesTable>
</template>
<script setup>
import CategoriesTable from "./CategoriesTable.vue";
</script>

<style scoped></style>
