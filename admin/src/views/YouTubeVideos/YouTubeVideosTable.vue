<template>
    <div class="managmenet_container">
        <div class="flex flex-col border-b-2 p-2">
        </div>
        <table class="table_tag">
            <thead>
            <tr>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="id"
                                  :sort-field="sortField" :sort-direction="sortDirection">
                    ID
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="embed"
                                  :sort-field="sortField" :sort-direction="sortDirection">
                    Embed Code
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="Not Sorted">
                    Actions
                </TableHeadingCell>
            </tr>
            </thead>
            <tbody v-if="youtubeVideos.loading">
            <tr>
                <td colspan="3">
                    <Spinner class="my-4"/>
                </td>
            </tr>
            </tbody>
            <tbody v-else class="table-body">
            <tr v-for="(video, index) in youtubeVideos.data" :key="video.id">
                <td class="border-b p-2">{{ video.id }}</td>
                <td class="border-b p-2">
                    <iframe width="100" height="70" :src="video.embed" frameborder="0" allowfullscreen></iframe>
                </td>
                <td class="border-b p-2">
                    <Menu as="div" class="relative inline-block text-left">
                        <MenuButton
                            class="inline-flex items-center justify-center rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5">
                            <EllipsisVerticalIcon class="h-5 w-5 text-indigo-500"/>
                        </MenuButton>
                        <transition enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0">
                            <MenuItems
                                class="absolute z-10 right-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                                <div class="px-1 py-1">
                                    <MenuItem v-slot="{ active }">
                                        <RouterLink :to="{ name: 'app.youtube-videos.edit', params: { id: video.id } }"
                                                    :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                            'group flex w-full items-center rounded-md px-2 py-2 text-sm']">
                                            <PencilIcon class="mr-2 h-5 w-5 text-indigo-400"/>
                                            Edit
                                        </RouterLink>
                                    </MenuItem>
                                    <!-- Uncomment to enable delete -->
                                    <MenuItem v-slot="{ active }">
                                        <button :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                        'group flex w-full items-center rounded-md px-2 py-2 text-sm']"
                                                @click="deleteVideo(video)">
                                            <TrashIcon class="mr-2 h-5 w-5 text-indigo-400"/>
                                            Delete
                                        </button>
                                    </MenuItem>
                                </div>
                            </MenuItems>
                        </transition>
                    </Menu>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import Spinner from "../../components/Core/Spinner.vue";
import TableHeadingCell from "../../components/Core/Table/TableHeadingCell.vue";
import {ref, computed, onMounted} from 'vue';
import store from "../../store";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {EllipsisVerticalIcon, PencilIcon, TrashIcon} from '@heroicons/vue/24/outline';
import {RouterLink} from "vue-router";
const youtubeVideos = computed(() => store.state.videos);

function getYoutubeVideos(url = null) {
    store.dispatch('getVideos')
}


function deleteVideo(video) {
    if (!confirm('Are you sure you want to delete this video?')) return;
    store.dispatch('deleteVideo', video.id).then(() => {
        store.commit('showToast', 'Video Deleted Successfully');
        getYoutubeVideos();
    });
}

onMounted(() => {
    getYoutubeVideos();
});
</script>
