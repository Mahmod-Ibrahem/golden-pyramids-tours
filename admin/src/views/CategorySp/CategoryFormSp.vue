<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ category.id ? `Update Category: "${category.name}"` : 'Translate    New Category' }}
        </h1>
    </div>
    <div class="">
        <Spinner v-if="loading"
                 class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <select v-if="!category.id"
                    name="type" v-model="category.category_id"
                    class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                    <option value="">اخـتــار الكاتيجوري اللي عايز تترجمو</option>
                    <option v-for="nonTransCat of nonTranslatedCategories"
                            :selected="nonTransCat.id===category.id"
                            :value="nonTransCat.id">
                        {{ nonTransCat.name }}
                    </option>
                </select>

                <CustomInput class="mb-2" v-model="category.name" label="Category Name" :errors="errors.name"/>
                <CustomInput class="mb-2" v-model="category.bg_header" label="BackGround Image Header" :errors="errors.bg_header"/>
                <CustomInput class="mb-2" v-model="category.header" label="Category Header" :errors="errors.header"/>
                <CustomInput type="textarea" class="mb-2" v-model="category.description" label="Category Description" :errors="errors.description"/>
                <CustomInput type="textarea" class="mb-2" v-model="category.title_meta" label="Title Keyword" :errors="errors.title_meta"/>
                <CustomInput type="textarea" class="mb-2" v-model="category.description_meta" label="Description Keyword" :errors="errors.description_meta"/>
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

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()
const loading = ref(false)
const category = ref({
    id: '',
    categoryTranslationId: '',
    category_id: '',
    header: '',
    description: '',
    bg_header: '',
    name: '',
    locale:'sp',
    title_meta: '',
    description_meta: ''
})
const errors = ref({})
const nonTranslatedCategories = ref({})
//TODO ADD ERROR HANDLING
function onSubmit($event, close = false) {
    loading.value = true;
    errors.value = {};
    const action = category.value.categoryTranslationId ? 'updateCategoryTranslation' : 'createCategoryTranslation';
    const successStatus = action === 'updateCategoryTranslation' ? 200 : 201;
    const successMessage = action === 'updateCategoryTranslation' ? 'Category has successfully updated' : 'Category has successfully translated';

    store.dispatch(action, category.value)
        .then(response => {
            loading.value = false;
            if (response.status === successStatus) {
                store.commit('showToast', successMessage);
                store.dispatch('getCategories', { locale: 'sp' });
                if (close) {
                    router.push({ name: 'app.categories.sp' });
                } else if (action === 'createCategoryTranslation') {
                    category.value = response.data;
                    router.push({ name: 'app.categories.sp.edit', params: { id: response.data.id } });
                }
            }
        })
        .catch(err => {
            loading.value = false;
            if (err.response.status === 422) {
                errors.value = err.response.data.errors;
            } else if (err.response.status === 409) {
                store.commit('showErrorToast', err.response.data.message);
            } else {
                store.commit('showErrorToast', 'An error occurred while submitting the form.');
            }
        });
}
onMounted(() => {
    loading.value = true
    if (route.params.id) {
        store.dispatch('getCategory', {id:route.params.id,locale: 'sp'})
            .then((response) => {
                loading.value = false;
                category.value = response.data
            })
    }
    else{
        store.dispatch('getNonTranslatedCategories').then(({data}) => {
            loading.value = false
            nonTranslatedCategories.value = data
        })
    }
})
</script>
