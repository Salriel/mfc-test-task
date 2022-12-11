<template>
  <td v-if="images" class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400 text-center">
    <div v-for="image in images" class="">
      <a :href="backend_url(image.filepath)" class="hover:font-bold">
        {{ image.original_name }}
      </a>
    </div>
  </td>
  <td v-else class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400 text-center">
    {{ data }}
  </td>
</template>

<script>
import config from "../../config";
export default {
  name: "Td",
  props: ['data', 'images'],
  methods: {
    backend_url: (uri) => {
      return 'http://' + config.backend_domain + '/' + uri;
    }
  }
}
</script>

<style scoped>

</style>