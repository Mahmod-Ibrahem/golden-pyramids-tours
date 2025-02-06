<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ category.id ? `Update Category: "${category.name}"` : 'Create New Category' }}
        </h1>
    </div>
    <div>
        <Spinner v-if="loading"
                 class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <select name="type" v-model="category.type"
                        class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Select Tour Section</option>
                    <option value="DayTours">Day Tours</option>
                    <option value="TourPackages">Tour Packages</option>
                </select>
                <CustomInput class="mb-2" v-model="category.name" label="Category Name" :errors="errors.name"/>
                <CustomInput class="mb-2" v-model="category.bg_header" label="BackGround Image Header" :errors="errors.bg_header"/>
                <CustomInput class="mb-2" v-model="category.header" label="Category Header" :errors="errors.header"/>
<!--                <CustomInput type="textarea" class="mb-2" v-model="category.description" label="Category Description" :errors="errors.description"/>-->
                <Editor v-model="category.description" editorStyle="height: 200px" placeholder="Category Description" />
                <CustomInput type="textarea" class="mb-2" v-model="category.title_meta" label="Title Keyword" :errors="errors.title_meta"/>
                <CustomInput type="textarea" class="mb-2" v-model="category.description_meta" label="Description Keyword" :errors="errors.description_meta"/>
                <CustomInput type="file" class="mb-2" label="category Image" @change="file => category.image = file" :errors="errors.image"/>
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
                <RouterLink :to="{ name: 'app.categories' }" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </RouterLink>
            </footer>
        </form>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import {ref, onMounted} from 'vue'
import {useRoute, useRouter} from "vue-router";
import store from "../../store/index.js"
import CustomInput from '../../components/Core/CustomInput.vue';
import Editor from 'primevue/editor';

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const category = ref({
    id: null,
    header: '',
    categoryTranslationId: '',
    description: '',
    bg_header: '',
    type: '',
    name: '',
    image: '',
    locale:'en',
    title_meta: '',
    description_meta: ''
})

const errors = ref({
})

function onSubmit($event, close = false) {
    loading.value = true;
    errors.value={}
    const action = category.value.id ? 'updateCategory' : 'createCategory';
    const successStatus = action === 'updateCategory' ? 200 : 201;
    const successMessage = action === 'updateCategory' ? 'Category has successfully updated' : 'Category has successfully created';

    store.dispatch(action, category.value)
        .then(response => {
            loading.value = false;
            if (response.status === successStatus) {
                store.commit('showToast', successMessage);
                store.dispatch('getCategories');
                if (close) {
                    router.push({ name: 'app.categories' });
                } else if (action === 'createCategory') {
                    category.value=response.data
                    router.push({ name: 'app.categories.edit', params: { id: response.data.id } });
                }
            }
        })
        .catch(err => {
            loading.value = false;
            if (err.response.status === 422) {
                errors.value = err.response.data.errors;
                console.log(errors.value)
            } else if (err.response.status === 409) {
                store.commit('showErrorToast', err.response.data.message);
            } else {
                store.commit('showErrorToast', 'An error occurred while submitting the form.');
            }
        });
}
onMounted(() => {
    if (route.params.id) {
        loading.value = true
        store.dispatch('getCategory', {id:route.params.id, locale: 'en'})
            .then((response) => {
                loading.value = false;
                category.value = response.data
            })
    }
})
</script>
