<template>
    <div class="managmenet_container">
        <div class="flex flex-col  border-b-2 p-2">
            <div class="flex  justify-between items-center">
                <div class="flex  flex-wrap items-center">
                    <span class="whitespace-nowrap mr-3 font-semibold">Per Page</span>
                    <select @change="getBookings(null)" v-model="perPage"
                            class="appearance-none relative block  px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900
                     rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>

                <input v-model="search" @change="getBookings(null)" class="relative block max-w-[5rem] md:max-w-fit  px-3 py-2 border border-gray-300 placeholder-gray-500
                text-gray-900 rounded-md
                     focus:outline-none
                     focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Search">
            </div>
            <span class="mt-4">Found {{ bookings.total }} Booking</span>
        </div>


        <table class="table_tag">
            <thead>
            <tr>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="id" :sort-field="sortField"
                                  :sort-direction="sortDirection">ID
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="name" :sort-field="sortField"
                                  :sort-direction="sortDirection">Tour Name
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="name" :sort-field="sortField"
                                  :sort-direction="sortDirection">Name
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="email" :sort-field="sortField"
                                  :sort-direction="sortDirection">Email
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="phone" :sort-field="sortField"
                                  :sort-direction="sortDirection">Phone
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="total_price" :sort-field="sortField"
                                  :sort-direction="sortDirection">Total Price
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="start_date" :sort-field="sortField"
                                  :sort-direction="sortDirection">Start Date
                </TableHeadingCell>
                <TableHeadingCell class="border-b-2 p-2 text-left" field="Not Sorted">Actions</TableHeadingCell>
            </tr>
            </thead>
            <tbody v-if="bookings.loading">
            <tr>
                <td colspan="7">
                    <Spinner class="my-4"/>
                </td>
            </tr>
            </tbody>
            <tbody v-else class="table-body">
            <tr v-for="(booking, index) in bookings.data" :key="booking.id">
                <td class="border-b p-2">{{ booking.id }}</td>
                <td class="border-b p-2 max-w-[200px] whitespace-pre-line">{{ booking.tourTitle }}</td>
                <td class="border-b p-2">{{ booking.name }}</td>
                <td class="border-b p-2">{{ booking.email }}</td>
                <td class="border-b p-2">{{ booking.phone }}</td>
                <td class="border-b p-2">{{ booking.totalPrice }}</td>
                <td class="border-b p-2">{{ booking.startDate }}</td>
                <td class="border-b p-2">
                    <Menu as="div" class="relative inline-block text-left">
                        <div>
                            <MenuButton
                                class="inline-flex items-center justify-center rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5">
                                <EllipsisVerticalIcon class="h-5 w-5 text-indigo-500"/>
                            </MenuButton>
                        </div>

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
                                        <RouterLink :to="{ name: 'app.tourbookings.edit', params: { id: booking.id } }"
                                                    :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'group flex w-full items-center rounded-md px-2 py-2 text-sm']">
                                            <PencilIcon class="mr-2 h-5 w-5 text-indigo-400"/>
                                            Edit
                                        </RouterLink>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                        <button @click="deleteBooking(booking)"
                                                :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'group flex w-full items-center rounded-md px-2 py-2 text-sm']">
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
import Spinner from "../../components/core/Spinner.vue";
import TableHeadingCell from "../../components/core/Table/TableHeadingCell.vue";
import {ref, computed, onMounted} from 'vue';
import store from "../../store";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {EllipsisVerticalIcon, PencilIcon, TrashIcon} from '@heroicons/vue/24/outline';
import {RouterLink} from 'vue-router';

const sortField = ref('');
const sortDirection = ref('asc');
const perPage = ref(10)
const search = ref('')
const bookings = computed(() => store.state.bookings);

function getBookings(url = null) {
    store.dispatch('getBookings', {
        url,
        search: search.value,
        perPage: perPage.value,
        sortField: sortField.value,
        sortDirection: sortDirection.value,
    }).catch(err => {
        console.log(err)
        store.bookings.loading = false
    })
}

function deleteBooking(booking) {
    if (!confirm('Are you sure you want to delete this booking?')) return;

    store.dispatch('deleteBooking', booking.id).then(() => {
        store.commit('showToast', 'Booking deleted successfully');
        getBookings();
    });
}


onMounted(() => {
    getBookings();
})
</script>
