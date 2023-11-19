<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({ users: Object })

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
            <Link :href="route('users.create')">Create User</Link>

            <ul>
              <li v-for="user in users" :key="user.id">
                {{ user.id }} - Hello {{ user.name }}, welcome to your first Inertia app! | <Link :href="route('users.show', user.id)">Show User</Link> | <Link :href="route('users.edit', user.id)">Edit User</Link>

              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
