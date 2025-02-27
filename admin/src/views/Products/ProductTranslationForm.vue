<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            Translate Tour
        </h1>
    </div>
    <div class="">
        <Spinner v-if="loading"
                 class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <div class=" mb-2">
                    <select
                        name="type" v-model="product.locale"
                        class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                        <option value="" selected>Choose Language</option>
                        <option v-for="locale in product.availableLocales" :value="locale" :key="locale">
                            {{ locale }}
                        </option>
                    </select>
                </div>
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
                <Editor v-model="product.itenary_section" editorStyle="height: 320px"
                        :class="{'border border-red-500': errors.itenary_section && errors.itenary_section[0]}"/>
                <span v-if="errors.itenary_section && errors.itenary_section[0]"
                      class="text-red-500 text-sm font-semibold">{{ errors.itenary_section[0] }}</span>
                <CustomInput type="textarea" class="mb-2" v-model="product.places" label="Places"
                             :errors="errors.places"/>
                <CustomInput class="mb-2" v-model="product.duration" label="Tour Duration" :errors="errors.duration"/>

                <CustomInput class="mb-2" type="textarea" v-model="product.locations"
                             label="Tour Location (2fsl ben kol location we al tany b sla4 /"
                             :errors="errors.locations"/>
                <!--                <CustomInput type="checkbox" class="mb-2" v-model="product.published" label="Published"/>-->
            </div>
            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit"
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

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const product = ref({
    id: null,
    title: '',
    description: '',
    included: '',
    excluded: '',
    places: '',
    duration: '',
    locations: '',
    itenary_section: '',
    itenary_title: '',
    // published: false
})
const errors = ref({
    title: [],
    description: [],
    included: [],
    excluded: [],
    places: [],
    duration: [],
    locations: [],
    itenary_section: [],
    itenary_title: [],
})


function onSubmit() {
    loading.value = true;
    store.dispatch('createProductTranslation', product.value)
        .then(response => {
            loading.value = false;
            store.commit('showToast', 'Product Translated Successfully');
            store.dispatch('getProducts');
            router.push({"name": "app.products"})
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
        store.dispatch('getProductForTranslation', route.params.id)
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
