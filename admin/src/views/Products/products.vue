<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="view_title">Main Tours (EN)</h1>
    <RouterLink :to="{name:'app.products.create'}"
      class="create_button">
      Add new Tour
    </RouterLink>
  </div>
  <ProductsTable></ProductsTable>
</template>
<script setup>
import ProductsTable from './ProductsTable.vue';
import { ref } from 'vue';
</script>

<style scoped></style>
