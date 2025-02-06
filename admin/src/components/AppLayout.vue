<template>
    <div v-if="userName.id" class="min-h-screen flex bg-gray-200">
        <!-- Sider Bar -->
        <SideBar :class="{ '-ml-[200px]': !sidebarOpened }"></SideBar>
        <!--End OF SideBar-->
        <!--Nav Bar-->
        <div class="flex-1">
            <NavBar @toggle-sidebar="toggleSideBar"></NavBar>
            <!-- End ofNav Bar-->
            <!--Content-->
            <main class="p-6">
                <div :key="store.state.appLocale" class="p-4 rounded bg-white shadow">
                    <router-view></router-view>
                </div>
            </main>
        </div>
    </div>
    <div v-else class="flex min-h-screen items-center justify-center text-center">
      <Spinner></Spinner>
      </div>
      <Toast />
        <ErrorToast></ErrorToast>

</template>

<script setup>
import SideBar from '../components/SideBar.vue'
import NavBar from '../components/NavBar.vue'
import { ref, onMounted, onUnmounted, computed } from 'vue'
import store from '../store';
import Spinner from './Core/Spinner.vue';
import Toast from './Core/Toast.vue';
import ErrorToast from "./core/ErrorToast.vue";
const props = defineProps({
    title: String
})

const sidebarOpened = ref(true)
function toggleSideBar() {
    sidebarOpened.value = !sidebarOpened.value
}
onMounted(() => {
  store.dispatch('getCurrentUser')
    store.dispatch('getCategories')
    handleSidebar()
    window.addEventListener('resize',handleSidebar)
})
onUnmounted(()=>{
    window.removeEventListener('resize',handleSidebar)
})
function handleSidebar() {
    sidebarOpened.value = window.outerWidth > 768
}

const userName=computed(()=>{

return  store.state.user.data
})
</script>

<style scoped></style>
