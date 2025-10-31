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
                        <option v-for="cat of filterdCategories" :selected="product.category_id===cat.id"
                                :value="cat.id">
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
                             label="Tour Title"/>
                <CustomInput type="textarea" class="mb-2" v-model="product.description" :errors="errors.description"
                             label="Description"/>
                <CustomInput type="textarea" class="mb-2" :errors="errors.itenary_title" v-model="product.itenary_title"
                             label="Itenary Titles"/>
                <Editor v-model="product.itenary_section" editorStyle="height: 320px" placeholder="Itenary Section"
                        :class="{'border border-red-500': errors.itenary_section && errors.itenary_section[0]}"/>
                <span v-if="errors.itenary_section && errors.itenary_section[0]"
                      class="text-red-500 text-sm font-semibold">{{ errors.itenary_section[0] }}</span>
                <CustomInput type="textarea" class="mb-2" :errors="errors.included" v-model="product.included"
                             label="Tour Included"/>
                <CustomInput type="textarea" class="mb-2" :errors="errors.excluded" v-model="product.excluded"
                             label="Tour Excluded"/>

                <CustomInput type="textarea" class="mb-2" v-model="product.places" label="Places"
                             :errors="errors.places"/>


                <div class="flex justify-between mt-2 gap-6">
                    <div class="w-[49%] flex flex-col">
                        <CustomInput class="mb-2" v-model="product.duration" label="Tour Duration"
                                     :errors="errors.duration"/>
                        <CustomInput class="mb-2" v-model="product.locations" label="Locations"
                                     :errors="errors.locations"/>
                        <CustomInput type="number" class="mb-2" v-model="product.price_per_person"
                                     label="Price Per Person" s
                                     :errors="errors.price_per_person"
                                     prepend="$"/>
                        <CustomInput type="number" class="mb-2" v-model="product.price_two_five" label="Price From 2-5"
                                     :errors="errors.price_two_five"
                                     prepend="$"/>
                        <CustomInput type="number" class="mb-2" v-model="product.price_six_twenty"
                                     label="price From 6-20"
                                     :errors="errors.price_six_twenty"
                                     prepend="$"/>
                        <!-- Product Image -->
                        <CustomInput type="file" class="mb-2 bg-white" label="Product Image"
                                     @change="file => handleFileChange(file)" :error="errors.image"/>

                        <label
                            for="product-images"
                            class="w-full inline-flex rounded-md border border-gray-300 shadow-sm px-4 py-3 bg-white
               font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2
               focus:ring-offset-2 focus:ring-indigo-500 text-xs cursor-pointer"
                        >
                            Choose Product Images
                        </label>
                        <input
                            id="product-images"
                            type="file"
                            class="hidden"
                            accept="image/*"
                            multiple
                            @change="handleProductImages"
                        />
                        <p v-if="errors.product_images" class="text-red-500 text-xs font-semibold mb-2">
                            {{ errors.product_images }}
                        </p>
                    </div>

                    <div class="flex flex-col gap-1 items-center justify-center flex-wrap flex-shrink-0 w-[49%]  ">
                        <img
                            v-if="imagePreview"
                            :src="imagePreview"
                            alt="Image Preview"
                            class=" object-fit border rounded-md h-96 "
                        />
                        <div
                            class="flex flex-wrap gap-1"
                        >
                            <div class="relative group" v-for="(image, index) in productImagesPreview" :key="image.key">
                                <img
                                    @click="removeProductImage(index)"
                                    class="w-16 h-16 object-cover cursor-pointer transition-colors hover:brightness-75 flex-shrink-0"
                                    :src="image.path"
                                    :alt="product.title"
                                />
                                <div
                                    @click="removeProductImage(index)"
                                    class="absolute inset-0 bg-red-600 opacity-0 group-hover:opacity-50 transition-opacity cursor-pointer"
                                ></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button"
                        @click="onSubmit($event,true)"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
                    Save
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
import {MultiSelect} from "primevue";

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
    tour_images: [],
    locations: '',
    itenary_section: '',
    itenary_title: '',
    price_per_person: '',
    price_two_five: '',
    price_six_twenty: '',
    deleted_images_ids: [],
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
const imagePreview = ref(null)
const productImagesPreview = ref([])

function handleProductImages(event) {
    const filesArray = Array.from(event.target.files);
    filesArray.forEach(file => {
        productImagesPreview.value.push({
            type: 'file',
            path: URL.createObjectURL(file)
        })
    })
    product.value.tour_images.push(...filesArray); // Convert FileList to an array
}

function removeProductImage(index) {
    const image = productImagesPreview.value[index];
    if (productImagesPreview.value[index].type === 'db') {
        (product.value.deleted_images_ids ??= []).push(image.id)
    }
    productImagesPreview.value.splice(index, 1);
}

function handleFileChange(image) {
    const file = image
    if (file) {
        product.value.tour_cover = file
        imagePreview.value = URL.createObjectURL(file)
    }
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
                    router.push({name: 'app.products'});
                } else if (action === 'createProduct') {
                    router.push({name: 'app.products.edit', params: {id: response.data.id}});
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
            store.dispatch('getProduct', {productId: route.params.id, locale: 'en'}).then( productResponse => {
                product.value = productResponse.data
                productImagesPreview.value = product.value.tour_images.map(image => ({
                    type: 'db',
                    id: image.id,
                    path: image.path
                }))
                imagePreview.value = product.value.tour_cover
                product.value.tour_images = []
                product.value.tour_cover = ''
            }).finally(() => {
            loading.value = false
        })
    }
})
</script>
<style scoped>
::v-deep(.ql-editor a) {
    text-decoration: none !important;
}
</style>
