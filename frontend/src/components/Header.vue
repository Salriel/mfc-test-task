<template>
  <div id="Header" class="sticky top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] bg-white/95 supports-backdrop-blur:bg-white/60 dark:bg-transparent">
    <div class="">
      <div class="py-4">
        <div class="relative flex items-center justify-between">
          <router-link :to="{name: 'RequestList'}" class="bg-gray-100 hover:bg-gray-200 px-2 py-1 rounded-lg ">
            Список
          </router-link>
          <router-link v-if="$route.name !== 'RequestEdit'" replace :to="{name: 'RequestCreate'}" class="bg-gray-100 hover:bg-gray-200 px-2 py-1 rounded-lg">
            Создать заявку
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Header",
}
</script>

<style scoped>

</style>