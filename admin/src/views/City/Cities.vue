<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="view_title">Blog Cities</h1>
    <RouterLink :to="{name:'app.cities.create'}"
      class="create_button">
      Add new City
    </RouterLink>
  </div>
    <CitiesTable></CitiesTable>
</template>
<script setup>
import CitiesTable from "./CitiesTable.vue";
</script>

<style scoped></style>
