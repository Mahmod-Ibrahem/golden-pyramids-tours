<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="view_title">Faqs</h1>
    <RouterLink :to="{name:'app.faq.create'}"
      class="create_button">
      Add new Faq
    </RouterLink>
  </div>
  <faq-table></faq-table>
</template>
<script setup>
import FaqTable from "./FaqTable.vue";
</script>

<style scoped></style>
