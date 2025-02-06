<template>
    <div class="managmenet_container">
        <div class="flex flex-col  border-b-2 p-2">
            <div class="flex  justify-between items-center">
                <div class="flex  flex-wrap items-center">
                    <span class="whitespace-nowrap mr-3 font-semibold">Per Page</span>
                    <select @change="getProducts(null)" v-model="perPage"
                            class="appearance-none relative block  px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900
                     rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>

                <input v-model="search" @change="getProducts(null)" class="relative block max-w-[5rem] md:max-w-fit  px-3 py-2 border border-gray-300 placeholder-gray-500
                text-gray-900 rounded-md
                     focus:outline-none
                     focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Search">
            </div>
            <span class="mt-4">Found {{ products.total }} products</span>
        </div>
        <table class="table_tag">
            <thead>
            <tr>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left " field="Id"
                                  :sort-field="sortField" :sort-direction="sortDirection">
                    ID
                </TableHeadingCell>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left" field="group"
                                  :sort-field="sortField" :sort-direction="sortDirection">

                    Group
                </TableHeadingCell>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left" field="Category"
                                  :sort-field="sortField" :sort-direction="sortDirection">

                    Category
                </TableHeadingCell>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left" field="Preference"
                                  :sort-field="sortField" :sort-direction="sortDirection">

                    Preference
                </TableHeadingCell>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left" field="title"
                                  :sort-field="sortField" :sort-direction="sortDirection">

                    Title
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="Tour Cover"
                                  :sort-field="sortField" :sort-direction="sortDirection">

                    Tour Cover
                </TableHeadingCell>
                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left" field="price"
                                  :sort-field="sortField" :sort-direction="sortDirection">
                    Price
                </TableHeadingCell>


                <TableHeadingCell @click="sortProduct" class="border-b-2 p-2 text-left" field="duration"
                                  :sort-field="sortField" :sort-direction="sortDirection">

                    Duration
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="Not Sorted">
                    Actions
                </TableHeadingCell>
            </tr>
            </thead>
            <tbody v-if="productloading">
            <tr>
                <td colspan="8">
                    <Spinner class="my-4"></Spinner>

                </td>
            </tr>
            </tbody>
            <tbody v-else class="table-body">
            <tr v-for="(product, index) of products.data">
                <td class="border-b p-2 ">{{ product.id }}</td>
                <td class="border-b p-2 ">{{ product.group }}</td>

                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis ">
                    {{ product.category?.category_translations[0]?.name ||  product.group }}
                </td>
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis ">
                    {{ product.preference ?? 'Not Exist' }}
                </td>
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis ">
                    {{ product.tour_translations[0].title }}
                </td>
                <td class="border-b p-2">
                    <img class="w-16 h-16 object-cover" :src="product.tour_cover" :alt="product.title">
                </td>
                <td class="border-b p-2  ">
                    ({{ product.price_per_person }},{{ product.price_two_five }},{{ product.price_six_twenty }})$
                </td>                <td class="border-b p-2  ">
                {{product.tour_translations[0].duration }}
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
                                        <RouterLink :to="{ name: 'app.products.edit', params: { id: product.id } }"
                                                    :class="[
                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                            ]">
                                            <PencilIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                        aria-hidden="true"/>
                                            Edit
                                        </RouterLink>
                                    </MenuItem>
                                    <MenuItem  v-slot="{ active }">
                                        <RouterLink :to="{name:'app.products.view',params:{id:product.id}}" :class="[
                                            active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                                            'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                                        ]" >
                                            <ChevronDoubleRightIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"
                                                                    aria-hidden="true" />
                                            Tour Images
                                        </RouterLink>
                                    </MenuItem>
<!--                                    <MenuItem v-slot="{ active }">-->
<!--                                        <button :class="[-->
<!--                                                active ? 'bg-indigo-600 text-white' : 'text-gray-900',-->
<!--                                                'group flex w-full items-center rounded-md px-2 py-2 text-sm',-->
<!--                                            ]" @click="deleteProduct(product)">-->
<!--                                            <TrashIcon :active="active" class="mr-2 h-5 w-5 text-indigo-400"-->
<!--                                                       aria-hidden="true"/>-->
<!--                                            Delete-->
<!--                                        </button>-->
<!--                                    </MenuItem>-->
                                </div>
                            </MenuItems>
                        </transition>
                    </Menu>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-if="!products.loading" class="justify-between items-center mt-5 md:flex p-3">
            <span>Showing From {{ products.from }} to {{ products.to }}</span>
            <nav v-if="products.total > products.limit"
                 class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px md:flex "
                 aria-label="pagination">
                <a v-for="(link, i) of products.links" :key="i" :disabled="!link.url" href="#"
                   @click.prevent="getForPage($event, link)" aria-current="page"
                   class="relative  items-center px-4 py-2 border text-sm font-medium whitespace-nowrap" :class="[
                        link.active
                            ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                            : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
                        i === 0 ? 'rounded-l-md' : '',
                        i === products.links.length - 1 ? 'rounded-r-md' : '',
                        !link.url ? ' bg-gray-100 text-gray-700' : ''
                    ]" v-html="link.label">
                </a>
            </nav>
        </div>
    </div>
</template>

<script setup>
import Spinner from "../../components/Core/Spinner.vue";
import TableHeadingCell from "../../components/Core/Table/TableHeadingCell.vue";
import {ref, computed, onMounted} from 'vue';
import store from "../../store";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {EllipsisVerticalIcon, PencilIcon, TrashIcon,ChevronDoubleRightIcon} from '@heroicons/vue/24/outline'
import {RouterLink} from "vue-router";


const emit = defineEmits(['clickEdit'])

const perPage = ref(10)

const search = ref('')

const sortField = ref('')
const sortDirection = ref('asc')
const products = computed(() => {
    return store.state.products
})
const productloading = ref('true')


function getProducts(url = null) {
    productloading.value=true
    store.dispatch('getProducts', {
        url,
        search: search.value,
        perPage: perPage.value,
        sortField: sortField.value,
        sortDirection: sortDirection.value,
        locale: 'en'
    }).then(() => {
        productloading.value = false
    })
}

function getForPage(ev, link) {
    if (!link.url || link.active) {
        return
    }
    getProducts(link.url)
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

    getProducts()
}

function editProduct(product) {
    emit('clickEdit', product)
}

// function deleteProduct(product) {
//     if (!confirm('Are You Sure you want to delete the product ? ')) {
//         return
//     }
//     store.dispatch('deleteProduct', product.id)
//         .then(res => {
//             store.commit('showToast', 'Product Deleted Successfully')
//             store.dispatch('getProducts')
//         })
// }

onMounted(() => {

    getProducts()

})

</script>
