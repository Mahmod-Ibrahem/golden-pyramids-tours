<template>
    <div class="managmenet_container">
        <div class="flex flex-col  border-b-2 p-2">
        </div>
        <table class="table_tag ">
            <thead>
            <tr>
                <TableHeadingCell  class="border-b-2 p-2 text-left " field="Id"
                                  >
                    ID
                </TableHeadingCell>

                <TableHeadingCell  class="border-b-2 p-2 text-left" field="quantity"
                                  >

                    Title
                </TableHeadingCell>
                <TableHeadingCell  class="border-b-2 p-2 text-left" field="price"
                                  >
                    Image
                </TableHeadingCell>

                <TableHeadingCell class="border-b-2 p-2 text-left" field="Not Sorted">
                    Actions
                </TableHeadingCell>
            </tr>
            </thead>
            <tbody v-if="loading">
            <tr>
                <td colspan="5">
                    <Spinner class="my-4"></Spinner>

                </td>
            </tr>
            </tbody>
            <tbody v-else class="table-body">
            <tr v-for="(blog, index) of blogs.data">
                <td class="border-b p-2 ">{{ blog.id }}</td>
                <td class="border-b p-2">
                    {{ blog.title }}
                </td>
                 <td class="border-b p-2 ">
                    <img class="w-16 h-16 object-cover" :src="blog.image_url" :alt="blog.title">
                </td>

                <td class="border-b p-2 ">
                    <Menu as="div" class="relative inline-block text-left">
                        <div>
                            <MenuButton
                                class="inline-flex items-center justify-center  rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5 focus:bg-opacity-5 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
                                <EllipsisVerticalIcon class="h-5 w-5 text-indigo-500" aria-hidden="true" />
                            </MenuButton>
                        </div>

                        <transition enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0">
                            <MenuItems
                                class="absolute z-10 right-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="px-1 py-1">
                                    <MenuItem v-slot="{ active }">
                                        <RouterLink :to="{ name: 'app.blogs.createTranslation', params: { id: blog.id } }" :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]">
                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                        aria-hidden="true" />
                                            Translate Blog
                                        </RouterLink>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <RouterLink :to="{ name: 'app.blogs.edit', params: { id: blog.id } }" :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]">
                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                        aria-hidden="true" />
                                            Edit
                                        </RouterLink>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <button :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]" @click="deleteBlog(blog.id)">
                                            <TrashIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                       aria-hidden="true" />
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
import {EllipsisVerticalIcon, PencilIcon, TrashIcon} from '@heroicons/vue/24/outline'
import {RouterLink} from "vue-router";


const emit = defineEmits(['clickEdit'])

const blogs = computed(() => {
    return store.state.blogs
})
const loading = computed(() => store.state.blogs.loading)


function getBlogs() {
    store.dispatch('getBlogs')
}

function deleteBlog(blogId) {
    if (!confirm('Are You Sure you want to delete the blog ? ')) {
        return
    }

    store.dispatch('deleteBlog', blogId)
        .then(res => {
            store.commit('showToast', 'Blog Deleted Successfully')
            store.dispatch('getBlogs')
        })
}

onMounted(() => {

    getBlogs()

})

</script>
