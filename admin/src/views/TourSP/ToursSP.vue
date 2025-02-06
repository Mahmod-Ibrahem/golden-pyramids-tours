<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="text-3xl font-semibold">Tours (SP)</h1>
    <RouterLink :to="{name:'app.tours.de.create'}"
      class="py-2 px-4 border border-transparent text-sm font-medium
      rounded-md text-white bg-indigo-600 hover:bg-indigo-700
      focus:outline-none focus:ring-2 focus:ring-offset-2
      focus:ring-indigo-500">
      Translate Tour
    </RouterLink>
  </div>
  <ProductsTable></ProductsTable>
</template>
<script setup>
import ProductsTable from './ToursTableSP.vue';
import ProductModel from "./ToursModelSP.vue"
import { ref } from 'vue';
import store from '../../store';
const showModal = ref(false)



</script>

<style scoped></style>
