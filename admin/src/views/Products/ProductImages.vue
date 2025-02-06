<template>
  <div class="flex items-center justify-between mb-3">
    <h1 v-if="!loading" class="text-3xl font-semibold">
      Update Tour Images
    </h1>
  </div>
  <div>
    <Spinner v-if="loading"
             class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center z-20 h-screen"/>

    <form v-else @submit.prevent="onSubmit">
      <div class="bg-white px-4 pt-5 pb-4">
        <!-- Tour Groups -->

        <!-- Tour Images -->
        <div class="parent_container">
          <div class="child_container gap-3">

            <div v-for="Image in Images.tourImages"
                 class="flex-shrink-0 w-60 h-[10rem]  overflow-hidden relative  border rounded-3xl shadow-md
            transition-all duration-200 cursor-pointer">
              <a>
                <img class="transition-all duration-300 w-full h-full object-cover"
                     :src="Image.path"/>
              </a>

              <div @click="removeImage(Image.id)"
                   class="absolute top-1 right-5  duration-200 group">
                <h3 class="text-red-600 bg-white font-bold mb-2 text-center rounded-full px-2 group-hover:bg-red-600 group-hover:text-white transition-all ">
                  X
                </h3>
              </div>
            </div>

          </div>
        </div>
        <label
            for="TourImages"
            class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                    <span class="flex flex-col items-center justify-center py-1">
                        <svg class="w-8 h-8 mb-1 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <span class="mb-2 text-sm text-gray-500 ">Add Tour Images</span>
                    </span>
          <input id="TourImages" type="file" class="hidden" @change="handleFiles" multiple/>
        </label>
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

const emit = defineEmits(['update:modelValue', 'close'])
const route = useRoute()
const router = useRouter()

const loading = ref(false)
const Images = ref({
  id: null,
  tour_images: null,
  // published: false
})

function removeImage(id) {
  if (!confirm(' Are you sure you want to delete this image ?')) {
    return
  }
  store.dispatch('deleteProductImage', id)
      .then(res => {
        if (res.status === 200) {
          store.commit('showToast', 'Images has  successfully Deleted')
          store.dispatch('getProduct', {productId:route.params.id, locale: 'en'}).then(response => {
            Images.value = response.data
          })
        }
      })
}


function handleFiles(event) {
  const files = event.target.files;
  Images.value.tour_images = Array.from(files); // Convert FileList to an array
}

function onSubmit($event, close = false) {
  loading.value = true
  if (Images.value.id) {
    store.dispatch('addProductImages', Images.value)
        .then(response => {
          loading.value = false;
          if (response.status === 200) {
            store.commit('showToast', 'Images has  successfully updated')
            store.dispatch('getProduct', {productId:route.params.id, locale: 'en'}).then(response => {
              Images.value = response.data
            })
            if (close) {
              router.push({name: 'app.products'})
            }
          }
        })
  }
}

onMounted(() => {
  if (route.params.id) {
    loading.value = true
    store.dispatch('getProduct', {productId: route.params.id , locale: 'en'})
        .then((response) => {
          loading.value = false;
          Images.value = response.data
        })
  }
})
</script>
