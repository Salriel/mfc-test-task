<template>
  <div id="Header" class="sticky top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] bg-white/95 supports-backdrop-blur:bg-white/60 dark:bg-transparent">
    <div class="max-w-8xl mx-auto">
      <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
        <div class="relative flex items-center justify-around">
          <button class="bg-orange-300 hover:bg-orange-200 px-2 py-1 rounded-lg">
            Список
          </button>
          <button class="bg-orange-300 hover:bg-orange-200 px-2 py-1 rounded-lg">
            Создать заявку
          </button>
        </div>
      </div>
      <div class="flex items-center p-4 border-b border-slate-900/10 lg:hidden dark:border-slate-50/[0.06]">
        <button type="button"
                class="text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300"><span
            class="sr-only">Navigation</span>
          <svg width="24" height="24">
            <path d="M5 6h14M5 12h14M5 18h14" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round"></path>
          </svg>
        </button>
        <ol class="ml-4 flex text-sm leading-6 whitespace-nowrap min-w-0">
          <li class="font-semibold text-slate-900 truncate dark:text-slate-200">Brand</li>
        </ol>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style scoped>

</style>