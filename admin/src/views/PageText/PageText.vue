<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="view_title">Page Texts</h1>
        <RouterLink :to="{name:'app.pageTexts.create'}"
                    class="create_button">
            Add new Text
        </RouterLink>
    </div>
    <PageTextTable></PageTextTable>
</template>
<script setup>
import PageTextTable from "./PageTextTable.vue";
</script>

<style scoped></style>
