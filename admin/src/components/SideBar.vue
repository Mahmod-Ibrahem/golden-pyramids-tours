<template>
    <div class="w-[200px]  transition-all bg-indigo-700 text-white py-4 px-2">
        <RouterLink :to="{name:'app.categories'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Categories
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.products'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Tours
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.reviews'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Reviews
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.faqs'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Faqs
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.cities'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
                Blog Cities
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.blogs'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
               Blogs
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.pageTexts'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
               Page Texts
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.youtube-videos'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
               YouTube Videos
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.tourbookings'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
               Bookings
            </span>
        </RouterLink>
        <RouterLink :to="{name:'app.contact-leads'}" class="sidebar_router">
            <span class="mr-2 text-gray-300">
                <ListBulletIcon class="w-5"></ListBulletIcon>
            </span>
            <span class="text-xs">
               Contact Leads
            </span>
        </RouterLink>
    </div>
</template>

<script setup>
import {
    HomeIcon, ListBulletIcon, UsersIcon, ChartBarIcon, DocumentChartBarIcon
} from '@heroicons/vue/24/outline'
import {computed} from 'vue';
import {RouterLink} from 'vue-router';
import store from "../store";

const user = computed(() => store.state.user.data)

</script>


<style scoped></style>
