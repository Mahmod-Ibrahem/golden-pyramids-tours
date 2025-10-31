<template>
  <div class="flex items-center justify-between mb-3">
    <h1 v-if="!loading" class="text-3xl font-semibold">
      {{ contactLead.id ? `Update Contact Lead: "${contactLead.name}"` : 'Create New Contact Lead' }}
    </h1>
  </div>
  <div>
    <Spinner v-if="loading"
             class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"/>

    <form v-else @submit.prevent="onSubmit">
      <div class="bg-white px-4 pt-5 pb-4 space-y-3">
        <CustomInput v-model="contactLead.name" label="Full Name" :errors="errors.name" class="mb-2"/>
        <CustomInput v-model="contactLead.email" label="Email" :errors="errors.email" class="mb-2"/>
        <CustomInput v-model="contactLead.phone" label="Phone" :errors="errors.phone" class="mb-2"/>
        <CustomInput v-model="contactLead.message" label="Message" :errors="errors.message" class="mb-2"/>
      </div>

      <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit"
                @click="onSubmit($event, true)"
                class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3">
          Save
        </button>
        <RouterLink :to="{ name: 'app.contact-leads' }" type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Cancel
        </RouterLink>
      </footer>
    </form>
  </div>
</template>
<script setup>
import Spinner from "../../components/core/Spinner.vue";
import CustomInput from '../../components/Core/CustomInput.vue'
import {ref, onMounted} from 'vue'
import {useRoute, useRouter} from "vue-router"
import store from "../../store/index.js"

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const contactLead = ref({
  id: null,
  name: '',
  email: '',
  phone: '',
  communication: '',
  message: '',
})

const errors = ref({})

function onSubmit($event, close = false) {
  loading.value = true;
  errors.value = {}
  const action = contactLead.value.id ? 'updateContactLead' : 'createContactLead'
  const successStatus = contactLead.value.id ? 200 : 201
  const successMessage = contactLead.value.id ? 'Contact Lead has been successfully updated' : 'Contact Lead has been successfully created'
  store.dispatch(action, contactLead.value)
      .then(response => {
        if (response.status === successStatus) {
          store.commit('showToast', successMessage)
          if (close) {
            router.push({name: 'app.contact-leads'})
          } else if (!contactLead.value.id) {
            contactLead.value = response.data
            router.push({name: 'app.contact-leads.edit', params: {id: response.data.id}})
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
    store.dispatch('getContactLead', route.params.id)
        .then(response => {
          loading.value = false
          contactLead.value = response.data
        })
  }
})
</script>
