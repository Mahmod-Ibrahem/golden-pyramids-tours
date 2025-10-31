<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="view_title">Contact Leads</h1>
        <RouterLink :to="{ name: 'app.contact-leads.create' }"
                    class="create_button">
            Add New Lead
        </RouterLink>
    </div>
    <ContactLeadTable/>
</template>

<script setup>
import ContactLeadTable from "./ContactLeadTable.vue";
</script>

<style scoped></style>
