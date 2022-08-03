<button x-data="colorMode"
        class="rounded-md p-2 transition-colors duration-100 hover:bg-gray-50 dark:hover:bg-gray-800"
        :title="`Current mode: ${mode}`"
        @click="switchMode()">
    <svg xmlns="http://www.w3.org/2000/svg"
         class="block h-6 w-6 dark:hidden"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="2">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg"
         class="hidden h-6 w-6 dark:block"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor"
         stroke-width="2">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
    </svg>
</button>
