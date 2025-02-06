<template>
<div class="relative inline-block text-left z-50 md:mr-6 mr-1">
    <div class="flex items-center justify-center">
        <select   class="inline-flex justify-center  rounded-md border border-gray-300 shadow-sm md:px-4 md:py-2 py-1 bg-white text-xs md:text-sm
                font-semibold text-gray-700 hover:bg-gray-50 px-1" @change="setAppLocale($event.target.value)"
                id="language-menu-button" aria-expanded="false" aria-haspopup="true">
            <option value="en" class="flex items-center" id="selected-language">
                English
            </option>
            <option value="fr" class="flex items-center" id="selected-language">
                French
            </option>
            <option value="pt" class="flex items-center" id="selected-language">
                portugal
            </option>
            <option value="zh" class="flex items-center" id="selected-language">
                Chinese
            </option>
            <option value="sp" class="flex items-center" id="selected-language">
                Spanish
            </option>
        </Select>
    </div>
</div>
</template>
<script setup>
   import store from "../../store/index.js";

   function setAppLocale(locale) {
       store.commit('updateLocale', locale)
   }
</script>
