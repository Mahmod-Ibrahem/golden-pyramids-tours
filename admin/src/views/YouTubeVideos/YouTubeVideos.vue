<template>
    <div class="flex items-center justify-between mb-3">
        <h1 class="view_title">YouTube Videos</h1>
        <RouterLink
            :to="{ name: 'app.youtube-videos.create' }"
            class="create_button"
        >
            Add New Video
        </RouterLink>
    </div>

    <YouTubeVideosTable @click-edit="editVideo" />
</template>

<script setup>
import YouTubeVideosTable from "./YouTubeVideosTable.vue";

function editVideo(video) {
    // Handle the editing of a video here (e.g., open a modal or route to edit page)
    console.log("Editing video:", video);
}
</script>

<style scoped></style>
