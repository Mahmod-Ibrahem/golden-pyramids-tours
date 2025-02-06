<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ product.id ? `Update Tour: ${product.title}` : 'Create New Tour' }}
        </h1>
    </div>
    <div class="">
        <Spinner v-if="loading"
                 class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <!-- Tour Groups -->
                <div class=" mb-2">
                <select name="type" v-model="product.group"
                        class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                        :class="{ 'border-red-500': errors.group && errors.group[0]}">
                    <option value="" disabled selected>Select Tour Group</option>
                    <option value="DayTours">Day Tours</option>
                    <option value="TourPackages">Tour Packages</option>
                </select>
                <p class="text-red-500 text-sm font-semibold" v-if="errors.group && errors.group[0] ">{{
                        errors.group[0]
                    }}</p>
                </div>
                <!-- Categories Types Depending on Tour Group -->
                <div class=" mb-2">
                <select v-if="product.group==='DayTours' || product.group==='TourPackages'"
                        name="type" v-model="product.category_id"
                        class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                        :class="{ 'border-red-500': errors.category_id && errors.category_id[0]}">
                    <option value="">Select Category</option>
                    <option v-for="cat of filterdCategories" :selected="product.category_id===cat.id" :value="cat.id">
                        {{ cat.name }}
                    </option>
                </select>
                <p class="text-red-500 text-sm font-semibold px-3 mb-2"
                   v-if="errors.category_id && errors.category_id[0]">{{ errors.category_id[0] }}</p>
                </div>

                <!-- Tour Preference -->

                <select name="type" v-model="product.preference"
                        class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500  rounded-md"
                        :class="{ 'border-red-500': errors.preference && errors.preference[0]}">
                    <option value="" selected>Select Tour Preference (Optional)</option>
                    <option value="recommended">Recommended</option>
                    <option value="limited_offers">Limited offers</option>
                </select>

                <p class="text-red-500 text-sm font-semibold px-3 mb-2"
                   v-if="errors.preference && errors.preference[0]">{{ errors.preference[0] }}</p>


                <CustomInput class="mb-2" v-model="product.title" :errors="errors.title"
                             label="Tour Title يستحسن يكون اكتر من 45 حرف "/>
                <p v-if="product.title"
                   class="text-xs font-semibold"
                   :class="{
       'text-green-600': product.title?.length > 45 && product.title?.length <= 80,
       'text-red-600': product.title?.length > 80
   }">
                    Character Length: {{ product.title?.length }}
                </p>
                <CustomInput type="textarea" class="mb-2" v-model="product.description" :errors="errors.description"
                             label="Description يستحسن ميكونش اقل من 230 حرف"/>
                <p v-if="product.description" class="text-xs font-semibold text-Primary"
                   :class="{ 'text-green-600' : product.description?.length>=230 && product.description?.length <= 280, 'text-red-600' : product.description?.length > 280 }">
                    Character Length :
                    {{ product.description?.length }}</p>

                <CustomInput type="textarea" class="mb-2" :errors="errors.included" v-model="product.included"
                             label="Tour Included"/>
                <CustomInput type="textarea" class="mb-2" :errors="errors.excluded" v-model="product.excluded"
                             label="Tour Excluded"/>
                <CustomInput type="textarea" class="mb-2" :errors="errors.itenary_title" v-model="product.itenary_title"
                             label="Itenary Titles (2fsl ben kol title we al tany b sla4 /"/>
<!--                <CustomInput type="textarea" class="mb-2" v-model="product.itenary_section"-->
<!--                             :errors="errors.itenary_section"-->
<!--                             label="Itenary description  (2fsl ben kol description we al tany b sla4 /"/>-->
                <Editor v-model="product.itenary_section" editorStyle="height: 320px" />
                <CustomInput type="textarea" class="mb-2" v-model="product.places" label="Places"
                             :errors="errors.places"/>
                <CustomInput class="mb-2" v-model="product.duration" label="Tour Duration" :errors="errors.duration"/>

                <CustomInput class="mb-2" type="textarea" v-model="product.locations"
                             label="Tour Location (2fsl ben kol location we al tany b sla4 /"
                             :errors="errors.locations"/>
                <!-- Tour Cover -->
                <CustomInput type="file" class="mb-2" label="Product Image" :errors="errors.tour_cover"
                             @change="file => product.tour_cover = file"/>

                <!-- Tour Images -->

                <label v-if="!product.id"
                       for="TourImages"
                       class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 "
                       :class="{ 'border-red-500': errors.tour_images && errors.tour_images[0]}">
                    <span class="flex flex-col items-center justify-center py-1">
                        <svg class="w-8 h-8 mb-1 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <span class="mb-2 text-sm text-gray-500 ">Upload Tour Images</span>
                    </span>
                    <input id="TourImages" type="file" class="hidden" @change="handleFiles" multiple/>
                </label>
                <p class="text-red-500 text-sm font-semibold mb-2" v-if="errors.tour_images && errors.tour_images[0]">
                    {{ errors.tour_images[0] }}</p>

                <!--                <CustomInput type="file" class="hidden" label="Product Image" @change="file => product.tour_cover = file"/>-->
                <CustomInput type="number" class="mb-2" v-model="product.price_per_person" label="Price Per Person"
                             :errors="errors.price_per_person"
                             prepend="$"/>
                <CustomInput type="number" class="mb-2" v-model="product.price_two_five" label="Price From 2-5"
                             :errors="errors.price_two_five"
                             prepend="$"/>
                <CustomInput type="number" class="mb-2" v-model="product.price_six_twenty" label="price From 6-20"
                             :errors="errors.price_six_twenty"
                             prepend="$"/>
                <!--                <CustomInput type="checkbox" class="mb-2" v-model="product.published" label="Published"/>-->
            </div>
            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                    Save
                </button>
                <button type="button"
                        @click="onSubmit($event,true)"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                    Save & Close
                </button>
                <RouterLink :to="{ name: 'app.products' }" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </RouterLink>
            </footer>
        </form>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import {ref, onMounted, computed} from 'vue'
import {useRoute, useRouter} from "vue-router";
import store from "../../store/index.js"
import CustomInput from '../../components/Core/CustomInput.vue';
import Editor from 'primevue/editor';
const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const product = ref({
    id: null,
    group: '',
    category_id: '',
    preference: '',
    title: '',
    description: '',
    included: '',
    excluded: '',
    places: '',
    duration: '',
    tour_cover: '',
    tour_images: '',
    locations: '',
    itenary_section: '',
    itenary_title: '',
    price_per_person: '',
    price_two_five: '',
    price_six_twenty: '',
    // published: false
})
const errors = ref({
    title: [],
    description: [],
    group: [],
    category_id: [],
    preference: [],
    included: [],
    excluded: [],
    places: [],
    duration: [],
    tour_cover: [],
    tour_images: [],
    locations: [],
    itenary_section: [],
    itenary_title: [],
    price_per_person: [],
    price_two_five: [],
    price_six_twenty: [],
})
const categories = computed(() => store.state.categories.data)
const filterdCategories = computed(() => {
    return product.value.group ? categories.value.filter(cat => cat.type === product.value.group) : []
})

/* 2ol mra byrender byst5m al get method 34an ya5od al value mn al parent y assignha ll show we lma ay t8ir y7sl  t8ir fi al show by7sl emit event
34an  y notify al parent b al new value di */

function handleFiles(event) {
    const files = event.target.files;
    product.value.tour_images = Array.from(files); // Convert FileList to an array
}

function onSubmit($event, close = false) {
    loading.value = true;
    const action = product.value.id ? 'updateProduct' : 'createProduct';
    const successStatus = action === 'updateProduct' ? 200 : 201;
    const successMessage = action === 'updateProduct' ? 'Product has successfully updated' : 'Product has successfully created';

    store.dispatch(action, product.value)
        .then(response => {
            loading.value = false;
            if (response.status === successStatus) {
                store.commit('showToast', successMessage);
                store.dispatch('getProducts');
                if (close) {
                    router.push({ name: 'app.products' });
                } else if (action === 'createProduct') {
                    router.push({ name: 'app.products.edit', params: { id: response.data.id } });
                }
            }
        })
        .catch(err => {
            loading.value = false;
            if (err.response.status === 422) {
                errors.value = err.response.data.errors;
            } else if (err.response.status === 409) {
                store.commit('showErrorToast', err.response.data.message);
            }
        });
}
onMounted(() => {
    if (route.params.id) {
        loading.value = true
        store.dispatch('getProduct', {productId:route.params.id,locale:'en'})
            .then((response) => {
                loading.value = false;
                product.value = response.data
            })
    }
})
</script>
<style scoped>
::v-deep(.ql-editor a) {
    text-decoration: none !important;
}
</style>
