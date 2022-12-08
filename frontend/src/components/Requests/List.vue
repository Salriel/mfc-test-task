<template>
  <div id="request_list" class="flex justify-center">
    <table>
      <thead>
      <th>Статус</th>
      <th>Заголовок</th>
      <th>Изображения</th>
      <th>Дата создания</th>
      </thead>
      <tbody>
        <Item v-for="request in requests" :request="request" />
      </tbody>
    </table>
  </div>
</template>

<script>
import Item from "./List/Item.vue";
import axios from "../../axios";

export default {
  name: "List",
  data(){
    return {
      'requests' : [
        {'id': 1, 'title': 'Хочу в отпуск', 'images':[], 'status':'Новая', 'created_at': 'now'},
        {'id': 2, 'title': 'ЗП', 'images':[], 'status':'Новая', 'created_at': 'now'},
        {'id': 3, 'title': 'Хммм', 'images':[], 'status':'Новая', 'created_at': 'now'}
      ]
    }
  },
  components: {
    Item
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