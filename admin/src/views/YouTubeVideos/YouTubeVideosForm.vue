<template>
    <div class="flex items-center justify-between mb-3">
        <h1 v-if="!loading" class="text-3xl font-semibold">
            {{ video.id ? `Update Video` : 'Add New YouTube Video' }}
        </h1>
    </div>

    <div>
        <Spinner
            v-if="loading"
            class="absolute left-0 top-0 bg-white right-0 bottom-0 flex items-center justify-center"
        />

        <form v-else @submit.prevent="onSubmit">
            <div class="bg-white px-4 pt-5 pb-4">
                <CustomInput
                    class="mb-2"
                    v-model="video.embed"
                    label="YouTube Embed Code or URL"
                    :errors="errors.embed"
                />
            </div>

            <footer class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button
                    @click="onSubmit($event, true)"
                    type="submit"
                    class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-3"
                >
                    Save
                </button>
                <RouterLink
                    :to="{ name: 'app.youtube-videos' }"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                >
                    Cancel
                </RouterLink>
            </footer>
        </form>
    </div>
</template>

<script setup>
import Spinner from './../../components/Core/Spinner.vue'
import CustomInput from '../../components/Core/CustomInput.vue'
import { ref, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import store from '../../store/index.js'

const route = useRoute()
const router = useRouter()

const loading = ref(false)
const errors = ref({})
const video = ref({
    id: null,
    embed: '',
})

function onSubmit($event, close = false) {
    loading.value = true
    errors.value = {}

    const action = video.value.id ? 'updateVideo' : 'createVideo'
    const successStatus = action === 'updateVideo' ? 200 : 201
    const successMessage =
        action === 'updateVideo'
            ? 'Video has been successfully updated'
            : 'Video has been successfully added'

    store
        .dispatch(action, video.value)
        .then((response) => {
            loading.value = false
            if (response.status === successStatus) {
                store.commit('showToast', successMessage)
                store.dispatch('getVideos')

                if (close) {
                    router.push({ name: 'app.youtube-videos' })
                } else if (action === 'createVideo') {
                    video.value = response.data
                    router.push({
                        name: 'app.youtube-videos.edit',
                        params: { id: response.data.id },
                    })
                }
            }
        })
        .catch((err) => {
            loading.value = false
            if (err.response?.status === 422) {
                errors.value = err.response.data.errors
            } else {
                store.commit(
                    'showErrorToast',
                    'An error occurred while submitting the form.'
                )
            }
        })
}

onMounted(() => {
    if (route.params.id) {
        loading.value = true
        store
            .dispatch('getVideo', route.params.id)
            .then((response) => {
                loading.value = false
                video.value = response.data
            })
    }
})
</script>

<style scoped></style>
