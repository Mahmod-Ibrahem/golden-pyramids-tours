<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="text-3xl font-semibold">Tour Categories (SP)</h1>
    <RouterLink :to="{name:'app.categories.sp.create'}"
      class="py-2 px-4 border border-transparent text-sm font-medium
      rounded-md text-white bg-indigo-600 hover:bg-indigo-700
      focus:outline-none focus:ring-2 focus:ring-offset-2
      focus:ring-indigo-500">
      Translate New Category
    </RouterLink>
  </div>
<!--  <CategoryModel v-model="showModal" :product="productModel" @close="onModalClose"></CategoryModel>-->
  <CategoriesTable @click-edit="EditProduct"></CategoriesTable>
</template>
<script setup>
import store from '../../store';
import CategoriesTable from "./CategoriesTableSp.vue";

function EditProduct(product) {
  store.dispatch('getProduct', product.id)
    .then(({ data }) => {
      productModel.value = data
    }
    )
}
// function onModalClose() {
//   productModel.value = {
//     id: '',
//     title: '',
//     published:false,
//     image: '',
//     description: '',
//     price: '',
//
//   }
// }
</script>

<style scoped></style>
