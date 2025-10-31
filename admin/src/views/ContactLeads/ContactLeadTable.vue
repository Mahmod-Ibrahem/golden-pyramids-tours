<template>
  <div class="managmenet_container">
    <div class="flex flex-col border-b-2 p-2">
      <!-- Add any search/filter options here if needed -->
    </div>

    <table class="table_tag">
      <thead>
      <tr>
        <TableHeadingCell class="border-b-2 p-2 text-left" field="id" :sort-field="sortField"
                          :sort-direction="sortDirection">ID
        </TableHeadingCell>
        <TableHeadingCell class="border-b-2 p-2 text-left" field="full_name" :sort-field="sortField"
                          :sort-direction="sortDirection">Full Name
        </TableHeadingCell>
        <TableHeadingCell class="border-b-2 p-2 text-left" field="email" :sort-field="sortField"
                          :sort-direction="sortDirection">Email
        </TableHeadingCell>
        <TableHeadingCell class="border-b-2 p-2 text-left" field="subject" :sort-field="sortField"
                          :sort-direction="sortDirection">Message
        </TableHeadingCell>
        <TableHeadingCell class="border-b-2 p-2 text-left" field="phone" :sort-field="sortField"
                          :sort-direction="sortDirection">Phone
        </TableHeadingCell>
        <TableHeadingCell class="border-b-2 p-2 text-left" field="phone" :sort-field="sortField"
                          :sort-direction="sortDirection">Actions
        </TableHeadingCell>
      </tr>
      </thead>

      <tbody v-if="leads.loading">
      <tr>
        <td colspan="6">
          <Spinner class="my-4"/>
        </td>
      </tr>
      </tbody>

      <tbody v-else class="table-body">
      <tr v-for="(lead, index) in leads.data" :key="lead.id">
        <td class="border-b p-2">{{ lead.id }}</td>
        <td class="border-b p-2">{{ lead.name }}</td>
        <td class="border-b p-2">{{ lead.email }}</td>
        <td class="border-b p-2 max-w-[200px] whitespace-pre-line">{{ lead.message }}</td>
        <td class="border-b p-2">{{ lead.phone }}</td>
        <td class="border-b p-2">
          <Menu as="div" class="relative inline-block text-left">
            <div>
              <MenuButton
                  class="inline-flex items-center justify-center rounded-full w-10 h-10 bg-black bg-opacity-0 text-sm font-medium text-white hover:bg-opacity-5">
                <EllipsisVerticalIcon class="h-5 w-5 text-indigo-500"/>
              </MenuButton>
            </div>

            <transition enter-active-class="transition duration-100 ease-out"
                        enter-from-class="transform scale-95 opacity-0"
                        enter-to-class="transform scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-in"
                        leave-from-class="transform scale-100 opacity-100"
                        leave-to-class="transform scale-95 opacity-0">
              <MenuItems
                  class="absolute z-10 right-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="px-1 py-1">
                  <MenuItem v-slot="{ active }">
                    <RouterLink :to="{ name: 'app.contact-leads.edit', params: { id: lead.id } }"
                                :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'group flex w-full items-center rounded-md px-2 py-2 text-sm']">
                      <PencilIcon class="mr-2 h-5 w-5 text-indigo-400"/>
                      Edit
                    </RouterLink>
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <button @click="deleteLead(lead)"
                            :class="[active ? 'bg-indigo-600 text-white' : 'text-gray-900', 'group flex w-full items-center rounded-md px-2 py-2 text-sm']">
                      <TrashIcon class="mr-2 h-5 w-5 text-indigo-400"/>
                      Delete
                    </button>
                  </MenuItem>
                </div>
              </MenuItems>
            </transition>
          </Menu>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import Spinner from "../../components/core/Spinner.vue";
import TableHeadingCell from "../../components/core/Table/TableHeadingCell.vue";
import {ref, computed, onMounted} from 'vue';
import store from "../../store";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import {EllipsisVerticalIcon, PencilIcon, TrashIcon} from '@heroicons/vue/24/outline';
import {RouterLink} from 'vue-router';

const sortField = ref('');
const sortDirection = ref('asc');
const perPage = ref(10)
const search = ref('')
const leads = computed(() => store.state.contactLeads);

function getLeads(url = null) {
  store.dispatch('getContactLeads', {
    url,
    search: search.value,
    perPage: perPage.value,
    sortField: sortField.value,
    sortDirection: sortDirection.value,
  }).catch(err => {
    console.log(err)
    store.contactLeads.loading = false
  })
}

function deleteLead(lead) {
  if (!confirm('Are you sure you want to delete this lead?')) return;
  store.dispatch('deleteContactLead', lead.id).then(() => {
    store.commit('showToast', 'Lead deleted successfully');
    getLeads();
  });
}

function sortBy(field) {
  if (field === sortField.value) {
    sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc';
  } else {
    sortField.value = field;
    sortDirection.value = 'asc';
  }
  getLeads();
}

onMounted(() => {
  getLeads();
})
</script>
