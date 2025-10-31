<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="view_title">Reviews</h1>
    <RouterLink :to="{name:'app.reviews.create'}"
      class="create_button">
      Add new Review
    </RouterLink>
  </div>
  <ProductsTable></ProductsTable>
</template>
<script setup>
import ProductsTable from './ReviewsTable.vue';
</script>

<style scoped></style>
