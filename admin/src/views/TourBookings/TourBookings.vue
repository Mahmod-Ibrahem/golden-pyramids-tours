<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="view_title">Tour Bookings</h1>
        <RouterLink :to="{ name: 'app.tourbookings.create' }"
                    class="create_button">
            Add New Booking
        </RouterLink>
    </div>
    <TourBookingTable/>
</template>

<script setup>
import TourBookingTable from "../TourBookings/TourBookingTable.vue";
</script>

<style scoped></style>
