<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  users: Object
})
console.log(props.users)
</script>

<template>
  <Head title="Dashboard Users" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard Users</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">

            <div class="flex pl-4 mb-4 lg w-full mx-auto">

              <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
              <Link class="flex ml-4 text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" :href="route('users.create')">Create User</Link>

            </div>

            <div class="lg w-full mx-auto overflow-auto">
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm text-center bg-gray-100 rounded-tl rounded-bl">#</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm text-center bg-gray-100">Name</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm text-center bg-gray-100">Email</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm text-center bg-gray-100">Created At</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm text-center bg-gray-100">Updated At</th>
                    <th class="w-15 title-font tracking-wider font-medium text-gray-900 text-sm text-center bg-gray-100 rounded-tr rounded-br"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="user in users.data" :key="user.uuid">
                    <td class="border-t-2 border-gray-200 px-4 py-3 text-center">
                      <Link :href="route('users.show', user.uuid)">{{ user.id }}</Link>
                    </td>
                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ user.name }}</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ user.email }}</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3 text-center">{{ user.created_at }}</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3 text-center">{{ user.updated_at }}</td>
                    <td class="border-t-2 border-gray-200 w-15 text-center">
                      <Link :href="route('users.edit', user.uuid)">Edit</Link> | <Link :href="route('users.destroy', user.uuid)">Delete</Link>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="border-b-2"></div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </AuthenticatedLayout>
</template>
