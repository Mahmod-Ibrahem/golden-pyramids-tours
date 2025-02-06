<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ faq.id ? `Update Faq: "${faq.question}"` : 'Create New Faq' }}
        </h1>
    </div>
    <div class="">
        <Spinner v-if="loading"
                 class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">

                <CustomInput class="mb-2" v-model="faq.question" :errors="errors.question"
                             label="السؤال"/>

                <CustomInput type="textarea" class="mb-2" v-model="faq.answer" :errors="errors.answer"
                             label=" الأجابه"/>

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
                <RouterLink :to="{ name: 'app.faqs' }" type="button"
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

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const faq = ref({
    id: null,
    question: '',
    answer: '',
    locale:'en',
})

const errors = ref({
    question: [],
    answer: [],

})

const tours = ref('')

function onSubmit($event, close = false) {
    loading.value = true;

    const action = faq.value.id ? 'updateFaq' : 'createFaq';
    const successStatus = faq.value.id ? 200 : 201;

    store.dispatch(action, faq.value)
        .then(response => {
            if (response.status === successStatus) {
                store.commit('showToast', action === 'updateFaq' ? 'Faqs has successfully updated' : 'Faq has successfully created');
                store.dispatch('getFaqs');
                if (close) {
                    router.push({ name: 'app.faqs' });
                } else if (action === 'createFaq') {
                    faq.value = response.data;
                    router.push({ name: 'app.faqs.edit', params: { id: response.data.id } });
                }
            }
            loading.value = false;
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
        store.dispatch('getFaq', route.params.id)
            .then((response) => {
                loading.value = false;
                faq.value = response.data
            })
    }

})
</script>
