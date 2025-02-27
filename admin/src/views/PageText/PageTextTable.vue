<template>
    <div class="managmenet_container">
        <table class="table_tag">
            <thead>
            <tr>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left " field="id">
                    ID
                </TableHeadingCell>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left" field="type">
                    Type
                </TableHeadingCell>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left" field="content">

                    Content
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="action">
                    Action
                </TableHeadingCell>

            </tr>
            </thead>
            <tbody v-if="pageTextloading">
            <tr>
                <td colspan="5">
                    <Spinner class="my-4"></Spinner>

                </td>
            </tr>
            </tbody>
            <tbody v-else class="table-body">
            <tr v-for="(pageText, index) of pageTexts.data">
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{
                        pageText.id
                    }}
                </td>

                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">{{
                        pageText.type
                    }}
                </td>
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                    {{ pageText.content.replace(/<\/?[^>]+(>|$)/g, "") }}
                </td>
                <td class="border-b p-2 ">
                    <Menu as="div" class="relative inline-block text-left">
                        <div>
                            <MenuButton
                                class="inline-flex items-center justify-center  rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5 focus:bg-opacity-5 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">
                                <EllipsisVerticalIcon class="h-5 w-5 text-indigo-500" aria-hidden="true"/>
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
                                        <RouterLink
                                            :to="{ name: 'app.pageTexts.createTranslation', params: { id: pageText.id } }"
                                            :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]">
                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                        aria-hidden="true"/>
                                            Translate pageText
                                        </RouterLink>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <RouterLink :to="{ name: 'app.pageTexts.edit', params: { id: pageText.id } }"
                                                    :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]">
                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                        aria-hidden="true"/>
                                            Edit
                                        </RouterLink>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <button :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]" @click="deletePageText(pageText.id)">
                                            <TrashIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                       aria-hidden="true"/>
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

const pageTexts = computed(() => {
    return store.state.pageTexts
})
const pageTextloading = ref('true')


function getPageTexts(url = null) {
    pageTextloading.value = true
    store.dispatch('getPageTexts').then(() => {
        pageTextloading.value = false
    })
}

function getForPage(ev, link) {
    if (!link.url || link.active) {
        return
    }
    getPageTexts(link.url)
}

function sortProduct(field) {
    if (field === sortField.value) {
        if (sortDirection.value === 'desc') {
            sortDirection.value = 'asc'
        } else {
            sortDirection.value = 'desc'
        }
    } else {
        sortField.value = field;
        sortDirection.value = 'asc'
    }

    getPageTexts()
}


function deletePageText(id) {
    if (!confirm('Are You Sure you want to delete the Text ? ')) {
        return
    }
    store.dispatch('deletePageText', id)
        .then(res => {
            store.commit('showToast', 'Text Deleted Successfully')
            store.dispatch('getPageTexts')
        })
}

onMounted(() => {

    getPageTexts()

})

</script>
