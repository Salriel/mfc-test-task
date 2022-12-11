<template>
  <div id="request_list" class="flex justify-center">
    <div class="mt-4 -mb-3">
      <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25">
        <div style="background-position: 10px 10px;"
             class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]"></div>
        <div class="relative rounded-xl overflow-auto">
          <div class="shadow-sm overflow-hidden my-8">
            <table class="border-collapse table-fixed w-full text-sm">
              <thead>
              <tr class="">
                <Th :title="'Статус'"/>
                <Th :title="'Заголовок'"/>
                <Th :title="'Изображения'"/>
                <Th :title="'Дата создания'"/>
              </tr>
              </thead>
              <tbody class="bg-white dark:bg-slate-800">
              <Item v-for="request in requests" :request="request"/>
              </tbody>
            </table>
          </div>
        </div>
        <div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div>
      </div>
    </div>
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
      ]
    }
  },
  components: {
    Item, Th
  },
  mounted() {
    this.loadData();
    let intervalId = window.setInterval(()=>{
      this.loadData();
    }, 30000);
  },
  methods: {
    loadData: function () {
      axios.get('/request/list')
        .then((response) => {
          let requests = response.data.data;
          this.requests = [];
          requests.forEach((request)=>{
            let created_at = new Date(request.created_at);
            this.requests.push({
              'id' : request.id,
              'status' : request.status.name,
              'title' : request.title,
              'images' : request.image,
              'created_at': created_at.toLocaleString('ru-ru'),
              'is_new' : (3600000 < new Date() - created_at) && request.status.id === 1,
            });
          });
        });
    },
  }
}
</script>

<style scoped>

</style>