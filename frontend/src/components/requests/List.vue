<template>
  <div id="request_list" class="flex justify-center">
    <div class="mt-4 -mb-3"><div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25"><div style="background-position: 10px 10px;" class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]"></div><div class="relative rounded-xl overflow-auto">
      <div class="shadow-sm overflow-hidden my-8">
        <table class="border-collapse table-fixed w-full text-sm">
          <thead>
          <tr class="">
            <Th :title="'Статус'" />
            <Th :title="'Заголовок'" />
            <Th :title="'Изображения'" />
            <Th :title="'Дата создания'" />
          </tr>
          </thead>
          <tbody class="bg-white dark:bg-slate-800">
            <Item v-for="request in requests" :request="request"/>
          </tbody>
        </table>
      </div>
    </div><div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div></div></div>
  </div>
</template>

<script>
import Item from "./list/Item.vue";
import axios from "../../axios";
import Th from "../table/Th.vue";

export default {
  name: "List",
  data() {
    return {
      'requests': [
        {'id': 1, 'title': 'Хочу в отпуск', 'images': [], 'status': 'Новая', 'created_at': 'now'},
        {'id': 2, 'title': 'ЗП', 'images': [], 'status': 'Новая', 'created_at': 'now'},
        {'id': 3, 'title': 'Хмммм', 'images': [], 'status': 'Новая', 'created_at': 'now'}
      ]
    }
  },
  components: {
    Item, Th
  },
  methods: {
    loadData: () => {
      axios.get('/test').then(function (response) {
        console.log(response);
      })
    },
  }
}
</script>

<style scoped>

</style>