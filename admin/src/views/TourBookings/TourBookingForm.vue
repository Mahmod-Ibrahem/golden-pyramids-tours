<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ booking.id ? `Update Booking: "${booking.name}"` : 'Create New Booking' }}
        </h1>
    </div>
    <div>
        <Spinner v-if="loading"
                 class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4 space-y-3">
                <CustomInput prepend="Name" v-model="booking.name" label="Full Name" :errors="errors.name"
                             class="mb-2"/>
                <CustomInput prepend="Email" v-model="booking.email" label="Email" :errors="errors.email" class="mb-2"/>
                <CustomInput prepend="Phone" v-model="booking.phone" label="Phone" :errors="errors.phone" class="mb-2"/>
                <CustomInput prepend="Nationality" v-model="booking.nationality" label="Nationality"
                             :errors="errors.nationality" class="mb-2"/>
                <CustomInput prepend="Adults" type="number" v-model="booking.adult" label="Number of Adults"
                             :errors="errors.adult" class="mb-2"/>
                <CustomInput prepend="Chil_U_12" type="number" v-model="booking.children_under_12"
                             label="Children under 12" :errors="errors.children_under_12" class="mb-2"/>
                <CustomInput prepend="Chil_U_6" type="number" v-model="booking.children_under_6"
                             label="Children under 6" :errors="errors.children_under_6" class="mb-2"/>
                <CustomInput prepend="Price/Adult" append="$" type="number" v-model="booking.price_per_adult_person"
                             label="Price per Adult" :errors="errors.price_per_adult_person" class="mb-2"/>
                <CustomInput prepend="Price/Child12" append="$" type="number" v-model="booking.price_per_child_under_12"
                             label="Price per Child under 12" :errors="errors.price_per_child_under_12" class="mb-2"/>
                <CustomInput prepend="Price/Child6" append="$" type="number" v-model="booking.price_per_child_under_6"
                             label="Price per Child under 6" :errors="errors.price_per_child_under_6" class="mb-2"/>
                <CustomInput prepend="Total Price" append="$" type="number" v-model="booking.total_price"
                             label="Total Price" :errors="errors.total_price" class="mb-2"/>
                <CustomInput prepend="Start Date" type="date" v-model="booking.start_date" label="Start Date"
                             :errors="errors.start_date" class="mb-2"/>
            </div>

            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit"
                        @click="onSubmit($event, true)"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                    Save
                </button>
                <RouterLink :to="{ name: 'app.tourbookings' }" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </RouterLink>
            </footer>
        </form>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import CustomInput from '../../components/Core/CustomInput.vue'
import {ref, onMounted} from 'vue'
import {useRoute, useRouter} from "vue-router"
import store from "../../store/index.js"

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const booking = ref({
    id: null,
    tour_id: '',
    name: '',
    email: '',
    phone: '',
    nationality: '',
    adult: 0,
    children_under_12: 0,
    children_under_6: 0,
    price_per_adult_person: 0,
    price_per_child_under_12: 0,
    price_per_child_under_6: 0,
    total_price: 0,
    start_date: ''
})

const errors = ref({})

function onSubmit($event, close = false) {
    loading.value = true;
    errors.value = {}

    const action = booking.value.id ? 'updateBooking' : 'createBooking'
    const successStatus = booking.value.id ? 200 : 201
    const successMessage = booking.value.id ? 'Booking has been successfully updated' : 'Booking has been successfully created'

    store.dispatch(action, booking.value)
        .then(response => {
            loading.value = false
            if (response.status === successStatus) {
                store.commit('showToast', successMessage)
                store.dispatch('getBookings')
                if (close) {
                    router.push({name: 'app.tourbookings'})
                } else if (!booking.value.id) {
                    booking.value = response.data
                    router.push({name: 'app.tourbookings.edit', params: {id: response.data.id}})
                }
            }
        })
        .catch(err => {
            loading.value = false
            if (err.response.status === 422) {
                errors.value = err.response.data.errors
            } else if (err.response.status === 409) {
                store.commit('showErrorToast', err.response.data.message)
            } else {
                store.commit('showErrorToast', 'An error occurred while submitting the form.')
            }
        })
}

onMounted(() => {
    if (route.params.id) {
        loading.value = true
        store.dispatch('getBooking', route.params.id)
            .then(response => {
                loading.value = false
                booking.value = response.data
            })
    }
})
</script>
