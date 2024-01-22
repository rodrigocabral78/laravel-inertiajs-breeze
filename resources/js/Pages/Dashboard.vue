<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
        </div>

        <br>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">

            <div class="flex flex-col text-center w-full mb-20">
              <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2">Pricing</h1>
              <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic
                crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
            </div>

            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th
                      class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                      Plan</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Speed
                    </th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Storage
                    </th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Price
                    </th>
                    <th
                      class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="px-4 py-3">Start</td>
                    <td class="px-4 py-3">5 Mb/s</td>
                    <td class="px-4 py-3">15 GB</td>
                    <td class="px-4 py-3 text-lg">Free</td>
                    <td class="w-10 text-center">
                      <input name="plan" type="radio">
                    </td>
                  </tr>
                  <tr>
                    <td class="border-t-2 border-gray-200 px-4 py-3">Pro</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3">25 Mb/s</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3">25 GB</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3 text-lg">$24</td>
                    <td class="border-t-2 border-gray-200 w-10 text-center">
                      <input name="plan" type="radio">
                    </td>
                  </tr>
                  <tr>
                    <td class="border-t-2 border-gray-200 px-4 py-3">Business</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3">36 Mb/s</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3">40 GB</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3 text-lg">$50</td>
                    <td class="border-t-2 border-gray-200 w-10 text-center">
                      <input name="plan" type="radio">
                    </td>
                  </tr>
                  <tr>
                    <td class="border-t-2 border-gray-200 px-4 py-3">Exclusive</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3">48 Mb/s</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3">120 GB</td>
                    <td class="border-t-2 border-gray-200 px-4 py-3 text-lg">$72</td>
                    <td class="border-t-2 border-gray-200 w-10 text-center">
                      <input name="plan" type="radio">
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="border-b-2"></div>
            </div>
            <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
              <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
              <button
                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <section class="text-gray-400 bg-gray-900 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
          <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-white">Pricing</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic crucifix
            neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p>
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr>
                <th
                  class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tl rounded-bl">
                  Plan</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Speed</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Storage</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-white text-sm bg-gray-800">Price</th>
                <th
                  class="w-10 title-font tracking-wider font-medium text-white text-sm bg-gray-800 rounded-tr rounded-br">
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 py-3">Start</td>
                <td class="px-4 py-3">5 Mb/s</td>
                <td class="px-4 py-3">15 GB</td>
                <td class="px-4 py-3 text-lg text-white">Free</td>
                <td class="w-10 text-center">
                  <input name="plan" type="radio">
                </td>
              </tr>
              <tr>
                <td class="border-t-2 border-gray-800 px-4 py-3">Pro</td>
                <td class="border-t-2 border-gray-800 px-4 py-3">25 Mb/s</td>
                <td class="border-t-2 border-gray-800 px-4 py-3">25 GB</td>
                <td class="border-t-2 border-gray-800 px-4 py-3 text-lg text-white">$24</td>
                <td class="border-t-2 border-gray-800 w-10 text-center">
                  <input name="plan" type="radio">
                </td>
              </tr>
              <tr>
                <td class="border-t-2 border-gray-800 px-4 py-3">Business</td>
                <td class="border-t-2 border-gray-800 px-4 py-3">36 Mb/s</td>
                <td class="border-t-2 border-gray-800 px-4 py-3">40 GB</td>
                <td class="border-t-2 border-gray-800 px-4 py-3 text-lg text-white">$50</td>
                <td class="border-t-2 border-gray-800 w-10 text-center">
                  <input name="plan" type="radio">
                </td>
              </tr>
              <tr>
                <td class="border-t-2 border-b-2 border-gray-800 px-4 py-3">Exclusive</td>
                <td class="border-t-2 border-b-2 border-gray-800 px-4 py-3">48 Mb/s</td>
                <td class="border-t-2 border-b-2 border-gray-800 px-4 py-3">120 GB</td>
                <td class="border-t-2 border-b-2 border-gray-800 px-4 py-3 text-lg text-white">$72</td>
                <td class="border-t-2 border-b-2 border-gray-800 w-10 text-center">
                  <input name="plan" type="radio">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
          <a class="text-indigo-400 inline-flex items-center md:mb-2 lg:mb-0">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
          <button
            class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
        </div>
      </div>
    </section>

    <footer class="text-gray-400 bg-gray-900 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap md:text-left text-center -mb-10 -mx-4">
          <div class="lg:w-1/6 md:w-1/2 w-full px-4">
            <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-gray-400 hover:text-white">First Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Second Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Third Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Fourth Link</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/6 md:w-1/2 w-full px-4">
            <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-gray-400 hover:text-white">First Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Second Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Third Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Fourth Link</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/6 md:w-1/2 w-full px-4">
            <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-gray-400 hover:text-white">First Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Second Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Third Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Fourth Link</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/6 md:w-1/2 w-full px-4">
            <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-gray-400 hover:text-white">First Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Second Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Third Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Fourth Link</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/6 md:w-1/2 w-full px-4">
            <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-gray-400 hover:text-white">First Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Second Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Third Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Fourth Link</a>
              </li>
            </nav>
          </div>
          <div class="lg:w-1/6 md:w-1/2 w-full px-4">
            <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">CATEGORIES</h2>
            <nav class="list-none mb-10">
              <li>
                <a class="text-gray-400 hover:text-white">First Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Second Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Third Link</a>
              </li>
              <li>
                <a class="text-gray-400 hover:text-white">Fourth Link</a>
              </li>
            </nav>
          </div>
        </div>
      </div>

      <div class="border-t border-gray-800">
        <div class="container px-5 py-8 flex flex-wrap mx-auto items-center">
          <div class="flex md:flex-nowrap flex-wrap justify-center items-end md:justify-start">
            <div class="relative sm:w-64 w-40 sm:mr-4 mr-2">
              <label for="footer-field" class="leading-7 text-sm text-gray-400">Placeholder</label>
              <input type="text" id="footer-field" name="footer-field"
                class="w-full bg-gray-800 bg-opacity-40 rounded border border-gray-700 focus:ring-2 focus:ring-indigo-900 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button
              class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
            <p class="text-gray-500 text-sm md:ml-6 md:mt-0 mt-2 text-center sm:text-left">Bitters chicharrones fanny pack
              <br class="lg:block hidden">waistcoat green juice
            </p>
          </div>
          <span class="inline-flex lg:ml-auto lg:mt-0 mt-6 w-full justify-center md:justify-start md:w-auto">
            <a class="text-gray-400">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                viewBox="0 0 24 24">
                <path
                  d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                </path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none"
                  d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
      </div>

      <div class="bg-gray-800 bg-opacity-75">
        <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
          <p class="text-gray-400 text-sm text-center sm:text-left">© 2020 Tailblocks —
            <a href="https://twitter.com/knyttneve" class="text-gray-500 ml-1" target="_blank"
              rel="noopener noreferrer">@knyttneve</a>
          </p>
          <span class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-gray-400 text-sm">Enamel pin
            tousled raclette tacos irony</span>
        </div>
      </div>
    </footer>
  </AuthenticatedLayout>
</template>
