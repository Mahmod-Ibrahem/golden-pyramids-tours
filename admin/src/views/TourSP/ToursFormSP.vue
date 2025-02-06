<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{
                nonTranslatedProduct.tourTranslationId ? `Update translation of Tour: ${nonTranslatedProduct.title}` : 'Translate New Tour'
            }}
        </h1>
    </div>
    <Spinner v-if="loading"
             class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

    <form v-else @submit.prevent="onSubmit">
        <div class="bg-white px-4 pt-5 pb-4">
            <div v-if="!nonTranslatedProduct.tourTranslationId" class=" mb-2">
                <select
                    name="type" v-model="nonTranslatedProduct.id"
                    class="customInput w-full px-3 py-2 border focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                    :class="{ 'border-red-500': errors.id && errors.id[0]}">
                    <option value="">اخـتــار الرحله اللي عايز تترجمها</option>
                    <option v-for="nonTransProd of nonTranslatedProducts"
                            :selected="nonTranslatedProduct.id===nonTransProd.id"
                            :value="nonTransProd.id">
                        {{ nonTransProd.title }}
                    </option>
                </select>
                <p class="text-red-500 text-sm font-semibold px-3 mb-2"
                   v-if="errors.id && errors.id[0]">{{ errors.id[0] }}</p>
            </div>
            <CustomInput class="mb-2" v-model="nonTranslatedProduct.title" :errors="errors.title"
                         label="Tour Title يستحسن يكون اكتر من 45 حرف وأقل من 80 "/>
            <p v-if="nonTranslatedProduct.title"
               class="text-xs font-semibold"
               :class="{
       'text-green-600': nonTranslatedProduct.title?.length > 45 && nonTranslatedProduct.title?.length <= 80,
       'text-red-600': nonTranslatedProduct.title?.length > 80
   }">
                Character Length: {{ nonTranslatedProduct.title?.length }}
            </p>
            <CustomInput type="textarea" class="mb-2" v-model="nonTranslatedProduct.description"
                         :errors="errors.description"
                         label="Description يستحسن يكون اكتر من 230 حرف واقل من 281"/>
            <p v-if="nonTranslatedProduct.description" class="text-xs font-semibold text-Primary"
               :class="{ 'text-green-600' : nonTranslatedProduct.description?.length>=230 && nonTranslatedProduct.description?.length <= 280, 'text-red-600' : nonTranslatedProduct.description?.length > 280 }">
                Character Length :
                {{ nonTranslatedProduct.description?.length }}</p>

            <CustomInput type="textarea" class="mb-2" :errors="errors.included" v-model="nonTranslatedProduct.included"
                         label="Tour Included (/) أفصل بين كل حاجه والتانيه بسلاش  "/>
            <CustomInput type="textarea" class="mb-2" :errors="errors.excluded" v-model="nonTranslatedProduct.excluded"
                         label="Tour Excluded (/) أفصل بين كل حاجه والتانيه بسلاش"/>
            <CustomInput type="textarea" class="mb-2" :errors="errors.itenary_title"
                         v-model="nonTranslatedProduct.itenary_title"
                         label="Itenary Titles (/) أفصل بين كل حاجه والتانيه بسلاش"/>
            <CustomInput type="textarea" class="mb-2" v-model="nonTranslatedProduct.itenary_section"
                         :errors="errors.itenary_section"
                         label="Itenary description  (/) أفصل بين كل حاجه والتانيه بسلاش"/>
            <CustomInput type="textarea" class="mb-2" v-model="nonTranslatedProduct.places"
                         label="Places أفصل بين كل حاجه والتانيه بسلاش واول حرف من كل مكان كابيتال"
                         :errors="errors.places"/>
            <CustomInput class="mb-2" v-model="nonTranslatedProduct.duration" label="Tour Duration"
                         :errors="errors.duration"/>

            <CustomInput class="mb-2" type="textarea" v-model="nonTranslatedProduct.locations"
                         label="Tour Location أفصل بين كل حاجه والتانيه بسلاش واول حرف من كل مكان كابيتال"
                         :errors="errors.locations"/>
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

const nonTranslatedProduct = ref({
    id: '',
    tourTranslationId: '',
    title: '',
    description: '',
    included: '',
    excluded: '',
    places: '',
    duration: '',
    locations: '',
    itenary_section: '',
    itenary_title: '',
    locale: 'sp ',
})

function resetNonTranslatedProduct() {
    nonTranslatedProduct.value = {
        id: '',
        tourTranslationId: '',
        title: '',
        description: '',
        included: '',
        excluded: '',
        places: '',
        duration: '',
        locations: '',
        itenary_section: '',
        itenary_title: '',
        locale: 'sp ',
    }
}

const errors = ref({
    id: null,
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
const nonTranslatedProducts = ref(null)

function onSubmit($event, close = false) {
    loading.value = true;
    const action = nonTranslatedProduct.value.tourTranslationId
        ? 'updateTourTranslation'
        : 'TranslateNewTour';
    const successMessage = nonTranslatedProduct.value.tourTranslationId
        ? 'Tour has successfully updated'
        : 'Tour has successfully Translated to Spanish';

    store.dispatch(action, nonTranslatedProduct.value)
        .then(response => {
            if (response.status === 200) {
                handleSuccess(successMessage, close);
            }
        })
        .catch(err => {
            handleError(err);
        });
}

function handleSuccess(message,  close) {
    loading.value = false;
    store.commit('showToast', message);
    store.dispatch('getProducts', { locale:'sp' });
    if (close) {
        router.push({ name: 'app.tours.ger' });
    } else
    {
        handleNonTranslatedTours();
    }
}

function handleNonTranslatedTours() {
    loading.value = true;
    store.dispatch('getNonTranslatedTours')
        .then(({ data }) => {
            loading.value = false;
            nonTranslatedProducts.value = data;
        });
    resetNonTranslatedProduct();
    router.push({ name: 'app.tours.de.create' });
}

function handleError(err) {
    loading.value = false;
    if (err.response.status === 422) {
        errors.value = err.response.data.errors;
    } else if (err.response.status === 409) {
        store.commit('showErrorToast', err.response.data.message);
    }
}
onMounted(() => {
    if (route.params.id) {
        loading.value = true
        store.dispatch('getProduct', {productId: route.params.id, locale: 'sp'})
            .then((response) => {
                loading.value = false;
                nonTranslatedProduct.value = response.data
            })
    } else {
        loading.value = true
        store.dispatch('getNonTranslatedTours').then(({data}) => {
            loading.value = false
            nonTranslatedProducts.value = data
        })
    }
})
</script>
